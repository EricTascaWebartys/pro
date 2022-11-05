<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TextTrait;
use App\Traits\SimpleUploadTrait;

class Information extends Model
{
    use HasFactory;
    use TextTrait;
    use SimpleUploadTrait;

    public function siren() {
        if($this->siret !== null) return substr($this->siret, -14, 9);
        return "XXXXX";
    }

    public function full_name() {
        if($this->firstname === null) $this->firstname = "eric";
        if($this->lastname === null) $this->lastname = "tasca";

        return ucfirst($this->firstname) . " " . ucfirst($this->lastname);

    }

    public function full_address() {
        return $this->address . "<br>" . $this->zip ." ". ucfirst($this->city) . "<br>" . $this->country;
    }

    public function image_path(){
        return 'upload/information/img/';
    }

    public function image_path_name(){
        return 'upload/information/img/'. $this->image;
    }

    public function image_url(){
        if($this->image === null) {
            return asset('img/default/user-1.png');
        }
        return asset("". $this->image_path() . $this->image ."");
    }

    public function delete_image() {
        if(file_exists(self::image_path_name()) && $this->image !== null) {
             unlink(self::image_path_name());
             $this->image = null;
        }
    }
}
