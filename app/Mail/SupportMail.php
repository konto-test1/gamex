<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
class SupportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $wiadomosc = $request->message;
        $temat = $request->title;
        return $this->from('bandzior_1994@tlen.pl')->subject($temat)->view('admin.mail.support', compact('wiadomosc'));
    }
}
