<?php
if(isset($_POST)) {
        $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
        $score = htmlspecialchars(strip_tags(trim($_POST["score"])));
        if($name === "" || $score < 0) {
            echo 0;
            exit();
        }
        $datas_old = json_decode(file_get_contents('json/datas.json'));
        // var_dump($datas_old[0]);exit();
        $datas_old === null ? $datas = [] : $datas = $datas_old;
        $data = [];
        $data['name'] = $name;
        $data['score'] = $score;

        if(empty($datas)) {
            $datas[0] = $data;
            $json = json_encode($datas);
            file_put_contents('json/datas.json', $json);
            echo 1;
            exit();
        }

        $value = true;
        // $result = [];

        foreach ($datas as $key => $d) {
            if(intval($data['score']) >= intval($d->score)) {
                $result[] = $data;
                $result[$key+1] = $d;
            } else {
                $result[] = $d;
            }
        }
        // var_dump($result);exit();
        if($result != null) {
            $json = json_encode($result);
            file_put_contents('json/datas.json', $json);
            echo 1;
            exit();
        }
}



// if(isset($_POST)){
//     $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
//     $score = htmlspecialchars(strip_tags(trim($_POST["score"])));
//     if($name === "" || $score < 0) {
//         echo 0;
//         exit();
//     }
//     $datas_old = json_decode(file_get_contents('json/datas.json'));
//     $datas = [];
//     $datas['name'] = $name;
//     $datas['score'] = $score;
//     $merge = false;
//     var_dump('polp');exit();
//
//     if($datas_old !== null) $datas = $datas_old;
//
//     if(!empty($datas)){
//         foreach ($datas as $key => $data) {
//             if($key > 0) $old_key = $key-1;
//             if(isset($old_key)) {
//                 if(intval($data['score'][$key]) > intval($data['score'][$old_key])){
//                     $old_score = $data['score'][$old_key];
//                     $data['score'][$old_key] = $data['score'][$key];
//                     $data['score'][$key] = $old_score;
//                 }
//             }
//             $result[] = $data;
//         }
//     } else {
//         $result[0] = $datas
//     }
//     if($result != null) {
//         $json = json_encode($result);
//         file_put_contents('json/datas.json', $json);
//         echo 1;
//         exit();
//     }
//     var_dump('polp');exit();
//
//
//     // var_dump($datas_old); exit();
//     if($datas_old === null) {
//         $result[0] = $datas;
//         $merge = true;
//     } else {
//         // var_dump($datas, $datas_old, array_push($datas_old, $datas['name'], $datas['score']));exit();
//         $k = 1;
//         foreach ($datas_old as $key => $data) {
//             if($k === 1) {
//                 $scoreMin = intval($data->score);
//             } else{
//                 if($scoreMin >= intval($data->score)) {
//                     $scoreMin = intval($data->score);
//                     $i = $key;
//                 }
//             }
//             $k++;
//         }
//
//     }
//     if(isset($scoreMin) && $scoreMin < intval($score) && $k > 5) {
//         $merge = true;
//         unset($datas_old[$i]);
//     }
//     if(isset($k) && $k <= 5) {
//        $merge = true;
//    }
//     if($datas_old && $merge) $result = array_merge($datas_old, [$datas]);
//     // var_dump($merge);
//     if($result != null) {
//         $json = json_encode($result);
//         file_put_contents('json/datas.json', $json);
//         echo 1;
//         exit();
//     }
//
//
// } else {
//     echo 0;
//     exit();
// }
