# TrackTik Buystore
- [TrackTik Buystore](#tracktik-buystore)
  - [Requirements](#requirements)
  - [Setup instructions](#setup-instructions)
  - [Tests](#tests)

## Requirements

- PHP >=7.4
- Laravel 8
## Setup instructions
The setup steps are pretty easy. Follow the next steps:

- Run `composer install` in the root of the folder
- Execute `php artisan serve`
- Create your own database
- Populate your `.env` file with the right data. You can take same variables from `.env.example`
- Run `php artisan migrate` and then `php artisan db:seed`. Seed will populate with fixed data.

## Tests
For the testing part. You can create the testing database. Use the `touch database/database.sqlite` command for it.

You can then run `php artisan test`. I tested the main functions from the cart.