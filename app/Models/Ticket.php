<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TextTrait;

class Ticket extends Model
{
    use HasFactory;
    use TextTrait;

    public function user(){
            if($this->user_id === null) return false;
            return $this->belongsTo(User::class);
    }

    public function children() {
        return Ticket::where('number', $this->number)->get();
    }

    public function delete_ticket() {
        $children = self::children();
        if($children->count() > 0) {
            foreach ($children as $key => $child) {
                $child->delete();
            }
        }

        parent::delete();
    }

}
