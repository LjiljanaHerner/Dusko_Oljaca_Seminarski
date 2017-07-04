<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller
{
    public function getIndex()
	{
		// paginacija postova
		$posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
		
		return view('pages.welcome')->withPosts($posts);
	}
	
	public function getO_meni()
	{
		$first='dule';
		$last='oljača';
		$full=$first." ".$last;
		$email='dulebamboocha@gmail.com';
		$data=[];
		$data['email']=$email;
		$data['full']=$full;
		return view('pages.o_meni')->withData($data);
	}
	
	public function getKontakt()
	{
		return view('pages.kontakt');
	}
	
	public function postKontakt(Request $request)
	{
		$this->validate($request, array(
			'email' => 'required|email',
			'predmet' => 'min:5',
			'poruka' => 'min:10'
		));
		
		$data = array(
			'email' => $request->email,
			'predmet' => $request->predmet,
			'bodyporuka' => $request->poruka
		);
		
		Mail::send('emails.kontakt', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('dule_bamboocha@hotmail.com');
			$message->subject($data['predmet']);
		});
		Session::flash('success', 'Vaša poruka je uspješno poslana');
		
		return redirect('/');
		
	}
}
