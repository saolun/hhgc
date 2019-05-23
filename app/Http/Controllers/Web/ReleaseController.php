<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReleaseController extends Controller
{
    public function show()
    {
        return view('web.release');
    }

    public function  publishWayShow()
    {
        return view('web.publish_way');
    }
}
