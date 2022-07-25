<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SettingsController extends Controller {
    
	private $rules = [
		'site_name' => 'required|string|max:190',
		'tagline' => 'required|string|max:190',
		'owner_name' => 'required|string|max:190',
		'owner_email' => 'required|email|max:190',
		'twitter' => 'required|string|max:190',
		'facebook' => 'required|string|max:190',
		'instagram' => 'required|string|max:190',
		'theme_directory' => 'required|string|max:190',
	];

	private $messages = [
		'site_name.required' => 'A site title is required',
		'tagline.required' => 'A site tag line is required',
		'owner_name.required' => 'Please provide a site owner/company name',
		'owner_email.required' => 'A valid email is required',
		'owner_email.email' => 'The email you provided is not valid',
		'twitter.required' => 'required|string|max:190',
		'facebook.required' => 'required|string|max:190',
		'instagram.required' => 'required|string|max:190',
		'theme_directory.required' => 'required|string|max:190',
	];
	
	public function index() {
		$settings = Settings::all()[0];
		return view('dashboard/settings', ['settings' => $settings]);
	}

	public function update(Request $request) {
		$validator = Validator::make($request->all(), $this->rules, $this->messages);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors())->withInput();
		} else {
			$settings = Settings::all()[0];
			$settings->site_name = $request->get('site_name');
			$settings->tagline = $request->get('tagline');
			$settings->owner_name = $request->get('owner_name');
			$settings->owner_email = $request->get('owner_email');
			$settings->twitter = $request->get('twitter');
			$settings->facebook = $request->get('facebook');
			$settings->instagram = $request->get('instagram');
			$settings->theme_directory = $request->get('theme_directory');
			$settings->is_cookieconsent = $request->get('is_cookieconsent') == 'on' ? 1 : 0;
			$settings->is_infinitescroll = $request->get('is_infinitescroll') == 'on' ? 1 : 0;
			
			$settings->save();
			return redirect()->route('dashboard.settings')->with('success', 'The settings were updated!');
		}
	}
}
