<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=[
            "name"=>$request->nama,
            "email"=>$request->email,
            "password"=>bcrypt($request->password)
        ];
        User::create($data);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $data = User::where('email',$request->email)->first();
        if($data){
            if(Hash::check($request->password,$data->password)){
                Session::put('id',$data->id);
                Session::put('email',$data->email);
                Session::put('status',TRUE);
                return redirect('ujian');
            }else{
                return redirect('/');    
            }
        }else{
            return redirect('/');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

}
