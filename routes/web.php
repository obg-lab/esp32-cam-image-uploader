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

use App\Image;

$router->get('/', function () use ($router) {
    $data = [
        'images' => Image::all(),
    ];

    return view('index', $data);
});

$router->get('/files', function () {
    return response()->json(Image::all(), 200);
});



$router->post(
    '/upload',
    [
        'middleware' => 'upload',
        'uses' => 'UploadController@upload'
    ]
);
