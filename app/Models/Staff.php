<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleUploadTrait;
use App\Traits\TextTrait;

class Staff extends Model
{
    use SimpleUploadTrait;
    use TextTrait;

    protected $table = 'staffs';


    protected $attributes = [
    ];

    public function full_name() {
        return ucfirst($this->firstname) . " " . ucfirst($this->lastname);
    }
    public function short_name() {
        return ucfirst($this->firstname) . " " . substr(ucfirst($this->lastname), 0, 1);
    }
    public function image_path(){
        return 'upload/team/img/';
    }

    public function image_path_name(){
        return 'upload/team/img/'. $this->image;
    }

    public function image_url(){
        if($this->image === null) {
            return asset('img/default/team.jpg');
        }
        return asset("". $this->image_path() . $this->image ."");
    }

    public function delete_image() {
        if(file_exists(self::image_path_name()) && $this->image !== null) {
             unlink(self::image_path_name());
             $this->image = null;
        }
    }

    public function delete_staff() {
        if(file_exists(self::image_path_name()) && $this->image !== null) {
             unlink(self::image_path_name());
        }
        parent::delete();
    }
}
