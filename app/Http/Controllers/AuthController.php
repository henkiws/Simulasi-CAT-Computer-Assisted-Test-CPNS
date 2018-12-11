<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\UserDetail;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if($request->session()->get('id')){
            return redirect('profile');
        }
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
        $this->validate($request,[
            "nama"=>"required",
            "email"=>"required",
            "date_birth"=>"required",
            "gender"=>"required",
            "address"=>"required",
        ]);
        $data=[
            "name"=>$request->nama,
            "email"=>$request->email,
            "password"=>bcrypt($request->password)
        ];
        $user = User::create($data);
        UserDetail::create([
            "user_id"=>$user->id,
            "date_birth"=>$request->date_birth,
            "gender"=>$request->gender,
            "address"=>$request->address
        ]);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $data = User::where('email',$request->email)->first();
        if($data){
            if($data->status == 0){
                return redirect('/');
            }
            if(Hash::check($request->password,$data->password)){
                Session::put('id',$data->id);
                Session::put('email',$data->email);
                Session::put('status',TRUE);
                return redirect('profile');
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

    public function forget(){
        return view('master.forget');
    }

    public function forget_password(Request $request){
        // dd($request->email);
        return redirect('/');
    }

}
