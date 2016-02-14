<?php

$app->get('/', function () use ($app) {
    return $app->version();
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api) {

    $api->post('auth/login', 'App\Http\Controllers\Api\V1\AuthController@login');

});