#!/usr/bin/env bash

set -e

if [[ "false" != "$TRAVIS_PULL_REQUEST" ]]; then
	echo "Not deploying pull requests."
	exit
fi

if [[ ! $TRAVIS_TAG ]]; then
	echo "Not deploying empty tag."
	exit
fi

if [[ ! $WP_PULUGIN_DEPLOY ]]; then
	echo "Not deploying."
	exit
fi

if [[ ! $PLUGIN_REPO || ! $GH_REF ]]; then
	echo "Please set \$GH_REF and \$PLUGIN_REPO in .travis.yml."
	exit
fi

mkdir build

cd build
svn co $PLUGIN_REPO
git clone $GH_REF $(basename $PLUGIN_REPO)/git

cd $(basename $SVN_REPO)
rsync -avz git/ trunk/
rm -fr git

echo ".DS_Store
.git
.gitignore
.travis.yml
Gruntfile.js
LINGUAS
Makefile
README.md
_site
bin
composer.json
composer.lock
gulpfile.js
node_modules
npm-debug.log
package.json
phpunit.xml
tests" > .svnignore

svn propset -R svn:ignore -F .svnignore .

svn propset svn:ignore -F .svnignore trunk/
svn st | grep '^!' | sed -e 's/\![ ]*/svn del /g' | sh
svn st | grep '^?' | sed -e 's/\?[ ]*/svn add /g' | sh

cd trunk
bash bin/build.sh
cd ..

svn cp trunk tags/$TRAVIS_TAG

svn st # test

if [[ $SVN_USER && $SVN_PASS ]]; then
	svn commit -m "commit version $TRAVIS_TAG" --username $SVN_USER --password $SVN_PASS --non-interactive 2>/dev/null
fi
