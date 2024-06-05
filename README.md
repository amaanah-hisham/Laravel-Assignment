<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
#   L a r a v e l - A s s i g n m e n t 
 
 


## Prerequisites

- Composer 2
- Xampp/Wamp ([Xampp](https://www.apachefriends.org/download.html) Preferred) with PHP 8^
- PhpStorm or equivalent IDE (PhpStorm Preferred)
- [Mailtrap](https://mailtrap.io) Account with credentials

## Installation

- Ensure the extracted folder contains the files as you open the extracted folder
- Ensure Composer is installed in your local environment
- Move the extracted folder to `htdocs` if using XAMPP or `www` if using WAMP respectively and rename the folder (Eg: laravel-1)
- `cd` or navigate to the extracted folder in `/xampp/htdocs/laravel-1`
- Open up a terminal or git bash and follow the below-mentioned commands

Install the packages to setup the application
```bash
composer install
```


All system configuration are managed by a file called `.env`, a file contains all the Environment Variables used in the system.

### Configuration

| Config              | Value                                                                                                                                 |
|---------------------|:--------------------------------------------------------------------------------------------------------------------------------------|
| `MAIL_HOST`         | Mail Host (eg: `smtp.mailtrap.io`)                                                                                                    |
| `MAIL_PORT`         | Mail Port `2525`                                                                                                                      |
| `MAIL_USERNAME`     | Mail Username  (What you generated from Mailtrap dashboard)                                                                           |
| `MAIL_PASSWORD`     | Mail Password (What you generated from Mailtrap dashboard)                                                                            |

After completing the above steps and configuring, DO NOT FORGET to restart your server.

```bash
php artisan optimize
```

## Finishing Up

If all the above configurations are correct, you may proceed to import the tables and fill (seed) the database by using this command

```bash
php artisan migrate --seed
```

## View Results

Enter this command and navigate to the given link. You should see the web application.

```bash
php artisan serve
```

## Credentials

By Default, A admin role is seeded to the database and many users with roles are created.

| User Role    | User email            | Password |
|--------------|-----------------------|----------|
| Admin         | admin@admin.com  | password |

