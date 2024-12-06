<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Question;
use App\Models\User;
use App\Models\Ljk;
use App\Models\Answer_sheet;
use App\Models\Option;
use DB;

class QuestionController extends Controller
{
    public function index(Request $request)
    {   
        $ljk = Ljk::where('user_id',$request->session()->get('id'))->orderby('created_at','DESC')->first();
        if($ljk->status == 1){
            return redirect('profile');
        }
        $data = Answer_sheet::where('ljk_id',$ljk->id)->select('id','question_id','answer_id','ljk_id')->paginate(1);
        $sheet = Answer_sheet::where('ljk_id',$ljk->id)->get();
        Session::put('exam',true);
        $date = strtotime( $ljk->created_at );
        return view('master.question',compact('data','sheet','date'));
    }

    public function ajax(Request $request){
        $data = Answer_sheet::where('ljk_id',$request->ljk)->select('id','question_id','answer_id','ljk_id')->paginate(1);
        $question = Question::with(['option'])->where('id',$data[0]->question_id)->first();
        foreach($question->option as $dt){
            $options[] = [
                "id"=>$dt->id,
                "option"=>$dt->choise
            ];
        }
        $result = [
            "question" => ["id" => $question->id, "data" => $question->question],
            "options" => $options,
            'answer' => $data[0]->answer_id,
            'id' => $data[0]->id
        ];
        return response()->json($result);
    }

    public function answer(Request $request)
    {   
        DB::beginTransaction();
        try {
            //save answer user
            $data = Answer_sheet::find($request->id);
            $option = Option::find($request->answer);
            $data->update([
                "answer_id" => $request->answer,
                "value" => $option->answer
            ]);

            //update ljk skor
            $twk = Answer_sheet::where('question_group',1)->where('ljk_id',$request->ljk)->sum('value');
            $tiu = Answer_sheet::where('question_group',2)->where('ljk_id',$request->ljk)->sum('value');
            $tkp = Answer_sheet::where('question_group',3)->where('ljk_id',$request->ljk)->sum('value');
            $total = $twk+$tiu+$tkp;
            if($twk >= 80 && $tiu >= 75 && $tkp >= 143){
                $ket = "LULUS";
            }else{
                $ket = "TIDAK LULUS";
            }
            

            $ljk = Ljk::find($request->ljk);
            $ljk->update([
                "skor_twk" => $twk,
                "skor_tiu" => $tiu,
                "skor_tkp" => $tkp,
                "skor_total" => $total,
                "keterangan" => $ket
            ]);

            DB::commit();
            return response()->json(["status"=>true]);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(["status"=>false]);
        }
    }

    public function profile(Request $request)
    {   
        if($request->session()->get('exam')){
            return redirect('ujian');
        }
        $data = User::with(['user_detail'])->find($request->session()->get('id'));
        $history = Ljk::where('user_id',$request->session()->get('id'))->where('status',1)->orderBy('created_at','DESC')->paginate(10);
        return view('master.profile',compact('data','history'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $check = Ljk::where('user_id',$request->id)->orderBy('created_at','DESC')->first();
            if($check){
                if($check->status == 0){
                    return redirect('ujian');
                }
            }
            
            $ljk = LJK::create([
                "user_id"=>$request->id
            ]);
            
            $twk = Question::where('question_group',1)->limit(35)->inRandomOrder()->get();
            $tiu = Question::where('question_group',2)->limit(30)->inRandomOrder()->get();
            $tkp = Question::where('question_group',3)->limit(35)->inRandomOrder()->get();

            foreach($twk as $item){
                $data[]=[
                    "question_id"=>$item->id,
                    "ljk_id"=>$ljk->id,
                    'question_group'=>1
                ];
            }
            foreach($tiu as $item){
                $data[]=[
                    "question_id"=>$item->id,
                    "ljk_id"=>$ljk->id,
                    'question_group'=>2
                ];
            }
            foreach($tkp as $item){
                $data[]=[
                    "question_id"=>$item->id,
                    "ljk_id"=>$ljk->id,
                    'question_group'=>3
                ];
            }
            
            $save = Answer_sheet::insert($data);
            
            // roolback
            if($save){
                DB::commit();
                return redirect('ujian');
            }
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(["status"=>false]);
        }
    }

    public function skor(){
        return 'work';
    }

    public function finish(Request $request){
        DB::beginTransaction();
        try {
            $data = Ljk::find($request->ljk);
            if( empty($data->keterangan) ){
                return response()->json(["status"=>false]);
            }
            $data->update([
                "status" => 1,
                "finish_at" => date('Y-m-d H:m:s')
            ]);
            $request->session()->forget('exam');

            DB::commit();
            return response()->json(["status"=>true]);
        }catch(\Exception $e){
            dd($e->getMessage());
            DB::rollback();
            return response()->json(["status"=>false]);
        }
    }

}
