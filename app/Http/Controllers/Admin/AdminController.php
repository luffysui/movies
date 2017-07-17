<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //后台首页
        return view('admin.index');
    }
//    public function create()
//    {
//        //后台首页
//        return view('admin.adminadd');
//    }

}
