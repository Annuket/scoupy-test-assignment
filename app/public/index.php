<?php

/**
 * Front controller
 */

/**
 * Composer
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('/', ['controller' => 'Coupons', 'action' => 'list']);
$router->add('/{controller}/{action}');
$router->add('/{controller}/{id:\d+}/{action}');

$router->dispatch($_SERVER['REQUEST_URI']);
