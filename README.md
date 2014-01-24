Installation
------------

 1. Add the bundle to your dependencies:

        // composer.json

        {
           // ...
           "require": {
               // ...
               "venca-x/nette-date-time": "@dev"
           }
        }

 2. Use Composer to download and install the bundle:

        composer update
        


Usage Sample
-------------

bootstrap.php

```php
//$configurator->createRobotLoader()
//	->addDirectory(__DIR__)
//	->addDirectory(__DIR__ . '/../libs')
//	->register();

Nette\Forms\NetteDateTime::register();

// Create Dependency Injection container from config.neon file
```

Usage
-------------
presenter:
```php
    protected function concertForm() 
    {
        $form = new UI\Form;

        $form->addDate('date', 'Date time:', "datetime" )
            ->setValue( date( "d.m.Y H:i" ) ); 

        return $form;
    }
```