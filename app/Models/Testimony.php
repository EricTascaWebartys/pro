<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleUploadTrait;
// use App\Traits\ImageResize;
use App\Traits\TextTrait;

class Testimony extends Model
{
    use SimpleUploadTrait;
    // use ImageResize;
    use TextTrait;

    protected $attributes = [
    ];

    public function user(){
            return $this->belongsTo(User::class);
    }

    public function full_name() {
        return ucfirst($this->firstname) . " " . ucfirst($this->lastname);
    }
    public function short_name() {
        return ucfirst($this->firstname) . " " . substr(ucfirst($this->lastname), 0, 1);
    }
    public function image_path(){
        return 'upload/testimonies/img/';
    }

    public function image_path_name(){
        return 'upload/testimonies/img/'. $this->image;
    }

    public function image_url(){
        if($this->image === null) {
            if(self::user()->first()->image === null) {
                return asset('img/default/user-testimony.webp');
            }
            return self::user()->first()->image_url();
        }
        return asset("". $this->image_path() . $this->image ."");
    }

    public function image_note() {
        if($this->note !== null) return asset('img/stars/' . $this->note . '.png');
        return asset('img/stars/5.png');
    }

    public function delete_image() {
        if(file_exists(self::image_path_name()) && $this->image !== null) {
             unlink(self::image_path_name());
             $this->image = null;
        }
    }

    public function delete_testimony() {
        if(file_exists(self::image_path_name()) && $this->image !== null) {
             unlink(self::image_path_name());
        }
        parent::delete();
    }

   //  public static function boot() {
   //         parent::boot();
   //         self::deleting(function(){
   //             self::delete();
   //         //     if(file_exists($this->parent->image_path_name()) && $this->parent->image !== null) {
   //         //         unlink(self::image_path_name());
   //         //
   //         // }
   //     });
   // }
}
