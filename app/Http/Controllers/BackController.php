<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Testimony;
use App\Models\Product;
use App\Models\Work;
use App\Models\Staff;
use App\Models\Information;
use App\Models\Demo;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BackController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('check.admin');
    }

    // public function dashboard() {
    //     if(Auth::user()->is_connected === null) {
    //         Auth::user()->is_connected = 1;
    //         Auth::user()->save();
    //     }
    //     $devs = User::where("role", 'ROLE_DEV')->where("is_connected", 1)->get();
    //     $devs->count() > 0 ? $dev_connected = 1 : $dev_connected = null;
    //     $information = Information::where('name', 'info')->first();
    //     $members = User::where('role', "ROLE_CLIENT")->count();
    //     $number_products = Product::all()->count();
    //     $products = Product::all();
    //     $percent_profil = intval(Auth::user()->profile_complete());
    //     return view('back.home',[
    //         'information' => $information,
    //         'members' => $members,
    //         'number_products' => $number_products,
    //         'products' => $products,
    //         'percent_profil' => $percent_profil,
    //         'dev_connected' => $dev_connected,
    //         'home' => true
    //     ]);
    // }

    public function testimony_add() {
        $testimony = new Testimony();
        return view('back.testimony.form', [
            'testimony' => $testimony
        ]);
    }


    public function testimony_add_post(Request $request) {
        $testimonies = Testimony::all();
        $position = $testimonies->count() + 1;
        $testimony = new Testimony();
        $testimony->lastname = $request->lastname;
        $testimony->firstname = $request->firstname;
        $testimony->job = $request->job;
        $testimony->text = $request->text;
        $testimony->position = $position;
        $testimony->token = uniqid('', 60);
        $testimony->user_id = Auth::user()->id;

        if(file_exists($request->image)) {
            // $img = $testimony->imgResize($request->image, $testimony->image_path(), 200);
            // $testimony->image = $testimony->uploadFile($request->image, $testimony->image_path());
            $testimony->image = $testimony->uploadImageResize($request->image, $testimony->image_path(), 300);

        }
        $testimony->save();
        return redirect()->route('testimonies.list')->with('message', 'Avis ajouté avec succès');
    }

    public function testimony_edit($id) {
        $testimony = Testimony::where('id', $id)->first();
        return view('back.testimony.form', [
            'testimony' => $testimony
        ]);
    }

    public function testimony_edit_post(Request $request) {

        $testimony = Testimony::where('token', $request->token)->first();
        $testimony->lastname = $request->lastname;
        $testimony->firstname = $request->firstname;
        $testimony->job = $request->job;
        $testimony->text = $request->text;
        if(file_exists($request->image)) {
            $testimony->image = $testimony->uploadImageResize($request->image, $testimony->image_path(), 300);

            // $testimony->image = $testimony->uploadFile($request->image, $testimony->image_path());

        }
        $testimony->save();
        return back()->with('message', 'Avis modifié  avec succès');
    }

    public function testimonies_list() {
        $testimonies = Testimony::where('type', null)->get();
        return view('back.testimony.list', [
            'testimonies' => $testimonies,
            'homepage_testimonies' => true,
            'datatable' =>true

        ]);
    }

    public function testimony_delete_image($token) {
        $testimony = Testimony::where('token', $token)->first();
        if($testimony === null) return redirect()->route('logout');
        $testimony->delete_image();
        $testimony->save();
        return back();
    }

    public function testimony_delete($token) {
        $testimony = Testimony::where('token', $token)->first();
        if($testimony === null) return redirect()->route('logout');
        $testimony->delete_testimony();
        return redirect()->route('testimonies.list')->with('message', 'Avis supprimé');
    }

    public function testimonies_clients_list() {
        $testimonies = Testimony::where('type', 'client')->get();
        return view('back.testimony.list', [
            'testimonies' => $testimonies,
            'datatable' =>true
        ]);
    }
// ----------------------------------------------------------temoignaagne du client----------------------------------------
    public function client_testimony_post(Request $request) {

        $testimony = Testimony::where('token',  $request->token)->first();
        if($testimony === null) return back();
        $message = 'Avis modifié avec succès';
        $request->active === "on" ? $active = 1 : $active = null;

        $testimony->text = $request->text;
        $testimony->note = $request->note;
        $testimony->active = $active;

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
            $testimony->image = $testimony->uploadImageResize($request->image, $testimony->image_path(), 200);
        }
        $testimony->save();

        $client = User::where('token', $testimony->token)->first();

        if($client !== null && $active !== null) {
            $notification = new Notification();
            $notification->title = "Avis";
            $notification->text = "Votre avis est en ligne";
            $notification->type = 'message';
            $notification->token = Auth::user()->token;
            $notification->user_id = $client->id;
            $notification->save();
        }

        return back()->with('message', $message);
    }

// --------------------------------------------------DEMO-----------------------------------------------------------
    public function demos_list() {
        $demos = Demo::all();
        return view('back.demo.list', [
            'demos' => $demos,
            'datatable' =>true
        ]);
    }
    public function demo_add() {
        $demo = new Demo();
        return view('back.demo.form', [
            'demo' => $demo
        ]);
    }
    public function demo_add_post(Request $request) {
        $demos = Demo::all();
        $position = $demos->count() + 1;
        $demo = new Demo();
        $request->target === "on" ? $target = "_blank" : $target = null;
        $request->active === "on" ? $active = 1 : $active = null;
        $demo->title = $request->title;
        $demo->text = $request->text;
        $demo->category = $request->category;
        $demo->title_en = $request->title_en;
        $demo->text_en = $request->text_en;
        $demo->category_en = $request->category_en;
        $demo->target = $target;
        $demo->link = $request->link;
        $demo->position = $position;
        $demo->active = $active;
        if(file_exists($request->image)) {
            // $img = $testimony->imgResize($request->image, $testimony->image_path(), 200);
            // $testimony->image = $testimony->uploadFile($request->image, $testimony->image_path());
            $demo->image = $demo->uploadImageResize($request->image, $demo->image_path(), 490);

        }
        $demo->save();
        return redirect()->route('demos.list')->with('message', 'Demo ajoutée avec succès');
    }
    public function demo_edit($id) {
        $demo = Demo::find($id);
        if($demo === null) return redirect()->route('dashboard');
        return view('back.demo.form', [
            'demo' => $demo
        ]);
    }
    public function demo_edit_post(Request $request) {
        $demos = Demo::all();
        $demo = Demo::find($request->id);
        if($demo === null) redirect()->route("homepage");
        $request->target === "on" ? $target = "_blank" : $target = null;
        $request->active === "on" ? $active = 1 : $active = null;
        $demo->title = $request->title;
        $demo->text = $request->text;
        $demo->category = $request->category;
        $demo->title_en = $request->title_en;
        $demo->text_en = $request->text_en;
        $demo->category_en = $request->category_en;
        $demo->target = $target;
        $demo->link = $request->link;
        $demo->active = $active;
        if(file_exists($request->image)) {

            $demo->image = $demo->uploadImageResize($request->image, $demo->image_path(), 490);

        }
        $demo->save();
        return redirect()->route('demos.list')->with('message', 'Demo modifiée avec succès');
    }
    public function demo_delete_image($id) {
        $demo = Demo::find($id);
        if($demo === null) return redirect()->route('logout');
        $demo->delete_image();
        $demo->save();
        return back();
    }
    public function demo_delete($id) {
        $demo = Demo::find($id);
        if($demo === null) return redirect()->route('logout');
        $demo->delete_demo();
        return redirect()->route('demos.list')->with('message', 'Démo supprimée');
    }

    public function demo_position() {
        $demos = Demo::orderBy('position', 'asc')->get();
        return view('back.demo.position', [
            'demos' => $demos,
            'jqueryui' => true
        ]);
    }
    // --------------------------------------------------END DEMO-----------------------------------------------------------

    // --------------------------------------------------TEAM-----------------------------------------------------------
        public function team_list() {
            $staffs = Staff::all();
            return view('back.team.list', [
                'staffs' => $staffs,
                'datatable' =>true
            ]);
        }
        public function team_add() {
            $staff = new Staff();
            return view('back.team.form', [
                'staff' => $staff
            ]);
        }
        public function team_add_post(Request $request) {
            $staffs = Staff::all();
            $position = $staffs->count() + 1;
            $staff = new Staff();
            $staff->firstname = $request->firstname;
            $staff->lastname = $request->lastname;
            $staff->job = $request->job;
            $staff->job_en = $request->job_en;
            $staff->link_1 = $request->link_1;
            $staff->link_2 = $request->link_2;
            $staff->link_3 = $request->link_3;
            $staff->position = $position;
            if(file_exists($request->image)) {
                $staff->image = $staff->uploadImageResize($request->image, $staff->image_path(), 400);
            }
            $staff->save();
            return redirect()->route('team.list')->with('message', 'Staff ajouté avec succès');
        }
        public function team_edit($id) {
            $staff = Staff::find($id);
            if($staff === null) return redirect()->route('dashboard');
            return view('back.team.form', [
                'staff' => $staff
            ]);
        }
        public function team_edit_post(Request $request) {
            $staffs = Staff::all();
            $staff = Staff::find($request->id);
            if($staff === null) redirect()->route("homepage");
            $staff->firstname = $request->firstname;
            $staff->lastname = $request->lastname;
            $staff->job = $request->job;
            $staff->job_en = $request->job_en;
            $staff->link_1 = $request->link_1;
            $staff->link_2 = $request->link_2;
            $staff->link_3 = $request->link_3;
            if(file_exists($request->image)) {
                $staff->image = $staff->uploadImageResize($request->image, $staff->image_path(), 400);

            }
            $staff->save();
            return redirect()->route('team.list')->with('message', 'Staff modifié avec succès');
        }
        public function team_delete_image($id) {
            $staff = Staff::find($id);
            if($staff === null) return redirect()->route('logout');
            $staff->delete_image();
            $staff->save();
            return back();
        }
        public function team_delete($id) {
            $staff = Staff::find($id);
            if($staff === null) return redirect()->route('logout');
            $staff->delete_staff();
            return redirect()->route('team.list')->with('message', 'Staff supprimée');
        }
        // --------------------------------------------------END TEAM-----------------------------------------------------------


            // --------------------------------------------------Client/ user-----------------------------------------------------------
                public function clients_list() {
                    $users = User::where('role', 'ROLE_CLIENT')->get();
                    return view('back.client.list', [
                        'users' => $users,
                        'datatable' =>true
                    ]);
                }
                public function users_list() {
                    $users = User::where('role','!=', 'ROLE_CLIENT')->get();
                    return view('back.user.list', [
                        'users' => $users,
                        'datatable' =>true
                    ]);
                }
                public function user_add() {
                    $user = new User();
                    return view('back.user.form', [
                        'user' => $user
                    ]);
                }
                public function user_add_post(Request $request) {
                    $user = new User();
                    $user->firstname = $request->firstname;
                    $user->lastname = $request->lastname;
                    $user->phone = $request->phone;
                    $user->phone_home = $request->phone_home;
                    $user->siret = $request->siret;
                    $user->active = intval($request->active);
                    $user->role = $request->role;
                    $user->address = $request->address;
                    $user->zip = $request->zip;
                    $user->city = $request->city;
                    $user->country = $request->country;
                    $user->email = $request->email;
                    $user->website = $request->website;
                    $user->gender = intval($request->gender);
                    $user->company = $request->company;
                    $user->token = uniqid('', 60);
                    $user->token_connection = uniqid('', 60);
                    $user->password = bcrypt($request->password);
                    if($request->role === "ROLE_CLIENT"){
                        $user->create_client_number();
                        $user->create_client_id();
                    }
                    $validator = Validator::make($request->all(), [
                        'firstname' => 'required',
                        'lastname' => 'required',
                        'password' => 'required',
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
                        $user->image = $user->uploadImageResize($request->image, $user->image_path(), 400);
                    }
                    $user->save();
                    if($user->role === "ROLE_CLIENT") {
                        return redirect()->route('user.profile', ['token' => $user->token])->with('message', 'Client ajouté avec succès');
                    } else {
                        return redirect()->route('user.profile', ['token' => $user->token])->with('message', 'Utilisateur ajouté avec succès');
                    }                }
                public function user_edit($token) {
                    $user = User::where("token", $token)->first();
                    if($user === null) return redirect()->route('dashboard');
                    return view('back.user.form', [
                        'user' => $user
                    ]);
                }
                public function user_edit_post(Request $request) {
                    $user = User::find($request->id);
                    if($user->role === "ROLE_DEV" && $request->role !== "ROLE_DEV") return back()->with('message', "impossible de changer le statut du développeur");

                    if($request->password !== null) $user->password = bcrypt($request->password);
                    $request->active === "on" ? $active = 1 : $active = null;
                    $user->firstname = $request->firstname;
                    $user->lastname = $request->lastname;
                    $user->phone = $request->phone;
                    $user->phone_home = $request->phone_home;
                    $user->siret = $request->siret;
                    $user->active = $active;
                    $user->role = $request->role;
                    $user->address = $request->address;
                    $user->zip = $request->zip;
                    $user->city = $request->city;
                    $user->country = $request->country;
                    $user->email = $request->email;
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

                    if($user->role === "ROLE_CLIENT") {
                        return redirect()->route('user.profile', ['token' => $user->token])->with('message', 'Client modifié avec succès');
                    } else {
                        return redirect()->route('user.profile', ['token' => $user->token])->with('message', 'Utilisateur modifié avec succès');
                    }
                }
                public function user_delete_image($id) {
                    $user = User::find($id);
                    if($user === null) return redirect()->route('logout');
                    $user->delete_image();
                    $user->save();
                    return back();
                }
                public function user_delete($token) {
                    $user = User::where('token', $token)->first();
                    if($user === null) return redirect()->route('logout');
                    $role = $user->role;
                    $user->delete_user();
                    if($role === "ROLE_CLIENT") {
                        return redirect()->route('clients.list')->with('message', 'Client supprimé');

                    } else {
                        return redirect()->route('users.list')->with('message', 'Utilisateur supprimée');

                    }
                }

                public function profile($token=null) {
                    if(Auth::user()->isDev()) {
                        $user = User::where('token', $token)->first();

                    } else {
                        $user = Auth::user();
                    }
                    if($user === null) return redirect()->route('dashboard');
                    $information = Information::where('name', 'info')->first();
                    // if(Auth::user()->role !== 'ROLE_DEV' && Auth::user()->token != $user->token) return redirect()->route('dashboard');
                    return view("back.user.profile", [
                        'user' => $user,
                        'information' => $information
                    ]);
                }
                // --------------------------------------------------END Client / user-----------------------------------------------------------


                // --------------------------------------------------SEND NOTIFICATIONS-----------------------------------------------------------

                public function admin_user_notification($token=null) {
                    $user = User::where('token', $token)->first();
                    if($user === null) return redirect()->route('dashboard');
                    return view("back.notification.form",[
                        'user' => $user,
                        'notification' => new Notification()
                    ]);
                }

                public function admin_user_notification_post(Request $request) {
                    $user = User::find($request->user_id);
                    $notification = new Notification();
                    $notification->title = $request->title;
                    $notification->text = $request->text;
                    $notification->type = $request->type;
                    $notification->token = Auth::user()->token;
                    $notification->user_id = $request->user_id;
                    $validator = Validator::make($request->all(), [
                         'text' => 'required|max:800',
                         'title' => 'required',
                         'type' => 'required',
                     ]);
                     if ($validator->fails()) {
                         return back()
                         ->withErrors($validator)
                         ->withInput();
                     }

                    $notification->save();
                    return back()->with('message', 'notification envoyée');
                }

                public function admin_clients_notification() {
                    return view("back.notification.form",[
                        'user' => new User(),
                        'notification' => new Notification()
                    ]);
                }

                public function admin_clients_notification_post(Request $request) {
                    $clients = User::where('role', "ROLE_CLIENT")->get();

                    $validator = Validator::make($request->all(), [
                         'text' => 'required|max:800',
                         'title' => 'required',
                         'type' => 'required',
                     ]);
                     if ($validator->fails()) {
                         return back()
                         ->withErrors($validator)
                         ->withInput();
                     }

                    foreach ($clients as $key => $client) {
                        $notification = new Notification();
                        $notification->title = $request->title;
                        $notification->text = $request->text;
                        $notification->type = $request->type;
                        $notification->token = Auth::user()->token;
                        $notification->user_id = $client->id;
                        $notification->save();

                    }
                    return redirect()->route("admin.notifications.list")->with('message', 'notifications envoyées à tous les clients');

                }

                public function admin_clients_notifications_delete() {
                    $notifications = Notification::all();
                    return view('back.notification.form_delete', [
                        "notifications" => $notifications
                    ]);
                }
                public function admin_clients_notifications_delete_post(Request $request) {
                    $notifications = Notification::all();
                    foreach ($notifications as $key => $notification) {
                        $notification->delete();
                    }
                    return redirect()->route("admin.notifications.list")->with('message', 'Notifications supprimées');
                }

                public function admin_notifications_list(){
                    $notifications = Notification::all();
                    return view('back.notification.list', [
                        "notifications" => $notifications,
                        "datatable" => true
                    ]);
                }

                public function service_client() {
                    $information = Information::where('name', "info")->first();
                    return view('back.client.service',[
                        'information' => $information
                    ]);
                }
}
