<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //保存搜索条件
        $where = [];
        //实例化需要的表
        $ob = DB::table('admin');
        // dd($request);
        // 判断请求中是否含有name字段
        if($request->has('admin_name')){
            // 获取搜索的条件
            $name = $request->input('admin_name');
            //添加到将要带到分页中的数组
            $where['admin_name'] = $name;
            //给查询语句添加where条件
            $ob->where('admin_name','like','%'.$name.'%');
        }
        //执行分页查询
        $list = $ob->paginate(10);
        foreach ($list as $k=>$v)
        {
            $list[$k]->last_date = date('Y-m-d H:i:s',$v->last_time);
        }
        // 加载模板的同时，把查询的数据，以及分页时需要携带的参数传到模板上
        return view('admin.adminlist', ['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.adminadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //自定义错误消息格式
        $messages = array(
            'admin_name.min' => '最少2位',
            'admin_name.max' => '最多12位',
            'admin_name.unique'  => '用户已存在',
            'admin_name.alpha_num'=>'用户名必须是数字和字母',
            'admin_password.required' => '密码必须填写',
            'admin_password.alpha_num'=>'密码必须是数字和字母'
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'admin_name' => 'required|unique:admin|min:2|max:12|alpha_num',
            'admin_password' => 'required|alpha_num',
        ],$messages);

        $arr = $request->except('_token');
        $arr['admin_password']=md5($arr['admin_password']);
        $id = DB::table('admin')->insertGetId($arr);
        if($id > 0){
            return redirect('/admin/ad')->with('msg', '添加成功');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($admin_id)
    {
        //查询需要修改的用户的个人信息
        $admin = DB::table('admin')->where('admin_id',$admin_id)->first();
        // dd($admin);
        // 加载修改页面并把个人信息传到模板上
        return view('admin.adminedit', ['admin'=>$admin,'admin_id'=>$admin_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $admin_id)
    {
        $messages = array(
            'admin_password.min' => '最少2位',
            'admin_password.max' => '最多12位',
            'admin_name.alpha_num'=>'用户名必须是数字和字母',
            'admin_password.required' => '密码必须填写',
            'admin_password.alpha_num'=>'密码必须是数字和字母'
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'admin_name' => 'required|min:2|max:12|alpha_num',
            'admin_password' => 'required|alpha_num',
        ],$messages);
        //去除多余不需要的字段
        $arr = $request->except('_token', '_method');
        $arr['admin_password']=md5($arr['admin_password']);
        // dd($arr);
        //dd($admin_name);
        // 执行修改
        $res = DB::table('admin')->where('admin_id', $admin_id)->update($arr);
        //dd($res);
        // 判断修改是否成功
        if($res > 0){
            return redirect('admin/ad')->with('msg', '修改成功');
        }else{
            return redirect('admin/ad')->with('msg', '修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin_id)
    {
        $res = DB::table('admin')->where('admin_id',$admin_id)->delete();
        if($res > 0){
            return redirect('admin/ad')->with('msg', '删除成功');
        }else{
            return redirect('admin/ad')->with('msg', '删除失败');
        }
    }

}
// 到此一游