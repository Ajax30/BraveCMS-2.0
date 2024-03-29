<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;

class UserRightsController extends Controller
{
  public function roles() {
    return Role::all();
  }
  
  public function index() {
    $users = User::paginate(10);
    $users_count = User::count();
    return view('dashboard/user-rights', ['users' => $users, 'users_count'=> $users_count]);
  }

  public function change_role($id) {
    $user = User::find($id);
    return view('dashboard/change-role',['user' => $user, 'roles' => $this->roles()]);
  }

  public function update_role(Request $request, $id) {
    $user = User::find($id);
    $user->role_id = $request->get('role_id');
    $user->save();
    return redirect()->route('user-rights')->with('success', 'The role for ' . $user->first_name . ' ' . $user->last_name . ' was updated');
  }

  public function ban_user($id){
    User::find($id)->update(['active' => 0]);
    return redirect()->back()->with('success', 'The user is now banned');
  }

  public function activate_user($id){
    User::find($id)->update(['active' => 1]);
    return redirect()->back()->with('success', 'The user is now active');
  }

  // Available permissions
  public function permissions(){
    return view('dashboard/permissions', ['roles' => $this->roles()]);
  }


}
