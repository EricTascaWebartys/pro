<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{
    public function edit() {
        $information = Information::where('name', 'info')->first();
        return view('back.information.form', [
            'information' => $information
        ]);
    }

    public function edit_post(Request $request) {
        $information = information::find($request->id);
        $information->phone = $request->phone;
        $information->phone_fix = $request->phone_fix;
        $information->email = $request->email;
        $information->address = $request->address;
        $information->zip = $request->zip;
        $information->city = $request->city;
        $information->country = $request->country;
        $information->siret = $request->siret;
        $information->days = $request->days;
        $information->hours = $request->hours;
        $information->job = $request->job;
        if(file_exists($request->image)) {
            $validator = Validator::make($request->all(), [
                 'image' => 'mimes:jpg,png,jpeg|max:10240',
             ]);
            $information->image = $information->uploadImageResize($request->image, $information->image_path(), 200);
        }
        $information->save();
        return back()->with('message', "Changements enregistrer");
    }

    public function information_delete_image($id=null) {
        $information = Information::find($id);
        if($information === null) return redirect()->route('dashboard');
        $information->delete_image();
        $information->save();
        return back();
    }
}
