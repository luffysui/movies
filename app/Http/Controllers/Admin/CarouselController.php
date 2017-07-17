<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use DB;

use Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CarouselController extends Controller
{
    public function index()
    {
        $carousel = DB::table('carousel')
            ->join('movie','movie.movie_id','=','carousel.movie_id')
            ->select('movie.name as moviename','carousel.carousel_id','carousel.name','carousel.photo','carousel.display')
            ->get();
//dd($carousel);
        return view('admin/carlist',['car'=>$carousel]);
    }


    public function create()
    {
        $movies = DB::table('movie')->get();
        return view('admin/carousel',['movies'=>$movies]);
    }

    //添加轮播图
    public function store(Request $request)
    {
//表单验证
        $messages = [
            'name.required'=>'名称必须填写',
            'movie_id.integer'=>'必须选择对应电影'
        ];
        $this->validate($request, [
            'name' => 'required',
            'movie_id' => 'integer'
        ],$messages);

        if ($request->hasFile('photo')) {
            // 判断文件是否有效
            if ($request->file('photo')->isValid()) {
                //生成上传文件对象
                $file = $request->file('photo');
            }else{
                return redirect('admin/craousel')->with('msg','文件无效');
            }
            //获取源文件的后缀
            $ext = $file->getClientOriginalExtension();
            //生成一个新文件名
            $picname = time().rand(1000,9999).'.'.$ext;
            //移动文件
            $file->move('./upload/carousel', $picname);
            //如果有错误
            if($file->getError() > 0){
                return redirect()->back()->with('msg', '上传失败');
            }else{
                //没有错误则入库
                $arr = $request->except('_token');
                $arr['photo'] = $picname;

                //写入数据
                $res = DB::table('carousel')->insert($arr);
                if($res){
                    return redirect('admin/carousel')->with('msg','添加成功');
                }else{
                    return redirect('admin/carousel')->with('msg','添加失败');
                }
            }
        }else{
            return redirect()->back()->with('msg','无图片，不能添加');
        }
    }


    public function show($idanddisplay)
    {
        //前台传过来的数据格式为：id and display
        //将数据串转换成可操作的数组格式
        $arr = explode('and',$idanddisplay);
        //修改禁用或启用状态
        if($arr[1]==1){
            $res = DB::table('carousel')->where('carousel_id',$arr[0])->update(['display'=>0]);
            if($res){
                return redirect('admin/carousel');
            }else{
                return redirect('admin/carousel');
            }
        }else{
            $res = DB::table('carousel')->where('carousel_id',$arr[0])->update(['display'=>1]);
            if($res){
                return redirect('admin/carousel');
            }else{
                return redirect('admin/carousel');
            }
        }
    }
//修改页面
    public function edit($id)
    {
        $movies = DB::table('movie')->get();
        $info = DB::table('carousel')->where('carousel_id',$id)->first();
        return view('admin/caredit',['id'=>$id,'info'=>$info,'movies'=>$movies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'name.required'=>'名称必须填写',
            'movie_id.integer'=>'必须选择对应电影'
        ];
        $this->validate($request, [
            'name' => 'required',
            'movie_id' => 'integer'
        ],$messages);

        $arr = $request->except('_token','_method','photo');
        if($request->hasFile('photo')){
            // 判断文件是否有效
            if ($request->file('photo')->isValid()) {
                //生成上传文件对象
                $file = $request->file('photo');
            }
            //获取源文件的后缀
            $ext = $file->getClientOriginalExtension();
            //生成一个新文件名
            $picname = time().rand(1000,9999).'.'.$ext;
            //移动文件
            $file->move('./upload/carousel/', $picname);
            $arr['photo']=$picname;

            //获取旧文件名
            $photo = DB::table('carousel')->where('carousel_id',$id)->value('photo');
            //删除旧文件
            Storage::delete('carousel/'.$photo);
        }

        //修改数据库
        $res = DB::table('carousel')->where('carousel_id',$id)->update($arr);

        if($res){
            return redirect('admin/carousel')->with('msg','修改成功');
        }else{
            return redirect('admin/carousel')->with('msg','修改失败，内容没有改变');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('carousel')->where('carousel_id',$id)->delete();
        if($res){
            return redirect('admin/carousel')->with('msg','删除成功');
        }else{
            return redirect('admin/carousel')->with('msg','删除失败');
        }
    }
}
