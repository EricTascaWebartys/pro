<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleUploadTrait;

class Application extends Model
{
    use HasFactory;
    use SimpleUploadTrait;

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function application_users() {
        return $this->hasMany(ApplicationUser::class);
    }

    public function image_path(){
        return 'upload/application/img/';
    }

    public function image_path_name(){
        return 'upload/application/img/'. $this->image;
    }

    public function image_url(){
        if($this->image === null) {
            return asset('img/default/demo.webp');
        }
        return asset("". $this->image_path() . $this->image ."");
    }

    public function delete_image() {
        if(file_exists(self::image_path_name()) && $this->image !== null) {
             unlink(self::image_path_name());
             $this->image = null;
        }
    }

    public function delete_application() {
        if(file_exists(self::image_path_name()) && $this->image !== null) {
             unlink(self::image_path_name());
        }
        $application_users = self::application_users()->get();
        if($application_users->count() > 0) {
            foreach ($application_users as $key => $application_user) {
                $application_user->delete();
            }
        }
        parent::delete();
    }
}
