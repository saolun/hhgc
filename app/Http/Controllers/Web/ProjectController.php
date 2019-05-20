<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function sala()
    {
        return view('web.project_sala');
    }

    //项目详情
    public function detail(Request $request)
    {
        $projectId = $request->id;

        return view('web.project_detail');
    }
}
