<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//引入DB
use Illuminate\Support\Facades\DB;
//引入模型
use App\Home\Member;

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
    //view
    public function test3()
    {
        // return view('home.test3');

        $date = date('Y-m-d H:i:s', time());
        $day = "日";
        $time = strtotime('+1 year');
        // return view('home.test3', [
        //     'date' => $date,
        //     'day' => $day
        // ]);
        return view('home.test3', compact('date', 'day', 'time'));
    }
    //foreach / if
    public function test4()
    {
        $data = DB::table('member')->get();

        $day = date('N');
        //dd($data);
        return view('home.test4', compact('data', 'day'));
    }
    //继承
    public function test5()
    {
        return view('home.test5');
    }
    //csrf验证测试  基础表单
    public function test6()
    {
        return view('home.test6');
    }
    //csrf验证测试  处理请求
    public function test7()
    {
        return 'submit sucessfully';
    }
    //模型 添加
    public function test8(Request $request)
    {
        //实例化模型
        $model = new Member();
        //属性赋值
        // $model -> name = 'kitty';
        // $model -> age = '25';
        // $model -> email = 'kitty@qq.com';
        // //记录
        // $model -> save();

        //request
        $model -> create($request -> all());
    }
    //查询
    public function test9()
    {
        //主键为5
        $data = Member::find(5); //返回的是对象
        $data = Member::find(5) -> toArray(); //返回的是数组

        $data = Member::where('id','>','3') -> get() -> toArray();
        dd($data);
    }
    //修改
    public function test10()
    {
        $model = new Member();
        $model -> where('id','7') -> update(['age' => '26']);
    }
    public function test12()
    {
        return view('home.test12');
    }
    //自动验证
    public function test13(Request $request)
    {
        if(Input::method() == 'POST')
        {
            //自动验证
            $this -> validate($request,[
                //具体规则
                //字段 => 规则1|规则2|...
                'name' => 'required|min:2|max:20',
                'age'  => 'required|integer|min:1|max:100',
                'email' => 'required|email'
            ]);
            //验证通过
            echo '121212';
        }
        else
        {
            //展示视图
            return view('home.test13');
        }
    }
    //上传文件
    public function test14()
    {
        if(Input::method() == 'POST')
        {
            //上传

        }
        else
        {
            //展示视图
            
        }
    }
}