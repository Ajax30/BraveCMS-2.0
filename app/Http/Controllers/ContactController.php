<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends FrontendController
{
  public function index() {
			return view('themes/' . $this->theme_directory . '/templates/contact', 
			array_merge($this->data, [
				'tagline' => 'Contact us',
			])
		);
	}


	public function submit(ContactRequest $request){
		Mail::send('themes/' . $this->theme_directory . '/emails/contact-message', [
			'site_name' => $this->data['site_name'],
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			'msg' => nl2br($request->message),
		],
		function($mail) use($request){
			$mail->from($request->email, $request->name);
			$mail->to($this->data['owner_email'])->subject('A message from ' . $this->data['site_name']);
		});

		return redirect()->back()->with('success', 'Your message was sent. We will get back to you as soon as possible!');
	}
}
