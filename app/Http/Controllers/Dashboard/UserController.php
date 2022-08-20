<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

	public function index()
	{
		return view('dashboard/user-profile',
			['current_user' => Auth::user()] 
		);
	}

	public function update(UserRequest $request)
	{

		if ($request->isMethod('GET')) {
			return redirect()->route('user');
		}

		$current_user = Auth::user();
		$current_user->first_name = $request->get('first_name');
		$current_user->last_name = $request->get('last_name');
		$current_user->email = $request->get('email');
		$current_user->bio = $request->get('bio');

		// Upload avatar
		if (isset($request->avatar)) {
			$imageName = md5(time()) . $current_user->id . '.' . $request->avatar->extension();
			$request->avatar->move(public_path('images/avatars'), $imageName);
			$current_user->avatar = $imageName;
		}

		// Update user
		$current_user->save();
		
		return redirect('dashboard/user')
			->with('success', 'User data updated successfully');
	}

	// Delete avatar
	public function deleteavatar(User $user, $fileName)
	{
		$user->avatar = "default.png";
		$user->save();

		if (File::exists(public_path('images/avatars/' . $fileName))) {
			File::delete(public_path('images/avatars/' . $fileName));
		}
	}
}