<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//根路由

Route::get('/', function () {
    return view('welcome');
});

Route::any('/test1', function () {
    echo '<p>Test1</p>';
});
//必选
Route::any('/test2/{id}', function ($id) {
    echo '<p>Test2-' . $id . '</p>';
});
//可选
Route::any('/test3/{id?}', function ($id = '') {
    echo '<p>Test3-' . $id . '</p>';
});
//通过?形式传参
Route::any('/test4', function () {
    echo '<p>Test4-' . $_GET['id'] . '</p>';
})->name('route11'); //路由别名

Route::match(['GET', 'POST'], '/test5', function () {
    echo '<p>Test5</p>';
});
//群組
Route::group(['prefix' => 'admin'], function () {
    Route::get('test1', function () {
        // 匹配 /admin/test1
    });
    Route::get('test2', function () {
        // 匹配 /admin/test2
    });
    Route::get('test3', function () {
        // 匹配 /admin/test3
    });
    Route::get('test4', function () {
        // 匹配 /admin/test4
    });
});

//控制器路由方法
Route::get('/home/test/test1', 'TestController@test1');
Route::get('/home/test/test2', 'TestController@test2');

//分目录管理
Route::get('/home/index/index', 'Home\IndexController@index');
Route::get('/admin/index/index', 'Admin\IndexController@index');

