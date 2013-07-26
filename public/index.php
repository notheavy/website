<?php

// set timezone
date_default_timezone_set('Europe/Berlin');

// change path for easier path handling - relative to application root
chdir(dirname(__DIR__));

// setup composer autoloading
include __DIR__ . '/../vendor/autoload.php';

// run application
Zend\Mvc\Application::init(include 'config/application.config.php')->run();


