This is a Laravel 5 package that provides fabrication management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `cvs/fabrication`.

    "cvs/fabrication": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Cvs\Fabrication\Providers\FabricationServiceProvider::class,

```

And also add it to alias

```php
'Fabrication'  => Cvs\Fabrication\Facades\Fabrication::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Cvs\Fabrication\Providers\FabricationServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Cvs\Fabrication\Providers\FabricationServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Cvs\Fabrication\Providers\FabricationServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Cvs\Fabrication\Providers\FabricationServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Cvs\Fabrication\Providers\FabricationServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Cvs\Fabrication\Providers\FabricationServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


