<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;
class EmailController extends Controller
{
    //

    public function send(Request $request){
    //Logic will go here   

    	$title = $request->title;
    	$content = $request->content;

    	Mail::send('pages.email',['title'=>$title,'content'=>$content],function($message){
    		$message->from('rojan@nayloroutsourcing.com','Rojan Timbas');
    		$message->to('f2790e5c4e-90dc1f@inbox.mailtrap.io');
    	});
    	return response()->json(['message' => 'Request completed']);
	}
}
