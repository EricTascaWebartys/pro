<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\traits\TextTrait;

class Package extends Model
{
    use HasFactory;
    use TextTrait;

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function fr_duration() {
        if($this->duration === "1-month") return "1 mois";
        if($this->duration === "3-month") return "3 mois";
        if($this->duration === "6-month") return "6 mois";
        if($this->duration === "1-year") return "1 an";
        if($this->duration === "2-years") return "2 ans";
        if($this->duration === "3-years") return "3 mois";
        return "N-C";
    }
}
