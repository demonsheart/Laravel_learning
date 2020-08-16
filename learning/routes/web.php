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


//分目录管理
Route::get('/home/index/index', 'Home\IndexController@index');
Route::get('/admin/index/index', 'Admin\IndexController@index');

//DB
Route::group(['prefix' => '/home/test'], function () {
    Route::get('add', 'TestController@add');
    Route::get('del', 'TestController@del');
    Route::get('update', 'TestController@update');
    Route::get('select', 'TestController@select');

    Route::get('test1', 'TestController@test1');
    Route::get('test2', 'TestController@test2');
    Route::get('test3', 'TestController@test3');
    Route::get('test4', 'TestController@test4');
    Route::get('test5', 'TestController@test5');

    //csrf验证
    Route::get('test6', 'TestController@test6');
    Route::post('test7', 'TestController@test7')->name('test7');

    //模型
    Route::any('test8', 'TestController@test8');
    Route::get('test9', 'TestController@test9');
    Route::get('test10', 'TestController@test10');
    Route::get('test11', 'TestController@test11');
    Route::get('test12', 'TestController@test12');
    //自动验证 (二合一 自己提交给自己)
    Route::any('test13', 'TestController@test13');
    //上传
    Route::any('test14','TestController@test14');
});