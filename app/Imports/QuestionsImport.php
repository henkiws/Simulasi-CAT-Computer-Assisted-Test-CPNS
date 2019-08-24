<?php

namespace App\Imports;

use App\User;
use App\Models\Question;
use App\Models\Option;
// use Maatwebsite\Excel\Concerns\toArray;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class QuestionsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $row)
    {
        for($a=1; $a<count($row);$a++){
            // dd($row[$a]);
            $data = [
                'question' => $row[$a][0],
                'question_group' => $row[$a][1],
                'question_type' => $row[$a][2],
                'istext' => 1,
                'information' => null,
                'pembahasan' => null
            ];
            $question = Question::create($data);
            // echo $question->id.'<br>';
            // $options=[];
            for($b=0;$b<5;$b++){
                $options = [
                    'question_id' => $question->id,
                    'choise' => $row[$a][3+$b],
                    'answer' => ($row[$a][8+$b] != null) ? $row[$a][8+$b] : 0 ,
                    'istext' => 1
                ];
                Option::create($options);
            }
        }
        return true;
    }
}
