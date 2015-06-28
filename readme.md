# Lavender

[![Build Status](https://travis-ci.org/lavender/lavender.svg?branch=master)](https://travis-ci.org/lavender/lavender)
[![Latest Stable Version](https://poser.pugx.org/lavender-commerce/lavender/v/stable.svg)](https://packagist.org/packages/lavender-commerce/lavender) 
[![Total Downloads](https://poser.pugx.org/lavender-commerce/lavender/downloads.svg)](https://packagist.org/packages/lavender-commerce/lavender) 
[![License](https://poser.pugx.org/lavender-commerce/lavender/license.svg)](https://packagist.org/packages/lavender-commerce/lavender)

Lavender is an Open Source E-Commerce Framework built on top of [Laravel 5](http://laravel.com/docs/5.0).

> **Note:** Lavender is in active development and NOT ready for production.


### Step 1: Install Lavender with [Composer](https://getcomposer.org/download/).

> Avoid installing lavender in your web server's public directory. Instead create a symlink on lavender/public as your public root. 

Run composer to create the lavender application:

    composer create-project lavender-commerce/lavender
    
Set up your environment config file:

    lavender/.env    


### Step 2: Set up Lavender with Artisan.

Create the first round of migrations. This command reads the definitions in config/entity.php and compares it to your database.

    php artisan migrate:entity

Run your newly created migration file:

    php artisan migrate

Install lavender's dependencies (default store and theme):

    php artisan db:seed --class=InstallLavender

Create an admin account:

    php artisan make:admin
    
    
### Step 3: (Optional) Seed catalog sample data!

    php artisan db:seed --class=SampleData

That's it!


### Troubleshooting

Permission denied on lavender/storage directory?

    chmod -R 775 storage

Login not working? Try modifying your sessions config:

    config/session.php

Emails not working? Try modifying your email config:

    config/mail.php

Something else? Follow the install instructions carefully or [submit an new issue!](https://github.com/lavender/lavender/issues/new)

### Support

Come chat with us in [#lavender on freenode](http://webchat.freenode.net/?channels=#lavender), or [submit an new issue.](https://github.com/lavender/lavender/issues/new)


### License

Lavender is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


### Roadmap

Version                                |                            | Goals     
 :-----------------------------------: | :------------------------- | :------------------------------------------------------
 `1.x.x - Developer Beta`              | Current                    | Feature development, ui improvements, [documentation](https://github.com/lavender/lavender/wiki).
 `2.x.x - Preview`                     | Coming Q4 2015             | Improve extensibility, performance/security audits.
 `3.x.x - Public Release`              | Coming Q2 2016             | Provide documentation for end users, create a marketing site to promote adoption.

What does production-ready Lavender look like? A feature-light but highly extensible ecommerce platform with elegant code structures and detailed documentation.


### Contributing

Lavender is in active development and [pull requests](https://github.com/lavender/lavender/pulls) (on the master branch) are much appreciated!

This repository provides the consumer application which contains the [controllers](https://github.com/lavender/lavender/tree/master/app/Http/Controllers), [models](https://github.com/lavender/lavender/tree/master/app/Database), and [views](https://github.com/lavender/lavender/tree/master/resources/views/core/default) (and config, locale, etc) that makes Lavender an ecommerce platform. 

The [lavender/framework](https://github.com/lavender/framework) repository contains framework enhancements for Laravel 5, including [multiple authentication](https://github.com/lavender/framework/tree/master/src/Auth), a powerful [Entity class](https://github.com/lavender/framework/tree/master/src/Database), layout injection, and easily extensible [forms](https://github.com/lavender/lavender/tree/master/app/Form).  

