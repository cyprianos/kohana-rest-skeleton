# Kohana Rest Example

First of all, if you need a feedback just contact me, because it is not possible to describe all configuration options. Generally I assumed that you use Kohana in your company so I don't want write tutorial 'how to configure Kohana' or 'how to install npm package manager'

You can use it as MVC or just as siple REST api - just create new controller in `Controller/Api` directory.

#Prerequisites
- I am almost 100% percent sure that you use different OS or if you need a feedback you don't have experience with tools below just contact me
- Linux (i use Fedora/Debian)
- PHP >= 5.5
- MySQL
- nodejs & npm package 
- composer [https://getcomposer.org/]
- bower  [http://bower.io/]
- any server, ex. `php -S localhost:3000` is OK


#Instalation:

- clone this repo
- run `bower install`for frontend dependencies
- run `composer install` for backend dependencies 
- create database with name 'kohana' or whatever you like
- import dump.sql file into your databse
- configure database connection in `app/modules/database/config/database.php` file
- go to `cd app/public` and from this directory run server 'php -S localhost 3000'
- populate serwer with data using this link 'http://localhost:3000/setup/1000'(it generates 1000 movies and 
approximately ~5000 ratings)



#Interesting files:

-look at git
-db config
-bootstrap.php - REST Routing
- `public` folder
-`app/application/classess - application logic
