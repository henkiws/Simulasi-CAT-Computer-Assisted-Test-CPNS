<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.master.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function datatables(Request $request)
    {
        if($request->ajax()) {
            $select = User::with('user_detail')->get();
            // dd($select);
            $data = Datatables::of($select)
                ->editColumn('gender', function($select) {
                    return $select->user_detail->gender==1 ? "Laki laki" : "Perempuan";
                })
                ->editColumn('address', function($select) {
                    return $select->user_detail->address;
                })
                ->editColumn('date_birth', function($select) {
                    return $select->user_detail->date_birth;
                })
                ->editColumn('status', function($select) {
                    return $select->status == 1 ? "<label class='label label-success'>Active</label>" : "<label class='label label-danger'>Not Active</label>";
                })
                ->editColumn('role', function($select) {
                    return $select->getRoleNames();
                })
                ->addIndexColumn()
                ->rawColumns(['status']);

            return $data->make(true);
        }

        return abort('404', 'Upps');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
