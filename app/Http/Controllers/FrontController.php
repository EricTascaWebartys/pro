<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimony;
use App\Models\Demo;
use App\Models\Staff;
use App\Models\User;
use App\Models\Information;
use Illuminate\Support\Facades\Validator;
use App\Mail\ResetPasswordMail;

class FrontController extends Controller
{


    public function homepage() {
        $team = Staff::all();
        $video = null;
        $avis = Testimony::where('type', null)->orderBy('position', 'asc')->get();
        // $avis_active = Testimony::where('type', 'client')->where('active', 1)->get();
        $avis_active = Testimony::where('active', 1)->where('type', 'client')->get();
        $demos = Demo::where('active', 1)->orderBy('position', 'asc')->get();
        return view('front.index',[
            'homepage' => true,
            'team' => $team,
            'video' => $video,
            'avis' => $avis,
            'avis_active' =>$avis_active,
            'demos' => $demos,
            'return' => 'home',
            'index_page' => true
        ]);
    }

    public function description_1($return = null) {

        return view('front.description-1',[
            'products' => true,
            'return' => $return
        ]);
    }
    public function description_2($return = null) {

        return view('front.description-2',[
            'products' => true,
            'return' => $return,
        ]);
    }
    public function description_3($return = null) {

        return view('front.description-3',[
            'products' => true,
            'return' => $return
        ]);
    }

    public function website_1($return = null) {

        return view('front.website_1',[
            'products' => true,
            'return' => $return,
            'index_page' => true
        ]);
    }
    public function website_2($return = null) {

        return view('front.website_2',[
            'products' => true,
            'return' => $return,
            'index_page' => true
        ]);
    }
    public function website_3($return = null) {

        return view('front.website_3',[
            'products' => true,
            'return' => $return,
            'index_page' => true
        ]);
    }

    public function mentions() {
        $information = Information::where('name', "info")->first();
        return view('front.mentions',[
            'information' => $information
        ]);
    }


    public function result($value=null) {
        if($value === null) return redirect()->route("homepage");
            return view('front.result',[
                'value' => $value
            ]);
    }

    public function testimonies_show() {

        $testimonies = Testimony::where('type', 'client')->where('active', 1)->simplePaginate(5);
        if($testimonies->count() === 0) return redirect()->route('homepage');
        return view('front.testimonies',[
            'avis_page' => true,
            'testimonies'=> $testimonies
        ]);
    }

    public function products() {
        return view('front.products', [
            'products' => true,
        ]);
    }

    public function pwa_office($return = null) {
        return view('front.pwa_office', [
            'products' => true,
            'return' => $return,
        ]);
    }

    public function pwa_ios($return = null) {
        return view('front.pwa_ios', [
            'products' => true,
            'return' => $return,
        ]);
    }

    public function pwa($return = null) {
        return view('front.pwa', [
            'products' => true,
            'return' => $return,
        ]);
    }

    public function responsive($return = null) {
        return view('front.responsive_design', [
            'products' => true,
            'return' => $return,
        ]);
    }
    public function seo($return = null) {
        return view('front.seo', [
            'products' => true,
            'return' => $return,
        ]);
    }
    public function visual_identity($return = null) {
        return view('front.visual_identity', [
            'products' => true,
            'return' => $return,
        ]);
    }
    public function fluidity($return = null) {
        return view('front.fluidity', [
            'products' => true,
            'return' => $return,
        ]);
    }
}
