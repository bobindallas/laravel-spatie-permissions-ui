# Permissions Basic UI

This is a super basic UI for the [Spatie Roles and Permissions Laravel package](https://github.com/spatie/laravel-permission).  There are others out there but the few I looked at did not have a UI for maintaining Permissions which I want so I wrote this one.

We're using:

* Laravel 6 => https://laravel.com/docs/6.x along with it's associated [requirements](https://laravel.com/docs/6.x#server-requirements) 
* Spatie Permissions => https://github.com/spatie/laravel-permission
* Laravel Breadcrumbs => https://github.com/davejamesmiller/laravel-breadcrumbs
* Not included here but recommended for development is [laravel-debugbar](https://github.com/barryvdh/laravel-debugbar) or [laravel-telescope](https://laravel.com/docs/6.x/telescope)

#### Install Instructions:

1) clone repo
2) composer install (or update) - install the rest of the required code
3) create your database (mysql)
4) copy .env.example to .env
5) php artisan key:generate - set the application key 
6) edit .env to set your db name and credentials
7) php artisan migrate (or migrate:refresh to clear tables) - run migrations to create tables
8) optionally edit databases/seeds/UsersTableSeeder.php to add / change the default users prior to seeding.  Leave the default Roles and Permissions as you can edit them later.
9) php artisan db:seed - this will give you the option to run migrate:refresh

#### Laravel 6 removed the authentication frontend so we have to install it separately:

* composer require laravel/ui --dev
* npm install && npm run dev (pull in css / js requirements)

#### Generate basic scaffolding (take your pick)...

* php artisan ui bootstrap
* php artisan ui vue
* php artisan ui react

#### Generate login / registration scaffolding (take your pick)...

* php artisan ui bootstrap --auth
* php artisan ui vue --auth
* php artisan ui react --auth

10) login using default Superuser account =>  login: super@email.com password: secret

### Demo:

[BID-SRP](http://jsonbourne.com) - check it out

#### Notes:

* UPDATE [2019/11/18]: Updated the User and Role UI to use datatables for the permissions list.  This allows you to easily sort and search permissions to make it quicker & easier to set permissions on a user and role.  When you get more than a few permissions you need a way to filter them and this works for me at the moment.

* UPDATE [2019/11/18]: Spatie by default allows duplicate permission and role names - not sure why - maybe they have a reason.  This caused problems for me so I added a unique() index to the name column on the "roles" and "permissions" tables - see database/migrations/[timestamp]_create_permission_tables.php

* UPDATE: In keeping with Laravel convention I've changed the Superuser role to ignore permissions - so the Superuser role can do anything, no need to set permissions on the role.  I'll update the screens to reflect this later - or you can do it on your site.  The change is in: app/Providers/AuthServiceProvider.php in the boot() function.  
 Details here: https://docs.spatie.be/laravel-permission/v3/basic-usage/super-admin/

* In the App/Controller base class is a function called check_permission that checks permissions for various actions on controllers.  You can edit this to always return true for development to turn off permission checks.

* In the resources/views/layouts/app.blade.php layout are a few permission related @can directives to control menu items - change or remove these as needed.

* Others use traits, etc to check roles / perms but I like the finer grained check even though it's a bit more code.

This was inspired by another project:  
https://github.com/saqueib/roles-permissions-laravel/tree/v5.7

#### Tests:

Testing is very light at the moment.

We're using sqlite for testing so you'll need sqlite and the PHP driver installed.

I use Ubuntu so to install sqlite:

* $ sudo apt-get install sqlite (or sqlite3 if you get an error)

Then you'll need the PHP driver:

* sudo apt install php7.[x]-sqlite[x] - depending on your php and sqlite version

For my machine the commands are:

* $ sudo apt-get install sqlite3
* $ sudo apt install php7.2-sqlite3

you may need (for sqlite2):

* $ sudo apt-get install sqlite
* $ sudo apt install php7.2-sqlite - replace with your php version

#### License:

[MIT license](http://opensource.org/licenses/MIT)
