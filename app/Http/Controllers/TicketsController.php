<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Illuminate\Support\Str;
use App\Http\Requests\StoreTicket;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(StoreTicket $request)
    {

        $ticket = $request->all();
        $ticket['slug'] = Str::slug($ticket['title']);
       
        Ticket::create($ticket);
        $data = array(
            'ticket' => $ticket['slug'],
            );
            Mail::send('emails.ticket', $data, function ($message) {
            $message->from('theinzawmaung067@gmail.com', 'Theinzawmaung');
            $message->to('theinzawmaung067@gmail.com')->subject('There is a new ticket!');
            });

        return redirect( url('contact') )->with('status','Your ticket has been submitted');
    }
  /* 
    
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
    */
    public function show($slug)
    {
        $ticket = Ticket::where('slug',$slug)->firstOrFail();
        $comments = $ticket->comments()->get();
        return view('tickets.show',compact('ticket','comments'));
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
    */
    public function edit($slug)
    {
        $ticket = Ticket::where('slug',$slug)->firstOrFail();
        return view('tickets.edit', compact('ticket'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
    */
    public function update(StoreTicket $request, $slug)
    {
        
        $ticket = Ticket::where('slug', $slug)->firstOrFail();

        $ticket->title = $request->title;
        $ticket->content = $request->content;
        
        if($request->status != null) {
            $ticket->status = 0;
        }
        else {
            $ticket->status = 1;
        }
        $ticket->slug = Str::slug($ticket->title);
        $ticket->save();
        return redirect(action('TicketsController@show', $ticket->slug))->with('message', "Ticket'{$slug}' has been updated!");
        
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
    */
    public function destroy($slug)
    {
        $ticket = Ticket::where('slug',$slug)->firstOrFail();
        $ticket->delete();
        return redirect ( action('TicketsController@index',$slug) )->with('status',"Ticket'{$slug}' has been deleted!");
    }
}
