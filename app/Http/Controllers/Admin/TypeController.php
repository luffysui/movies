<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    //类型列表
    public function index(Request $request)
    {
        $where['condition'] = '';
        $ob = DB::table('type');
        switch ($request->input('condition')){
            case 'all': ;break;
            case 'type':
                $where['condition']='type';
                $ob->where('status',0);break;
            case 'state':
                $where['condition']='state';
                $ob->where('status',1);break;
            case 'displayon':
                $where['condition']='displayon';
                $ob->where('display',1);break;
            case 'displayoff':
                $where['conditioff']='displayoff';
                $ob->where('display',0);break;
        }

        $info = $ob->get();
        return view('admin/typelist',['info'=>$info,'where'=>$where]);
    }
    //添加类型页面表单
    public function create()
    {
        return view('admin.typeadd');
    }
    //添加类型操作
    public function store(Request $request)
    {
        $messages = [
            'name.required'=>'必须填写名称',
            'status.integer'=>'必须选一个类型'
        ];
        $this->validate($request, [
            'name' => 'required',
            'status' => 'integer'
        ],$messages);
        $info=$request->except('_token');
        $res = DB::table('type')->insert($info);
        if($res){
            return redirect('admin/type')->with('msg','添加成功');
        }else{
            return redirect('admin/type')->with('msg','添加失败');
        }
    }

    //禁用or启用
    public function show($idanddisplay)
    {
        //前台传过来的数据格式为：id and display
        //将数据串转换成可操作的数组格式
        $arr = explode('and',$idanddisplay);
        //修改禁用或启用状态
        if($arr[1]==1){
            $res = DB::table('type')->where('type_id',$arr[0])->update(['display'=>0]);
            if($res){
                return redirect('admin/type')->with('msg','禁用成功');
            }else{
                return redirect('admin/type')->with('msg','禁用失败');
            }
        }else{
            $res = DB::table('type')->where('type_id',$arr[0])->update(['display'=>1]);
            if($res){
                return redirect('admin/type')->with('msg','启用成功');
            }else{
                return redirect('admin/type')->with('msg','启用失败');
            }
        }
    }

    //修改页面
    public function edit($id)
    {
        $info = DB::table('type')->where('type_id',$id)->first();
        return view('admin/typeedit',['info'=>$info]);
    }
    //修改信息操作
    public function update(Request $request, $id)
    {
        $info = $request->except('_token','_method');

        $messages = [
            'name.required'=>'必须填写名称',
            'status.integer'=>'必须选一个类型'
        ];
        $this->validate($request, [
            'name' => 'required',
            'status' => 'integer'
        ],$messages);
        $res = DB::table('type')->where('type_id',$id)->update($info);
        if($res){
            return redirect('admin/type')->with('msg','修改成功');
        }else{
            return redirect('admin/type')->with('msg','修改失败');
        }
    }


    public function destroy($id)
    {
        //
    }
}
