<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
class CinemaController extends Controller
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
        $ob = DB::table('cinema');

        //dd($request);
        // 判断请求中是否含有name字段
        if($request->has('cinema_name')){
            // 获取搜索的条件
            $name = $request->input('cinema_name');
            //添加到将要带到分页中的数组
            $where['cinema_name'] = $name;
            //给查询语句添加where条件
            $ob->where('cinema','like','%'.$name.'%');
        }
        //执行分页查询
        $list = $ob->paginate(10);
        // dd($list);
        foreach ($list as $k=>$v){
        $region_name =  DB::table('region')->where('region_code',$v->region_code)->value('region_name');
            $list[$k]->region_name=$region_name;

        }
        // dd($list);
        // 加载模板的同时，把查询的数据，以及分页时需要携带的参数传到模板上
        return view('admin.cinemalist', ['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cinemaadd');
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
            'cinema_name.required' => '影院名称必须填写',
            'cinema_score.required' => '评分必须填写',
            'cinema_address.required' => '地址必须填写',
            'cinema_phone.required' => '联系方式必须填写',
            'cinema_movie.required' => '正在上映必须填写',
            'cinema_travel.required' => '交通信息必须填写',
            'region_code.integer' => '区域名称必须填写'
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'region_code' => 'integer',
            'cinema_name' => 'required',
            'cinema_score' => 'required',
            'cinema_address' => 'required',
            'cinema_phone' => 'required',
            'cinema_movie' => 'required',
            'cinema_travel' => 'required',
        ],$messages);
        //去除多余的字段
        $arr = $request->except('_token');
        //dd($arr);
        //执行添加
        $res = DB::table('cinema')->insert($arr);
        //dd($res);
        //判断添加是否成功
        if($res){
            return redirect('admin/cinema')->with('msg', '添加成功');
        }else{
            return redirect('/admin/cinema')->with('msg', '添加失败');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cinema_id)
    {
        //查询需要修改的用户的个人信息
        $cinema = DB::table('cinema')->where('cinema_id',$cinema_id)->first();
        //dd($cinema);
        // 加载修改页面并把个人信息传到模板上
        return view('admin.cinemaedit', ['cinema'=>$cinema,'cinema_id'=>$cinema_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cinema_id)
    {
        //去除多余不需要的字段
        $arr = $request->except('_token', '_method');
        // dd($arr);
        //dd($admin_name);
        // 执行修改
        $res = DB::table('cinema')->where('cinema_id', $cinema_id)->update($arr);
        //dd($res);
        // 判断修改是否成功
        if($res > 0){
            return redirect('admin/cinema')->with('msg', '修改成功');
        }else{
            return redirect('admin/cinema')->with('msg', '修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cinema_id)
    {
        $res1 = DB::table('room')->where('cid',$cinema_id)->get();
        if ($res1){
             return redirect('admin/cinema')->with('msg', '有影厅不能删除');
        }else
        {
            $res = DB::table('cinema')->where('cinema_id',$cinema_id)->delete();
            if($res > 0){
                return redirect('admin/cinema')->with('msg', '删除成功');
            }else{
                return redirect('admin/cinema')->with('msg', '删除失败');
            }
        }


    }
}
