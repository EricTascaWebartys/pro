<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Package;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //---------------------------------------------------ADMIN-----------------------------------------------------------
    public function product_add(){
        $product = new Product();
        $clients = User::where('role', "ROLE_CLIENT")->get();
        $packages = Package::all();

        return view("back.product.form", [
            'product' => $product,
            'packages' => $packages,
            'clients' => $clients
        ]);
    }

    public function product_edit($token){
            $product = Product::where('token', $token)->first();
            if($product === null) return redirect()->route("dashboard");
            $packages = Package::all();
            // dd(date("Y", strtotime($product->date_online)) . "-W" . date("W", strtotime($product->date_online)));
            $clients = User::where('role', "ROLE_CLIENT")->get();
            return view("back.product.form", [
                'product' => $product,
                'packages' => $packages,
                'clients' => $clients
            ]);
    }

    public function product_add_post(Request $request){
        $product = new Product();
        $request->pwa !== null ? $pwa = 1 : $pwa = null;
        $product->name = $request->name;
        $product->user_id = $request->client_id;
        $product->url = $request->url;
        $product->price = $request->price;
        $product->type = $request->type;
        $product->pwa = $pwa;
        $product->package_id = $request->package_id;
        $request->date_limit === null ? $product->date_limit = null : $product->date_limit = date( "Y-m-d", strtotime($request->date_limit));
        $request->date_online === null ? $product->date_online = null : $product->date_online = date( "Y-m-d", strtotime($request->date_online));
        $request->date_paid === null ? $product->date_paid = null : $product->date_paid = date( "Y-m-d", strtotime($request->date_paid));
        $product->token = uniqid('',20);

        $validator = Validator::make($request->all(), [
             'name' => 'required',
         ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        $product->save();

        return redirect()->route('products.list')->with('message', 'Produit ajouté');

    }

    public function product_edit_post(Request $request){
        $product = Product::find($request->id);
        $request->pwa !== null ? $pwa = 1 : $pwa = null;
        $product->name = $request->name;
        $product->url = $request->url;
        $product->price = $request->price;
        $product->type = $request->type;
        $product->pwa = $pwa;
        $product->package_id = $request->package_id;
        $request->date_limit === null ? $product->date_limit = null : $product->date_limit = date( "Y-m-d", strtotime($request->date_limit));
        $request->date_online === null ? $product->date_online = null : $product->date_online = date( "Y-m-d", strtotime($request->date_online));
        $request->date_paid === null ? $product->date_paid = null : $product->date_paid = date( "Y-m-d", strtotime($request->date_paid));
        $product->save();

        return back()->with('message', 'Produit modifié');

    }

    public function products_list() {
        $products = Product::all();
        return view("back.product.list", [
            'products' => $products,
            'datatable' => true
        ]);
    }

    public function product_delete($token) {
        $product = Product::where('token', $token)->first();
        if($product === null) return redirect()->route("logout");
        $product->delete();
        return redirect()->route('products.list')->with('message', 'Produit supprimé');
    }

    //---------------------------------------------------CLIENT-----------------------------------------------------------

}
