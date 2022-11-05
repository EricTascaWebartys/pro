<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recaptcha;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\ClientMail;
use App\Models\User;

class ContactController extends Controller
{
    public function contact($devis=null) {
        return view('front.contact',[
            'contact' => true,
            'devis' => $devis,
        ]);
    }

    public function contact_post(Request $request) {
        $error_recaptcha = "Vérification du captcha incorrect";
        if(app()->getLocale() === "en") $error_recaptcha = "Checking for incorrect captcha";
        
        $captcha = new Recaptcha();
        $secret_key = "6LeYIdMdAAAAADpc2uzNQ5y20esgmc7F8PGQr2PY";

        if($request->recaptcha_response === null || $request->recaptcha_response === "") return back()->withErrors(['message' => $error_recaptcha])->withInput();
        if($captcha->captchaverify($request->recaptcha_response === false)) return back()->withErrors(['message' => $error_recaptcha])->withInput();


        // if($captcha->captchaverify($request->get('g-recaptcha-response'))){
        //     $recaptcha = 'on';
        // } else {
        // $recaptcha = "";
        //     return back()->withErrors(['message' => $error_recaptcha])->withInput();
        // }
        $validator = Validator::make(
            [
                'email' => $request->email,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'tel' => $request->tel,
                'message' => $request->message,
                // 'recaptcha' => $recaptcha
            ],
            [
                'email' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'tel' => 'required|min:11|numeric',
                'message' => 'required',
                // 'recaptcha' => 'required'
            ]
        );

        if($validator->fails()){
            // echo 0;
            // die();
            return redirect()->route('contact',["#contact"])->withErrors($validator)->withInput();
        }
        $data = [
            'email' => $request->email,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'tel' => $request->tel,
            'message' => $request->message,
        ];

        Mail::to('contact@webartys.com')->send(new ContactMail($data));
        // $to      = "eric.tasca@hotmail.fr";
        // $subject = 'Message Pro Site';
        // $message = $request->message;
        // $headers = 'From: ' . $request->email . '' . "\r\n" .
        // 'X-Mailer: PHP/' . phpversion();
        // mail($to, $subject, $message, $headers);

        return redirect()->route('result', ['value' => "1"]);
    }

    public function contact_client($id) {
        $client = User::find($id);
        if($client === null) return redirect()->route("dashboard");
        return view('back.contact',[
            'client' => $client
        ]);
    }

    public function contact_client_post(Request $request) {
        $client = User::find($request->id);

        $validator = Validator::make(
            [
                'subject' => $request->subject,
                'message' => $request->message
            ],
            [
                'subject' => 'required',
                'message' => 'required'
            ]
        );

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $data = [
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        Mail::to($client->email)->send(new ClientMail($data));

        return redirect()->route('user.profile', ['token'=>$client->token])->with('message', 'Email envoyé');

    }

    public function contact_clients() {
        return view('back.contact',[
            'multiple' => true
        ]);
    }

    public function contact_clients_post(Request $request) {
        $clients = User::where('role', 'ROLE_CLIENT')->get();
        $validator = Validator::make(
            [
                'subject' => $request->subject,
                'message' => $request->message
            ],
            [
                'subject' => 'required',
                'message' => 'required'
            ]
        );

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $data = [
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        foreach ($clients as $key => $client) {
            Mail::to($client->email)->send(new ClientMail($data));
        }

        return redirect()->route('clients.list')->with('message', 'Emails envoyés');
    }
}
