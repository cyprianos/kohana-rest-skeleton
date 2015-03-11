# Kohana Rest Example

First of all, if you need a feedback just contact me, because it is not possible to describe all configuration options. Generally I assumed that you use Kohana in your company so I don't want write tutorial 'how to configure Kohana' or 'how to install npm package manager'

You can use it as MVC or just as siple REST api - just create new controller in `Controller/Api` directory.

#Prerequisites
- I am almost 100% percent sure that you use different OS or if you need a feedback you don't have experience with tools below just contact me - I can show you what to do on Skype, etc
- Linux (i use Fedora/Debian)
- PHP >= 5.5
- MySQL
- nodejs & npm package manager
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
- populate database with data using this link 'http://localhost:3000/setup/1000'(it generates 1000 movies and 
approximately ~5000 ratings)



#Interesting files:

- bootstrap.php - REST Routing
- `public` folder
-`app/application - application logic

#Test Answers

1. This code is vulnerable on SQL INJECTION. To avoid this, you can for example use mysqli extension(or PDO) nad use prepared statement syntax.
2. public methods are accessible outside and inside declared class and for it's children classes. Protected methods are accessible inside declared class anf for it's children classes. Private methods are visible only inside declared class.
3. For example use htmlspecialchars always when you output user's inputs data.
4. You should store password as a result of hash function (like sha, bcrypt etc)
5. Cookie is file stored on users' PC. Session is file stored on the server.
6. Abstract class is class but without possibility of creating instances. If you want to create instance with abstract class interface, you need to extend it first.
7. By using header('Location: http://yourhost.com') method.
8. bar

#Open ended questions

1. There is a loot of web application issues.
	- SQL injection(filter input and use prepared statements)
	- XSS(filter input and remove html tags and some special characters)
	- phising(it is impossible to avoid phising but you can make this kind of attacks harder by using https, browser filters etc),
	- passing encrypted and secret data via HTTP(you should first encrypt and also use HTTPS protocol), badly configured chmods/user rights(you should hid, bad server configuration(you should ensure that user cand only what you allow)
	- CSRF(one time password, but it is impossible to prevent all CSRF attacks because human factor is most important here)
	- Cookies(don't use cookies if you don't want problems with cookies, it is also rather human issue, you can use localstorage instead but it is also insecure)

2. it depends on the project, but generally the most scalable option is to separate files into separate modules directories, every module have it's own controller/model/view directories. Also you need some dependency injection system.
3. Fasade, Decorator, Publish Subscriber, Singleton. I don't want to write tutorial about this, but generally I use patterns when i need them. Fasade - when i need one api for multiple functions, decorator - when i need new functionality in runtime, publish subscriber - when i need an event system and more asynchronic approach in code management, singleton - when i need only one instance of class.
4. Better code organization(logic and view separation), routing system and helper libraries.  
Generally i prefer small REST frameworks like ExpressJS/Ruby Sinatra/Slim for Single Page Applications, Kohana/Express JS/Rails for smaller MVC projects and Zend/Symfony/Rails for bigger projects.

5. I didn't know this term before the test.

6. In funcitonal programming you functions are objects, you can create it in runtime, return it, pass as parameters and of course call it like in functionals in mathematic. In object programming you use methods(API) which are related to your class or even object(like in Javascript which is both functional and OOP). In procedural programming you create procedures which you call one after another but they are unrelated to objects.

7.Performance. PHP has one of the slowest interpreted languages enviroments. Community - changes in PHP are very slow and comparing to ruby gems and node js, PHP libraries are buggy, unfriendly, hard to learn, too specific, incompleted and obsolete. Of course there is a great tool 'composer' but it is not enough.

i don't like one million global functions, what sometimes force me to use procedural style.  It would be much better to move it into static helper classes which you can include if you need. I don't like issues with encoding for example json_encode often returns empty value.