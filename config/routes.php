<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin('Rrule', ['path' => '/'], function (RouteBuilder $route) {
    $route->prefix('admin', function (RouteBuilder $route) {
        $route->extensions(['json']);

        $route->scope('/rrule', [], function (RouteBuilder $route) {
            $route->fallbacks();
        });
    });
});
