# PingerBundle [![Build Status](https://secure.travis-ci.org/ampluso/PingerBundle.png?branch=master)](http://travis-ci.org/ampluso/PingerBundle)

PingerBundle (bundle for Symfony2) is a service to update different search engines that your blog or website has updated.

## Requirements

* PHP 5.3+
* Symfony2

## Installation

### Composer

#### Method 1

    Simply run assuming you have installed composer.phar or composer binary:

    ```bash
    $ composer require ampluso/pinger-bundle dev-master
    ```

 ### Method 2

    1. Add the following lines in your composer.json:

    ```js
    {
      "require": {
        "ampluso/pinger-bundle": "dev-master"
      }
    }
    ```

    2. Run the composer to download the bundle

    ```bash
    $ php composer.phar update ampluso/pinger-bundle
    ```

### Add this bundle to your application's kernel

    ```php
    // app/ApplicationKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Ampluso\PingerBundle\PingerBundle(),
            // ...
        );
    }
      ```

## Authors

Marcin Chyłek - <marcin@chylek.pl>

## License

PingerBundle is licensed under the MIT License - see the [LICENSE file](https://github.com/ampluso/PingerBundle/blob/master/LICENSE) for details
