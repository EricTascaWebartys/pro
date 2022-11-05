<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public function user(){
            return $this->belongsTo(User::class);
    }

    public function icon_type() {
        if($this->type === "message") return "mdi mdi-message";
        if($this->type === "buy") return "mdi mdi-cart-outline";
        if($this->type === "buy-info") return "mdi mdi-cart-outline";
        if($this->type === "alert") return "mdi mdi-message";
        return "mdi mdi-martini";
    }

    public function icon_color() {
        if($this->type === "message") return "bg-warning";
        if($this->type === "buy") return "bg-success";
        if($this->type === "buy-info") return "bg-info";
        if($this->type === "alert") return "bg-danger";
        return "bg-primary";
    }
}
