<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Post;
use Session;

// if we want it to access something out of this class we use 'use'
class PagesController extends Controller {

	// every page request is going to be an action and each action is a function
	// name functions with the kind of http request it makes
	public function getIndex(){ 
		//index is the name of the page
		// we use controllers to process variable data or params
		//talk to the model
		// recieve data back from the model
		// compile or process the data if needed
		// pass this data to the correct view
		// we created pages folder in the views and put them there
		$posts = Post::orderBy('created_at','desc')->limit(4)->get();
		return view('pages.welcome')->with('posts',$posts); // the dot is like the forward slash

	}

	// we pass variables by writing it in and using two functions
	// "with" or "combined"

	public function getAbout(){ 
		//about is the name of the page

		$data = array(
		    'name'  => 'Mohamed Ahmed',
		    'age'   => 26,
		    'email' => 'imohamedgabr@outlook.com'
			);



		return view('pages.about')->with("data", $data);  

		// the dot is like the forward slash
		
	}

	public function getContact(){ 
		//contact is the name of the page
		return view('pages.contact'); // the dot is like the forward slash
	}

	// we need 2 modules up there so we can access the request , illuminate and request
	public function postContact(Request $request){
		$this->validate($request , ['email'=>'required|email', 'message'=>'min:10' , 'subject' =>'min:3']);
		 // making sure its required and email

		$data = array(
			'email'=> $request->email,
			'subject' => $request->subject,
			'bodyMessage'=> $request->message
			); // we cant name it message as variable is already taken

		// Mail::queue(); // if you want it to be queued for later
		Mail::send('emails.contact', $data , function($message) use ($data){
			$message->from($data['email']);
			$message->to('ma_merostar@hotmail.com');
			$message->subject($data['subject']);
		}); // if you want to be sent immediately
		Session::flash('success', ' your email has been sent');
		return redirect()->url('/');
	}
}


?>