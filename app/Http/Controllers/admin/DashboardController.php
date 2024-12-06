<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ljk;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $test = Ljk::where('status',0)->count();
        $user = User::count();
        $tot = LJK::count();
        $pg = Ljk::where('status',1)->where('keterangan','LULUS')->count();
        $non_pg = Ljk::where('status',1)->where('keterangan','TIDAK LULUS')->count();
        if($pg){
            $pg_ = ($pg / $tot) * 100;
        }else{
            $pg_ = 0;
        }
        if($non_pg){
            $non_ = ($non_pg / $tot) * 100;
        }else{
            $non_ = 0;
        }
        return view('admin.dashboard.index',compact('test','user','pg_','non_'));
    }
}
