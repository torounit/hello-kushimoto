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

mkdir build

cd build
svn co $PLUGIN_REPO
git clone $GH_REF $(basename $PLUGIN_REPO)/git

cd $(basename $PLUGIN_REPO)
rsync -avz git/ trunk/

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
git
gulpfile.js
node_modules
npm-debug.log
package.json
phpunit.xml
tests" > .svnignore

svn propset svn:ignore -F .svnignore trunk/
svn st | grep '^!' | sed -e 's/\![ ]*/svn del /g' | sh
svn st | grep '^?' | sed -e 's/\?[ ]*/svn add /g' | sh

svn cp trunk tags/$TRAVIS_TAG

svn st # test
