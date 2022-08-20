<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller {
	public function index() {
		$settings = Settings::first();
		return view('dashboard/settings', ['settings' => $settings]);
	}

	public function update(SettingsRequest $request) {
		$settings = Settings::first();
		$settings->update($request->validated());

		return redirect()->route('dashboard.settings')->with('success', 'The settings were updated!');
	}
}
