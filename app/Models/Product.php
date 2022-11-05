<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user(){
            if($this->user_id === null) return false;
            return $this->belongsTo(User::class);
    }

    public function package(){
            return $this->belongsTo(Package::class);
    }
}
