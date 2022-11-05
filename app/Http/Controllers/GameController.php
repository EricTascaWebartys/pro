<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\SpacewarriorScore;
// use App\Game\Class\User;
// use App\Game\Class\Datas;

class GameController extends Controller
{
    public function game() {
        return view('spacewarrior.index',[
            'game' => true
        ]);
    }

    // public function classement() {
    //     $datas = json_decode(file_get_contents(url('libs/spacewarrior/json/datas.json')));
    //     $class_user = url('libs/spacewarrior/class/User.php');
    //     $class_datas = url('libs/spacewarrior/class/Datas.php');
    //     return view('spacewarrior.classement',[
    //         'datas' => $datas,
    //         'class_user' => $class_user,
    //         'class_datas' => $class_datas
    //     ]);
    // }

    public function classement() {
        $scores = SpacewarriorScore::orderBy("score", "DESC")->limit(5)->get();
        return view("spacewarrior.classement",[
            'scores' => $scores
        ]);
    }

    public function datas_save(Request $request) {
                $score = new SpacewarriorScore();
                $score->name = $request->name;
                $score->score = $request->score;
                $score->save();
                echo 1;
                die();

    }
}
