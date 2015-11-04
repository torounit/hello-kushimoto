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

rsync -avz $(basename $PLUGIN_REPO)/git/ $(basename $PLUGIN_REPO)/trunk/
