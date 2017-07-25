<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DownController extends Controller
{
    public function index()
    {
        //下载页面
        return view('home.download');
    }
    public function down()
    {

    }

}
