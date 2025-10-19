<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ContactController extends FrontendController
{
  public function index()
  {
    return view(
      'themes/' . $this->theme_directory . '/templates/contact',
      array_merge($this->data, [
        'tagline' => 'Contact us',
      ])
    );
  }


  public function submit(Request $request)
  {
    // Server-side form validation
    $rules = [
      'name' => 'required',
      'email' => 'required|email',
      'phone' => 'required|numeric',
      'message' => 'required'
    ];

    $messages = [
      'name.required' => 'Please enter your name',
      'email.required' => 'Please enter your email address',
      'email.email' => 'Not a valid email address',
      'phone.required' => 'Please enter your phone number',
      'phone.numeric' => 'The phone must contain only digits',
      'message.required' => 'Please enter a message'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors())->withInput()->with('error', 'There are invalid fields in the form.');
    } else {
      Mail::send(
        'themes/' . $this->theme_directory . '/emails/contact-message',
        [
          'site_name' => $this->data['site_name'],
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'msg' => nl2br($request->message),
        ],
        function ($mail) use ($request) {
          $mail->from($request->email, $request->name);
          $mail->to($this->data['owner_email'])->subject('A message from ' . $this->data['site_name']);
        }
      );

      return redirect()->back()->with('success', 'Your message was sent. We will get back to you as soon as possible!');
    }
  }
}
