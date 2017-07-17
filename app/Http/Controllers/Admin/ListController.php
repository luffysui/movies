<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class ListController extends Controller
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
        $ob = DB::table('list');
        // dd($request);
        // 判断请求中是否含有name字段
        if($request->has('list_name')){
            // 获取搜索的条件
            $name = $request->input('list_name');
            //添加到将要带到分页中的数组
            $where['list_name'] = $name;
            //给查询语句添加where条件
            $ob->where('list_name','like','%'.$name.'%');
        }
        //执行分页查询
        $list = $ob->paginate(10);
        // 加载模板的同时，把查询的数据，以及分页时需要携带的参数传到模板上
        return view('admin.listlist', ['list'=>$list,'where'=>$where]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.listadd');
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

            'list_name.unique'  => '榜单名称已存在',
            'list_name.required' => '榜单名称必须填写'
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'list_name' => 'required|unique:list',
            'list_name' => 'required',
        ],$messages);

        $arr = $request->except('_token');
        $id = DB::table('list')->insertGetId($arr);
        if($id > 0){
            return redirect('/admin/list')->with('msg', '添加成功');
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
    public function edit($list_id)
    {
        //查询需要修改的用户的个人信息
        $list = DB::table('list')->where('list_id',$list_id)->first();
        // dd($admin);
        // 加载修改页面并把个人信息传到模板上
        return view('admin.listedit', ['list'=>$list,'list_id'=>$list_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $list_id)
    {
        //自定义错误消息格式
        $messages = array(
            'list_name.unique'  => '榜单名称已存在',
            'list_name.required' => '榜单名称必须填写'
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'list_name' => 'required|unique:list',
        ],$messages);
        //去除多余不需要的字段
        $arr = $request->except('_token', '_method');

        // dd($arr);
        //dd($admin_name);
        // 执行修改
        $res = DB::table('list')->where('list_id', $list_id)->update($arr);
        //dd($res);
        // 判断修改是否成功
        if($res > 0){
            return redirect('admin/list')->with('msg', '修改成功');
        }else{
            return redirect('admin/list')->with('msg', '修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($list_id)
    {
        $res = DB::table('list')->where('list_id',$list_id)->delete();
        if($res > 0){
            return redirect('admin/list')->with('msg', '删除成功');
        }else{
            return redirect('admin/list')->with('msg', '删除失败');
        }
    }
}
