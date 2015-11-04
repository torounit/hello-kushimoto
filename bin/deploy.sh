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

echo $TRAVIS_TAG;
