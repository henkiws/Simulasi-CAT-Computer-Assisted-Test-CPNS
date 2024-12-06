<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Ljk;
use App\Models\User;
use App\Models\Answer_sheet;

class LJKController extends Controller
{   
    public function index(){
        return view('admin.ljk.index');
    }

    public function datatables(Request $request)
    {
        if($request->ajax()) {
            $select = Ljk::with('user')->where('status',1)->get();
            $data = Datatables::of($select)
                ->addColumn('action', function($select) {
                    $action = '<a href="'.url('admin/ljk/detail').'/'.$select->id.'" class="btn btn-primary">Detail</a>';
                    return $action;
                })
                ->editColumn('user', function($select) {
                    return $select->user->name;
                })
                ->editColumn('keterangan', function($select) {
                    return $select->keterangan == "LULUS" ? "<label class='label label-success'>Passing Grade</label>" : "<label class='label label-danger'>Not Passing Grade</label>";
                })
                ->rawColumns(['keterangan','action'])
                ->addIndexColumn();

            return $data->make(true);
        }

        return abort('404', 'Upps');
    }

    public function detail(Request $request)
    {
        $id = $request->id;
        return view('admin.ljk.detail',compact('id'));
    }

    public function detail_datatables(Request $request){
        if($request->ajax()) {
            $select = Answer_sheet::with(['question:id,question','question.option','answer:id,choise'])
                    ->where('ljk_id',$request->id)->get();
            $data = Datatables::of($select)
                ->editColumn('question', function($select) {
                    return $select->question->question;
                })
                ->editColumn('choise', function($select) {  
                    $val = '';
                    foreach($select->question->option as $item){
                        $val .= $item->answer == 5 ? '<li><strong><font color="green">'.$item->choise.'</font></strong></li>' : '<li>'.$item->choise.'</li>';
                    }
                    return "<ol type='A'>".$val."</ol>";
                })
                ->editColumn('answer', function($select) {
                    return (!empty($select->answer->choise)) ? $select->answer->choise : "Null";

                })
                ->editColumn('skor', function($select) {
                    return (!empty($select->value)) ? $select->value : "0" ;
                })
                ->rawColumns(['choise'])
                ->addIndexColumn();

            return $data->make(true);
        }

        return abort('404', 'Upps');
    }

}
