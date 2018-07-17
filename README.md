# Hostelworld Code Challenge

#### Version
1.1

## Installation steps:
* run `composer install`
* run `mkdir data`
* run `chmod +x bin/console`
* run `bin/console doctrine:database:create`
* run `bin/console doctrine:migrations:migrate` - to prepare database.
* run `bin/console server:run` - to start local web server

## Challenge description
 * This project is Symfony4 based.
 * Is requested to implement some code logic to expose some endpoints for this new REST API.
 * Do every step you think is necessary.
 * Don't forget to comment your code.
 * After run migrations your project will have available a small database with:
   * Cities Table:
     * `id` INT AUTOINCREMENT
     * `name` VARCHAR(255)
     * `country_name` VARCHAR(255)
   * Hostels Table:
      * `id` INT AUTOINCREMENT
      * `name` VARCHAR(255)
      * `street` VARCHAR(255)
      * `active` INT (1 or 0)
      * `city_id` INT
   * Reviews Table:
      * `id` INT AUTOINCREMENT
      * `user_name` VARCHAR(255)
      * `rating` INT (1 to 5)
      * `content` MEDIUMTEXT
      * `hostel_id` INT

## Challenge points:
 #### Implement one endpoint that returns all cities available.
 The consumer want to know which cities we can provide. Information to expose per city **[City Id, City Name, Country Name]**
 #### Implement one endpoint that returns all active hostels for one city Id.
 The consumer wants all the active hostels in one city.
 Information to expose per hostel **[Property Id, Property Name, Property Address, Property City Name, Average Rating]**
 #### Implement one endpoint that returns the top hostels in a city.
 A hostel becomes a "Top Hostel" if has average rating higher than 4.0.
 Information to expose per hostel **[Property Id, Property Name, Property Address, Property City Name, Average Rating]**

## Unit / Functional tests
Please do the unit and functional tests that you think that are important for this endpoints.


## Challenge solution
To run the solution it is recommended to use `composer update` instead of `composer install` as some additional packages where added.

* run `composer update`
* run `mkdir data`
* run `chmod +x bin/console`
* run `bin/console doctrine:database:create`
* run `bin/console doctrine:migrations:migrate` - to prepare database.
* run `bin/console server:run` - to start local web server

The following endpoints are available:

* `localhost:8000` - Contains information on what was implemented and why.
* `localhost:8000/cities` - Endpoint that returns all cities
* `localhost:8000/hostels/active/{cityId}` - Endpoint that returns all the active hostels from city with id {cityId}
* `localhost:8000/hostels/top/{cityId}` - Endpoint that returns all active hostels from city with id {cityId} and average rating above or equal to 4.0

To run the test battery, run the command `php bin/phpunit` on the project folder.
