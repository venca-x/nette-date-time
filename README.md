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

        $form->addDate('datetime', 'Date time:', "datetime" )
            ->setValue( date( "d.m.Y H:i" ) );

        $form->addDate('date', 'Date:', "date" )
            ->setValue( date( "d.m.Y" ) );

        $form->addDate('month', 'Month:', "month" )
            ->setValue( date( "d.m.Y" ) );

        $form->addDate('time', 'time:', "time" )
            ->setValue( date( "H:i" ) );

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
Bower
-------------
    "dependencies": {
        "jquery": "~1.*.*",
        "bootstrap": "~3.3.0",
        "netteForms": "https://raw.githubusercontent.com/nette/sandbox/master/www/js/netteForms.js",
        "jquery-ui": "~1.11.2"
    }

Grunt
-------------
        concat: {
            js: {
                src: ['bower_components/jquery/dist/jquery.min.js',
                    'bower_components/netteForms/index.js',
                    'bower_components/bootstrap/dist/js/bootstrap.min.js',
                    'www/js/main.js',
					'./bower_components/jquery-ui/jquery-ui.min.js',
					'./vendor/venca-x/nette-date-time/client/js/jquery-ui-timepicker-addon.js',
					'./vendor/venca-x/nette-date-time/client/js/netteDateTimePicker.js'],
                dest: 'www/js/compiled.min.js'
            }
        },
		less: {
			production: {
				options: {
					compress: true,
					yuicompress: true,
					optimization: 2
				},
				files: {
					"www/css/main.css": [ "www/less/main.less",
                    "./bower_components/jquery-ui/themes/blitzer/jquery-ui.min.css",
					"./vendor/venca-x/nette-date-time/client/css/style.css" ]
				}
			}
        }
