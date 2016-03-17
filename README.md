Installation
------------

  Install with composer:

 
		composer require venca-x/nette-date-time:~0.1
      


Usage Sample
-------------

!!! jQuery UI is required !!!
-------------

bootstrap.php add register line OR add line in config.neon

```php
    //$configurator->createRobotLoader()
        //	->addDirectory(__DIR__)
        //	->addDirectory(__DIR__ . '/../libs')
        //	->register();

    Nette\Forms\NetteDateTime::register();

    // Create Dependency Injection container from config.neon file
```

OR add line to config.neon:

    extensions:
        replicator: Nette\Forms\NetteDateTime

Usage
-------------
presenter:
```php
    protected function concertForm() 
    {
        $form = new UI\Form;

        $form->addDate("datetime", "Date time:", "datetime" )
            ->setValue( date( "d.m.Y H:i" ) );

        $form->addDate("date", "Date:", "date" )
            ->setValue( date( "d.m.Y" ) );

        $form->addDate("month", "Month:", "month" )
            ->setValue( date( "d.m.Y" ) );

        $form->addDate("time", "time:", "time" )
            ->setValue( date( "H:i" ) );
            
        $form->addDate("timesec", "timesec:", "timesec" )
            ->setValue( date( "H:i:s" ) );            

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

	bower install jquery#1.*.* --save-dev							//install last version 1.x
	bower install jquery-ui#1.*.* --save-dev						//install last version 1.x

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
        cssmin: {
            target: {
                files: {
                    'www/css/main.min.css': ['www/css/main.css', "bower_components/jquery-ui/themes/blitzer/jquery-ui.min.css", "vendor/venca-x/nette-date-time/client/css/style.css" ]
                }
            }
        }
