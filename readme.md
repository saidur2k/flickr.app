#Flickr.app

The app is created with Laravel5.3 using Homestead.

This app generates image galleries in response to user searches and draws its contents from the Flickr API.

1) Requires user to register before allowing them to search
2) Search results are paginated and displayed as 5 results per page and allows the user to navigate to other pages
3) Each image is displayed as a thumbnail. Clicking on the thumbnail opens a new page to show the full size image.
4) The app also maintains a search history and displays the list of recent searches made by the user.

## How to install dependencies
1) Git: https://git-scm.com/downloads
2) Get Composer: https://getcomposer.org/doc/00-intro.md 
3) Install Vagrant: https://www.vagrantup.com/downloads.html
4) Laravel Homestead Install Instructions: https://laravel.com/docs/5.3/homestead

## How to run the application
1) Clone the repo from Github to a local folder
2) Navigate to the folder in the Terminal
3) Also, in the terminal: cp sample.env to .env
4) Also, in the terminal: vagrant up (might have to vagrant init - first time)
4) Configure /etc/hosts: vim /etc/hosts  - and add - 192.168.10.10   flickr.app
5) Use your fav browser and navigate to flickr.app

## How to run the automatic tests
- Install PhantomJS and run on port 4444
- From Laravel folder, execute: php vendor/bin/codecept run

## Compromises / shortcuts taken due to time consideration
- Would prefer to setup the configuration on Docker instead of Homestead and build a CI/CD pipeline with DockerCloud, Travis CI and AWS
- I kept it really simple
- Would liked to have created a thinner Laravel backend json API instead and feed to a JS mvc framework
- No unit tests. Relied on Acceptance testing since it is such a simple project
- Using SQLite to keep it really simple