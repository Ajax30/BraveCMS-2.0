<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;

class UserRightsController extends Controller
{
  public function roles()
  {
    return Role::all();
  }

  public function index()
  {
    $users = User::paginate(10);
    $users_count = User::count();
    return view('dashboard/user-rights', ['users' => $users, 'users_count' => $users_count]);
  }

  public function change_role($id)
  {
    $user = User::findOrFail($id);
    return view('dashboard/change-role', ['user' => $user, 'roles' => $this->roles()]);
  }

  public function update_role(Request $request, $id)
  {
    $user = User::findOrFail($id);

    if (auth()->id() === $user->id) {
      abort(403);
    }

    $request->validate([
      'role_id' => 'required|exists:roles,id'
    ]);

    $user->role_id = $request->role_id;
    $user->save();

    return redirect()->route('user-rights')->with('success', 'The role for ' . $user->first_name . ' ' . $user->last_name . ' was updated');
  }

  public function ban_user($id)
  {
    $user = User::findOrFail($id);

    if (auth()->id() === $user->id) {
      abort(403);
    }

    $user->update(['active' => 0]);

    return redirect()->back()->with('success', 'The user is now banned');
  }

  public function activate_user($id)
  {
    $user = User::findOrFail($id);

    $user->update(['active' => 1]);

    return redirect()->back()->with('success', 'The user is now active');
  }

  public function permissions()
  {
    return view('dashboard/permissions', ['roles' => $this->roles()]);
  }
}
