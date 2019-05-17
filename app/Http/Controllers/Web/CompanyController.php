<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function vip()
    {
        return view('web.vip');
    }

    //企业或团队
    public function companies()
    {
        return view('web.companies');
    }

    //找航哥
    public function boat()
    {
        return view('web.boat');
    }
}
