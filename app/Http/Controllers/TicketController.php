<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Notification;

class TicketController extends Controller
{
    public function ticket_add(){
        $ticket = new Ticket();

        return view("back.ticket.form", [
            'ticket' => $ticket,

        ]);
    }

    public function ticket_edit($id){
            $ticket = Ticket::find($id);
            if($ticket === null) return redirect()->route("dashboard");
            // dd(date("Y", strtotime($ticket->date_online)) . "-W" . date("W", strtotime($ticket->date_online)));
            $tickets = Ticket::where('number', $ticket->number)->get();
            return view("back.ticket.form", [
                'ticket' => $ticket,
                'tickets' => $tickets,
            ]);
    }

    public function ticket_add_post(Request $request){

        $ticket = new ticket();
        $ticket->text = $request->text;
        $ticket->number = Auth::user()->id . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        $ticket->user_id = Auth::user()->id;
        $ticket->first = 1;

        $validator = Validator::make($request->all(), [
             'text' => 'required',
         ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        $ticket->save();
        $developpers = User::where('role', "ROLE_DEV")->get();
        foreach ($developpers as $key => $developper) {
            $notification = new Notification();
            $notification->title = "Nouveau ticket";
            $notification->text = Auth::user()->full_name()." a créer un nouveau ticket";
            $notification->type = 'message';
            $notification->token = Auth::user()->token;
            $notification->user_id = $developper->id;
            $notification->save();
        }

        return redirect()->route('ticket.edit',['id' => $ticket->id])->with('message', 'Ticket ajouté');

    }

    public function ticket_edit_post(Request $request){
        $ticket = new ticket();
        $ticket->text = $request->text;
        $ticket->number = $request->number;
        $ticket->user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
             'text' => 'required',
         ]);

        if ($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        $ticket->save();
        $developpers = User::where('role', "ROLE_DEV")->get();
        foreach ($developpers as $key => $developper) {
            $notification = new Notification();
            $notification->title = "Nouveau ticket";
            $notification->text = Auth::user()->full_name()." a répondu au ticket ". $ticket->number;
            $notification->type = 'message';
            $notification->token = Auth::user()->token;
            $notification->user_id = $developper->id;
            $notification->save();
        }

        return redirect()->route('ticket.edit',['id' => $ticket->id])->with('message', 'Réponse ajouté');

    }

    public function tickets_list($token) {
        if(Auth::user()->token !== $token) return redirect()->route('dashboard');
        $tickets = Auth::user()->tickets()->where('first', 1)->get();
        return view("back.ticket.list", [
            'tickets' => $tickets,
            'datatable' => true
        ]);
    }

    // ---------------------------------------ADMIN-----------------------

    public function admin_tickets_list() {
        $tickets = Ticket::where('first', 1)->get();
        return view("back.ticket.list", [
            'tickets' => $tickets,
            'datatable' => true
        ]);
    }

    public function admin_ticket_edit($id){
            $ticket = Ticket::find($id);
            if($ticket === null) return redirect()->route("dashboard");
            // dd(date("Y", strtotime($ticket->date_online)) . "-W" . date("W", strtotime($ticket->date_online)));
            $tickets = Ticket::where('number', $ticket->number)->get();
            return view("back.ticket.form", [
                'ticket' => $ticket,
                'tickets' => $tickets,
            ]);
    }


        public function admin_ticket_edit_post(Request $request){
            $ticket_first = Ticket::find($request->id);
            $ticket = new ticket();
            $ticket->text = $request->text;
            $ticket->number = $request->number;
            $ticket->user_id = Auth::user()->id;

            $validator = Validator::make($request->all(), [
                 'text' => 'required',
             ]);

            if ($validator->fails()) {
                return back()
                ->withErrors($validator)
                ->withInput();
            }
            $ticket->save();
            if($request->resolve === "on") {
                $ticket_first->resolve = 1;
                $ticket_first->save();
            } else {
                $ticket_first->resolve = null;
                $ticket_first->save();
            }

            $notification = new Notification();
            $notification->title = "Ticket ". $ticket->number;
            $notification->text = "Vous avez une reçu une réponse";
            $notification->type = 'message';
            $notification->token = Auth::user()->token;
            $notification->user_id = $ticket_first->user()->first()->id;
            $notification->save();


            return redirect()->route('admin.ticket.edit',['id' => $ticket_first->id])->with('message', 'Réponse ajouté');

        }

    public function admin_ticket_delete($id) {
        $ticket = ticket::find($id);
        if($ticket === null) return redirect()->route("logout");
        $ticket->delete_ticket();
        return redirect()->route('admin.tickets.list')->with('message', 'Ticket supprimé');
    }
}
