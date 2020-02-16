![phpunit](https://github.com/teamreflex/musicdb/workflows/phpunit/badge.svg)
[![StyleCI](https://github.styleci.io/repos/211292882/shield?branch=master)](https://github.styleci.io/repos/211292882)

## Requirements
- PHP 7.4
    - Refer to Laravel 6 documentation for PHP requirements
- node & npm (13.5.0 & 6.13.4 confirmed working)
- Probably wanna use Mailtrap for mail testing, Redis for caching etc etc etc
- Some kind of webserver, I use Laravel Valet

### Setup
```
$ git clone git@github.com:teamreflex/musicdb.git
$ cd musicdb
$ cp .env.example .env
$ composer install
$ php artisan key:generate
$ php artisan migrate
$ npm install
$ npm run dev
```

### Contact
- Twitter: [@Kairuxo](https://twitter.com/Kairuxo)
- Email: kairu [at] team-reflex.com
- Discord: Kairu#1234
- Github: [/xKairu](https://github.com/xKairu)
