<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recaptcha extends Model
{
    use HasFactory;
    function captchaverify($recaptcha){
     $url = "https://www.google.com/recaptcha/api/siteverify";
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_HEADER, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
     curl_setopt($ch, CURLOPT_POST, true);
     curl_setopt($ch, CURLOPT_POSTFIELDS, array(
     "secret"=>"6LeYIdMdAAAAADpc2uzNQ5y20esgmc7F8PGQr2PY","response"=>$recaptcha));
     $response = curl_exec($ch);
     curl_close($ch);
     $data = json_decode($response);
     return $data->success;
 }
}
