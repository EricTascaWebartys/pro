<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationUser extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function application() {
        return $this->belongsTo(Application::class);
    }

    public function color() {
        if($this->date_limit === null) return false;
        $now = new \Datetime();
        // $now = $now->format("Y-m-d");
        $date = date("Y-m-d", strtotime($this->date_limit));
        $date = new \Datetime($this->date_limit);
        $interval = $now->diff($date);

        if($interval->days <= 7) return "text-danger";
        if($interval->days <= 30) return "text-warning";
        return 'text-info';
    }
}
