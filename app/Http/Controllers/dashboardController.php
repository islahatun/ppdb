<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\student;
use Illuminate\Http\Request;

class dashboardController extends Controller
{

    public function index(){
        $jurusan  =jurusan::withCount('student')->get();

        $data   = [
            'type_menu'     => 'dashboard',
            'count_jurusan' => $jurusan,
        ];
        return view('pages.dashboard.index',$data);
    }

    
}
