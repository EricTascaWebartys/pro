<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;
use App\Models\ApplicationUser;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    //---------------------------------------------------ADMIN-----------------------------------------------------------
    public function application_add(){
        $application = new Application();
        $clients = User::where('role', "ROLE_CLIENT")->get();
        return view("back.application.form", [
            'application' => $application,
            'clients' => $clients
        ]);
    }

    public function application_edit($token){
            $application = Application::where('token', $token)->first();
            if($application === null) return redirect()->route("applications.list");
            $clients = User::where('role', "ROLE_CLIENT")->get();
            return view("back.application.form", [
                'application' => $application,
                'clients' => $clients
            ]);
    }

    public function application_add_post(Request $request){
        $request->active === "on" ? $active = 1 : $active = null;
        $application = new Application();
        $application->name = $request->name;
        $application->url = $request->url;
        $application->price = $request->price;
        $application->text = $request->text;
        $application->image = $request->image;
        $application->active = $active;
        $application->token = uniqid('',20);
        if(file_exists($request->image)) {

            $application->image = $application->uploadImageResize($request->image, $application->image_path(), 490);

        }
        $application->save();

        return redirect()->route('applications.list')->with('message', 'Application ajouté');

    }

    public function application_edit_post(Request $request){
        $request->active === "on" ? $active = 1 : $active = null;
        $application = Application::find($request->id);
        $application->name = $request->name;
        $application->url = $request->url;
        $application->price = $request->price;
        $application->text = $request->text;
        $application->image = $request->image;
        $application->active = $active;
        if(file_exists($request->image)) {

            $application->image = $application->uploadImageResize($request->image, $application->image_path(), 490);

        }
        $application->save();

        return back()->with('message', 'Application modifié');

    }

    public function application_client_add($token){
        $application = Application::where('token', $token)->first();
        if($application === null) return redirect()->route('applications.list');
        $clients = User::where('role', "ROLE_CLIENT")->orderBy('firstname', "asc")->get();
        return view("back.application.client.form", [
            'application' => $application,
            'clients' => $clients
        ]);
    }

    public function application_client_edit($id) {
        $application_user = ApplicationUser::find($id);
        $client_selected = User::find($application_user->user_id);
        $application = Application::find($application_user->application_id);
        if($application === null || $client_selected === null || $application_user === null) return redirect()->route('applications.list');

        $clients = User::where('role', "ROLE_CLIENT")->orderBy('firstname', "asc")->get();
        return view("back.application.client.form", [
            'application' => $application,
            'application_user' => $application_user,
            'client_selected' => $client_selected,
            'clients' => $clients
        ]);
    }

    public function application_client_add_post(Request $request){
        $app = Application::find($request->application_id);
        if($app === null) return back();
        $application_user = new ApplicationUser();
        $application_user->user_id = $request->user_id;
        $application_user->application_id = $request->application_id;
        $application_user->date_limit = $request->date_limit;
        $application_user->save();
        return redirect()->route('applications.list')->with('message', 'Client ajouté');
    }

    public function application_client_edit_post(Request $request){
        $application_user = ApplicationUser::find($request->id);
        $application_user->date_limit = $request->date_limit;
        $application_user->save();
        return redirect()->route('applications.list')->with('message', 'Modification réussie');
    }

    public function applications_list() {
        $applications = Application::all();
        // dd($applications);
        return view("back.application.list", [
            'applications' => $applications,
            'datatable' => true
        ]);
    }

    public function application_delete_image($id) {
        $application = Application::find($id);
        if($application === null) return redirect()->route('logout');
        $application->delete_image();
        $application->save();
        return back();
    }

    public function application_delete($token) {
        $application = Application::where('token', $token)->first();
        if($application === null) return redirect()->route("logout");
        $application->delete_application();
        return redirect()->route('applications.list')->with('message', 'Application supprimé');
    }

    public function application_client_delete($id) {
        $application_user = ApplicationUser::find($id);
        if($application_user === null) return redirect()->route("logout");
        $application_user->delete();
        return redirect()->route('applications.list')->with('message', 'Abonnement supprimé');
    }

    //---------------------------------------------------CLIENT-----------------------------------------------------------

}
