<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use App\Notifications\ContactFooter;
use Illuminate\Http\Request;
// use App\User;
use Mail;
use App\Mail\SupportMail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Notifiable;

    public function footer_mail(Request $req) {
        // new ContactFooter();
        // $user = User::find(1);
        // $user->notify(new ContactFooter());
        // // Authenticatable::send($req, new ContactFooter());
        if(isset($req->recapche) == 'true' && isset($req->message))
        {
            $temat = $req->name; 
            $wiadomosc = $req->message;
            Mail::to('k.gradek31@gmail.com')->send(new SupportMail($temat,$wiadomosc));
            return redirect()->back()->with('success', 'Wiadmość wysłana poprawnie!');
        } else {
            return redirect()->back()->with('error', 'Ups coś poszło nie tak, nie udało się wysłać wiadomości.');
        }
        return back();
    }
}
