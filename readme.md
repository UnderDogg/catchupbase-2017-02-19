# CatchUp CRM




## Install

1) Run in your terminal:

``` bash

```

1a) Copy ENV file
``` bash
copy .env.example .env
```

2) Set your database information in your .env file (use the .env.example as an example);

3) Run in your backpack-demo folder:
``` bash
$ composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed --class="Backpack\Settings\database\seeds\SettingsTableSeeder"
```

## Usage 

1. Register a new user at http://localhost/backpack-demo/public/admin/register
2. Your admin panel will be available at http://localhost/backpack-demo/public/admin
3. [optional] If you're building an admin panel, you should close the registration. In config/backpack/base.php look for "registration_open" and change it to false.

