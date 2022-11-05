<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Testimony;
use App\Models\Notification;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function testimony($token=null) {
        if(Auth::user()->isDev() && $token !== null) {
            $testimony = Testimony::where('token',  $token)->first();

        } else {
            $testimony = Testimony::where('token',  Auth::user()->token)->first();
            if($testimony === null ) $testimony = new Testimony();
        }

        return view('back.client.testimony.form', [
            'testimony' => $testimony,
        ]);
    }

    public function testimony_post(Request $request) {

        if($request->token === null) {
            $testimony = new Testimony();
            $testimony->token = Auth::user()->token;
            $testimony->lastname = Auth::user()->lastname;
            $testimony->firstname = Auth::user()->firstname;
            $testimony->type = "client";
            $testimony->user_id = Auth::user()->id;
            $message = 'Avis ajouté avec succès';
            $title_notification = "Témoignage ajouté";
            $message_notification = Auth::user()->full_name() ." a donné son avis";
        } else {
            $testimony = Testimony::where('token',  Auth::user()->token)->first();
            if($testimony === null) return back();
            $message = 'Avis modifié avec succès';
            $title_notification = "Témoignage modifié";
            $message_notification = Auth::user()->full_name() ." a modifié son avis";

        }

        $testimony->text = $request->text;
        $testimony->note = $request->note;

        $testimony->active = null;

        $validator = Validator::make($request->all(), [
             'text' => 'required|max:800',
             'note' => 'required',
         ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        if(file_exists($request->image)) {
            $validator = Validator::make($request->all(), [
                 'image' => 'mimes:jpg,png,jpeg|max:10240',
             ]);
            $testimony->image = $testimony->uploadImageResize($request->image, $testimony->image_path(), 200);
        }
        $testimony->save();
        $developpers = User::where('role', "ROLE_DEV")->get();
        foreach ($developpers as $key => $developper) {
            $notification = new Notification();
            $notification->title = $title_notification;
            $notification->text = $message_notification;
            $notification->type = 'message';
            $notification->token = Auth::user()->token;
            $notification->user_id = $developper->id;
            $notification->save();
        }

        return redirect()->route('user.profile')->with('message', $message);
    }

    public function testimony_delete_image($token=null) {
        $testimony = Testimony::where('token', $token)->first();
        if($testimony === null) return redirect()->route('logout');
        if(Auth::user()->role !== "ROLE_DEV" && Auth::user()->token !== $testimony->token) return redirect()->route('logout');
        $testimony->delete_image();
        $testimony->save();
        return back();
    }

    public function testimony_delete($token=null) {
        $testimony = Testimony::where('token', $token)->first();
        if($testimony === null) return redirect()->route('logout');
        $testimony->delete_testimony();
        return redirect()->route('testimonies.list')->with('message', 'Avis supprimé');
    }

    public function client_edit($token) {
        $user = User::where('token', $token)->first();
        if(Auth::user()->token !== $token) return redirect()->route('logout');
        if($user === null) return redirect()->route('dashboard');
        return view('back.user.form', [
            'user' => $user
        ]);

    }
    public function client_edit_post(Request $request) {
        $user = Auth::user();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->phone_home = $request->phone_home;
        $user->siret = $request->siret;
        $user->address = $request->address;
        $user->zip = $request->zip;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->website = $request->website;
        $user->gender = intval($request->gender);
        $user->company = $request->company;

        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if(file_exists($request->image)) {
            $validator = Validator::make($request->all(), [
                'image' => 'mimes:jpg,png,jpeg|max:10240',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $user->image = $user->uploadImageResize($request->image, $user->image_path(), 300);

        }

        $user->save();
        return redirect()->route('user.profile',['token'=> $user->token])->with('message', 'Profil modifié avec succès');
    }

    public function client_delete_image() {
        $user = Auth::user();
        if($user === null) return redirect()->route('logout');
        $user->delete_image();
        $user->save();
        return redirect()->route("user.profile",["token" => $user->token ])->with('message', 'image supprimée');
    }

    public function client_delete_confirm($token) {
        if(Auth::user()->isDev()) {
            $user = User::where('token', $token)->first();
        } else {
            $user = Auth::user();
        }
        if($user === null) return redirect()->route('dashboard');
        return view('back.client.form_delete',[
            'user' => $user
        ]);
    }
    public function client_delete_confirm_post(Request $request){
        $user = Auth::user();
        if($user === null) return redirect()->route('logout');

        $developpers = User::where('role', "ROLE_DEV")->get();
        if($developpers->count() > 0) {
            foreach ($developpers as $key => $developper) {
                $notification = new Notification();
                $notification->title = "Compte supprimé";
                $notification->text = $user->full_name() . " a supprimé son compte";
                $notification->type = 'message';
                $notification->token = Auth::user()->token;
                $notification->user_id = $developper->id;
                $notification->save();
            }
        }


        $user->delete_user();
        return redirect()->route('logout');
    }

    public function client_products_list($token){
        $user= Auth::user();
        if($user->token !== $token) return redirect()->route('dashboard');
        $products = Product::where('user_id', $user->id)->get();
        return view('back.client.product.list', [
            "products" => $products,
            "datatable" => true
        ]);
    }
}
