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

!!! jQuery UI is required !!!
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

@layout.latte
presenter:
```php
		<link rel="stylesheet" media="screen,projection,tv" href="{$basePath}/css/blitzer/jquery-ui-1.10.4.custom.min.css">
		<link rel="stylesheet" media="screen,projection,tv" href="{$basePath}/css/style.css">

        <script type="text/javascript" src="{$basePath}/js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="{$basePath}/js/jquery-ui-timepicker-addon.js"></script>
        <script type="text/javascript" src="{$basePath}/js/netteDateTimePicker.js"></script> 
```