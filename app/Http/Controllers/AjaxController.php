<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Demo;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function delete_notification(Request $request) {
        $notification = Notification::find($request->id);
        if($notification !== null) {
            $notification->delete();
            $notifications = Auth::user()->notifications()->get()->count();
            echo $notifications;
        } else {
            echo "error";

        }

    }

    public function demo_position_post(Request $request) {
        $demos = Demo::orderBy('position', 'asc')->get();
        $demo_selected = Demo::find($request->id);
        $position = intval($request->position);
        $position = floor($request->position);
        $position = $position/100 + 1;
        $position = intval(floor($position));

        foreach ($demos as $key => $demo) {
            if($demo->id !== $demo_selected->id) {
                if($demo_selected->position > $position && $demo->position >= $position && $demo->position < $demo_selected->position) {
                    $demo->position = $demo->position + 1;
                }
                if($demo_selected->position < $position && $demo->position <= $position && $demo->position > $demo_selected->position) {
                    $demo->position = $demo->position - 1;
                }
            }
            $demo->save();
        }
        $demo_selected->position = $position;
        $demo_selected->save();
        echo "1";

    }
}
