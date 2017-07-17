<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //保存搜索条件
        $where = [];
        //实例化需要的表
        $ob = DB::table('user')->join('user_info', 'user.user_id', '=', 'user_info.userid');
        // 判断请求中是否含有name字段
        if($request->has('name')){
            // 获取搜索的条件
            $name = $request->input('name');
            //添加到将要带到分页中的数组
            $where['name'] = $name;
            //给查询语句添加where条件
            $ob->where('name','like','%'.$name.'%');
        }
        //执行分页查询
        $users = $ob->paginate(6);
        // 加载模板的同时，把查询的数据，以及分页时需要携带的参数传到模板上
        return view('admin/userlist', ['users' => $users,'where'=>$where]);
    }


    public function create()
    {

    }

    public function store(Request $request)
    {
        //
    }

    //修改用户状态
    public function show($id)
    {
        $user = DB::table('user_info')->where('userid', $id)->get();
        $ob = DB::table('user_info')->where('userid',$id);
        if($user[0]->status==1){
            $ob->update(['status'=>0]);
            return redirect('admin/user')->with('msg', '成功禁用');
        }else{
            $ob->update(['status'=>1]);
            return redirect('admin/user')->with('msg', '成功开启');
        }
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
