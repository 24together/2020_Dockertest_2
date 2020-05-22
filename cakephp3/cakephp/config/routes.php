<?php

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

// Router::scope('/', function (RouteBuilder $routes) {
//     // Register scoped middleware for in scopes.
//     $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
//         'httpOnly' => true
//     ]));

//     $routes->applyMiddleware('csrf');
//     $routes->connect('/', ['controller' => 'Users', 'action' => 'view']);

//     $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

// });
Router::connect('/', ['controller' => 'Main']);

?>