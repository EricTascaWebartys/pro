<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\TextTrait;
use App\Traits\SimpleUploadTrait;

class User extends Authenticatable
{
    use Notifiable;
    use TextTrait;
    use SimpleUploadTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function applications()
    {
        return $this->belongsToMany(Application::class);
    }

    public function application_users() {
        return $this->hasMany(ApplicationUser::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class)->orderBy('created_at', "desc");
    }

    public function testimonies() {
        return $this->hasMany(Testimony::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function checkJob($lang) {
        if($lang === "fr" || $this->job_en === null) return $this->job;
        return $this->job_en;
    }

    public function testimony_post_url(){
        if($this->role === "ROLE_DEV") return "admin.testimony.post";
        return "client.testimony.post";
    }

    public function url_icon_gender() {
        $this->gender === 0 ? $img = 'user-2.png' : $img = 'user-1.png';
        return asset('img/'.$img);
    }

    public function full_name() {
        return ucfirst($this->firstname) . " " . ucfirst($this->lastname);
    }

    public function siren() {
        if($this->siret !== null) return substr($this->siret, -14, 9);
        return "XXXXX";
    }

    public function full_address() {
        return $this->address . "<br>" . $this->zip ." ". ucfirst($this->city) . "<br>" . $this->country;
    }

    public function profile_complete() {
        $this->firstname !== null ? $n1 = 1 : $n1 = 0;
        $this->lastname !== null ? $n2 = 1 : $n2 = 0;
        $this->phone !== null ? $n3 = 1 : $n3 = 0;
        $this->phone_home !== null ? $n4 = 1 : $n4 = 0;
        $this->company !== null ? $n5 = 1 : $n5 = 0;
        $this->siret !== null ? $n6 = 1 : $n6 = 0;
        $this->gender !== null ? $n7 = 1 : $n7 = 0;
        $this->address !== null ? $n8 = 1 : $n8 = 0;
        $this->zip !== null ? $n9 = 1 : $n9 = 0;
        $this->city !== null ? $n10 = 1 : $n10 = 0;
        $this->country !== null ? $n11 = 1 : $n11 = 0;
        $this->image !== null ? $n12 = 1 : $n12 = 0;
        $total = $n1 + $n2 + $n3 + $n4 + $n5 + $n6 + $n7 + $n8 + $n9 + $n10 + $n11 + $n12;
        return $total*100/12;
    }

    public function create_client_number(){
        $this->client_number= rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    }

    public function create_client_id(){
        $this->client_id = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    }

    public function company_name() {
        if($this->company === null) return "N-C";
        return ucfirst($this->company);
    }

    public function isDev() {
        $this->role === "ROLE_DEV" ? $value = true : $value = false;
        return $value;
    }

    public function isAdmin() {
        $this->role === "ROLE_ADMIN" ? $value = true : $value = false;
        return $value;
    }

    public function isSuperAdmin() {
        $this->role === "ROLE_SUPER_ADMIN" ? $value = true : $value = false;
        return $value;
    }

    public function isClient() {
        $this->role === "ROLE_CLIENT" ? $value = true : $value = false;
        return $value;
    }

    public function getRole() {
      if($this->role === "ROLE_DEV") return "développeur";
      if($this->role === "ROLE_SUPER_ADMIN") return "super admin";
      if($this->role === "ROLE_ADMIN") return "admin";
        return "client";
    }

    public function image_path(){
        return 'upload/user/img/';
    }

    public function image_path_name(){
        return 'upload/user/img/'. $this->image;
    }

    public function image_url(){
        if($this->image === null) {
            if($this->gender === 0) return asset('img/default/user-2.png');
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

    public function delete_user() {
        if(file_exists(self::image_path_name()) && $this->image !== null) {
             unlink(self::image_path_name());
        }
        $testimonies = self::testimonies()->get();
        if($testimonies->count() > 0) {
            foreach ($testimonies as $key => $testimony) {
                $testimony->delete_testimony();
            }
        }
        $notifications = self::notifications()->get();
        if($notifications->count() > 0) {
            foreach ($notifications as $key => $notification) {
                $notification->delete();
            }
        }
        $products = self::products()->get();
        foreach ($products as $key => $product) {
            $product->user_id = null;
            $product->save();
        }
        $tickets = self::tickets()->get();
        foreach ($tickets as $key => $ticket) {
            $ticket->delete_ticket();
        }
        parent::delete();
    }

    // public static function boot() {
    //     parent::boot();
    //
    //     static::deleting(function($user) { // before delete() method call this
    //          $user->photos()->delete();
    //          // do the rest of the cleanup...
    //     });
    // }
}
