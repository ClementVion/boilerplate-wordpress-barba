# Boilerplate wordpress barba

## Running / Development
* `npm run dev`

## Build
* `npm run prod`

## Prerequisites
* Your local server (MAMP, ...) needs to have `build/wordpress` as document root
* If you don't have `danao.local` as local web address, you have to change the proxy address in `gulpfile.js`
* You need to update and import `sample/chalets-du-v.sql` on your database
* You need to put your server ids in `sample/wp-config.php` then move it into `build/wordpress/`

## Getting started
* `npm install`
* `npm run install:wordpress`
