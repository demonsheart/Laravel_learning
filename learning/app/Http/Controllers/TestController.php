<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class TestController extends Controller
{
    //phpinfo信息
    public function test1()
    {
        echo phpinfo();
    }

    //test for Input
    public function test2()
    {
        //单个值
        echo Input::get('id', '10086') . "</br>";
        //全部值
        $all = Input::all();
        //dd($all); //dump + die

        //获取指定信息
        // dd(Input::get('name'));

        //dd(Input::only(['id','name']));

        // dd(Input::except(['id','name']));

        dd(Input::has('gender'));
    }
}
