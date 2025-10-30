<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About the project

This project is a light weight version of the X social network previously known as twitter. only a few of the X app features was integrated. Real time updates and algorithm used in the app was not integrated.

## Run the following commands sequentially to have the project running
-- git clone https://github.com/Deepcodepentester/twitter_clone_v2.git
-- cd  twitter_clone_v2
-- comopser install 
-- copy .env.example .env  
-- php artisan key:generate
-- php artisan migrate
-- php artisan storage:link
-- php artisan serve

## Key notes
-- Make sure you have composer installed globally
-- Create a database in your web development environment like wamp. The name is what you we fill in the .env file or any existing database name in the web development environment.
fill the .env file e.g for the mysql database  fill in 
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
With your own username and password  values.

