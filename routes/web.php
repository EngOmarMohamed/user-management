<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'user'], function () use ($router) {

    $router->post('/', [
        'uses' => 'UserController@create',
        'as' => 'user.create',
    ]);

    $router->delete('/{id}', [
        'uses' => 'UserController@delete',
        'as' => 'user.delete',
    ]);

    $router->post('/{user_id}/group', [
        'uses' => 'UserController@assignGroup',
        'as' => 'user.assign_group',
    ]);

    $router->delete('/{user_id}/group', [
        'uses' => 'UserController@detachGroup',
        'as' => 'user.detach_group',
    ]);
});

$router->group(['prefix' => 'group'], function () use ($router) {

    $router->post('/', [
        'uses' => 'GroupController@create',
        'as' => 'group.create',
    ]);

    $router->delete('/{id}', [
        'uses' => 'GroupController@delete',
        'as' => 'group.delete',
    ]);
});
