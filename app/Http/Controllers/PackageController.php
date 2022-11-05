<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function package_add() {

    }

    public function package_add_post(Request $request) {

    }

    public function package_edit($id) {
        $package = Package::find($id);

        return view('back.package.form' , [
            'package' => $package
        ]);
    }

    public function package_edit_post(Request $request) {

    }

    public function packages_list() {
        $packages =  Package::all();
        return view('back.package.list', [
            'packages' => $packages
        ]);
    }

    public function package_delete($id) {
        $package = Package::find($id);
        if($package === null) return redirect()->route("logout");
        if($package->products()->get()->count() > 0) return back()->with('message', 'Suppression impossible car au moins un produit est associé !');
        $package->delete();
        return redirect()->route('packages.list')->with('message', 'Garantie supprimé');
    }
}
