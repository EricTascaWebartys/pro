<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleUploadTrait;
use App\Traits\TextTrait;

class Demo extends Model
{
    use HasFactory;
    use SimpleUploadTrait;
    use TextTrait;

    public function image_path(){
        return 'upload/demos/img/';
    }

    public function image_path_name(){
        return 'upload/demos/img/'. $this->image;
    }

    public function image_url(){
        if($this->image === null) {
            return asset('img/default/demo.jpg');
        }
        return asset("". $this->image_path() . $this->image ."");
    }

    public function delete_image() {
        if(file_exists(self::image_path_name()) && $this->image !== null) {
             unlink(self::image_path_name());
             $this->image = null;
        }
    }

    public function delete_demo() {
        if(file_exists(self::image_path_name()) && $this->image !== null) {
             unlink(self::image_path_name());
        }
        parent::delete();
    }
}
