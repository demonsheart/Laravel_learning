<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//引入DB
use Illuminate\Support\Facades\DB;

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

    public function add()
    {
        $db = DB::table('member');
        $db->insert([
            [
                'name' => 'Feil',
                'age' => '18',
                'email' => 'Feil@qq.com'
            ],
            [
                'name' => 'Doly',
                'age' => '18',
                'email' => 'Doly@qq.com'
            ]
        ]);
    }
    public function update()
    {
        $db = DB::table('member');
        $db->where('id', '=', '5')->update([
            'age' => '16'
        ]);
    }
    public function select()
    {
        $db = DB::table('member');
        //
        // $data = $db->where('id', '>', '3')->where('id', '<', '5')->get();
        // dd($data);
        //
        // $data = $db->first();
        // dd($data);

        //
        // $data = $db->where('id', '=', '3')->value('email');
        // dd($data);

        //
        // $data = $db->where('id', '=', '3')->select('name', 'email')->get();
        // dd($data);

        //
        // $data = $db->orderby('id', 'desc')->get();
        // dd($data);

        //
        $data = $db->limit(2)->offset(1)->get();
        dd($data);
    }
}
