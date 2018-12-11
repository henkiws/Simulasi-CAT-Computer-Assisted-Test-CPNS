<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Option;
use Yajra\DataTables\Facades\DataTables;

class MasterQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('admin.master.question.index');
    }

    public function datatables(Request $request)
    {
        if($request->ajax()) {
            $select = Question::all();
            $data = Datatables::of($select)
                ->addColumn('action', function($select) {
                    $action = '<a class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <form method="post" action="'.url('admin/question/'. $select->id).'" onclick="return confirm(\'Are you sure delete this data?\')">
                                    '.csrf_field().'
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>';
                    return $action;
                })
                ->editColumn('group', function($select) {
                    return ($select->question_group==1) ? "TWK" : (($select->question_group==2) ? "TIU" : "TKP");
                })
                ->editColumn('pilihan', function($select) {
                    return '<button name="view_pil" id="'.$select->id.'" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i>';
                })
                ->editColumn('jenis', function($select) {
                    return $select->question_type;
                })
                ->editColumn('pertanyaan', function($select) {
                    return $select->istext==1 ? $select->question : "<img src='".url('img/question')."/".$select->question."' class='img'>";
                })
                ->addIndexColumn()
                ->rawColumns(['action','pilihan','pertanyaan']);

            return $data->make(true);
        }

        return abort('404', 'Upps');
    }

    public function ajax(Request $request, $id)
    {   
        if($request->ajax()) {
            $data=Option::where('question_id',$id)->get(['choise','answer']);
            return $data->toJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->sumber_soal == 1){
            $question=$request->question_text;
        }else{
            $image = $request->question_img;
            $question = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME).'_'.sha1($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path() . '/img/question';
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 666, true);
            }
            $image->move($destinationPath,$question);
        }

        $data=[
            "question"=>$question,
            "question_type"=>$request->question_type,
            "question_group"=>$request->question_group,
            "istext"=>$request->sumber_soal,
            "information"=>$request->information,
        ];
        $dt = Question::create($data);
        foreach(range(0,9) as $key=>$val){
            if($request->sumber_jawaban==1){
                if($key%2==0){
                    $arr=$key/2;
                    $data=[
                        "question_id"=>$dt->id,
                        "choise"=>$request->choise[$arr],
                        "answer"=>$request->answer[$key] == null ? 0 : $request->answer[$key],
                        "istext"=>$request->sumber_jawaban
                    ];
                    Option::create($data);
                }
            }else{
                if($key%2==1){
                    $data=[
                        "question_id"=>$dt->id,
                        "choise"=>$request->choise[$key],
                        "answer"=>$request->answer[$key] == null ? 0 : $request->answer[$key],
                        "istext"=>$request->sumber_jawaban
                    ];
                    Option::create($data);
                }
            }
            
        }
        return redirect('admin/question/create');
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
        Question::find($id)->delete();
        Option::where('question_id',$id)->delete();
        return redirect('admin/question');
    }
}
