<?php

namespace App\Http\Controllers;

use App\Support;
use Mail;
use App\Mail\SupportMail;
use Illuminate\Http\Request;


class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mail(Request $request)
    {
        if($request->title && $request->message)
        {
            $temat = $request->title; 
            $wiadomosc = $request->message;
            Mail::to('k.gradek31@gmail.com')->send(new SupportMail($temat,$wiadomosc));
            return redirect()->back()->with('success', 'Wiadmość wysłana poprawnie!');
        } else {
            return redirect()->back()->with('error', 'Ups coś poszło nie tak, nie udało się wysłać wiadomości.');
        }
    }
    public function form()
    {
        return view('admin.mail.form');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        //
    }
}
