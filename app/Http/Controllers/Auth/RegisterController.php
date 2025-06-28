<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
  use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::DASHBOARD;

  /**
   * Create a new controller instance.
   */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
   * Get a validator for an incoming registration request.
   */
  protected function validator(array $data)
  {
    $rules = [
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:6', 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).*$/'],
      'password_confirmation' => ['required', 'same:password'],
      'accept' => ['accepted'],
    ];

    $messages = [
      'first_name.required' => 'The "First name" field is required.',
      'last_name.required' => 'The "Last name" field is required.',
      'email.required' => 'Please provide a valid email address.',
      'email.email' => 'The email address you provided is not valid.',
      'email.unique' => 'The email address is already in use.',
      'password.required' => 'A password is required',
      'password.min' => 'The password must have at least :min characters.',
      'password.regex' => 'Include uppercase and lowercase letters, at least one number and one symbol (special character).',
      'accept.required' => 'You must accept the Terms & conditions of service.'
    ];

    return Validator::make($data, $rules, $messages);
  }

  /**
   * Create a new user instance after a valid registration.
   */
  protected function create(array $data)
  {
    // All registered users have the role "Basic User",
    // except the first, which is a "Super-admin"
    $role_id = User::count() == 0 ? 4 : 1;

    return User::create([
      'role_id' => $role_id,
      'first_name' => $data['first_name'],
      'last_name' => $data['last_name'],
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
      'active' => 1
    ]);
  }

  /**
   * Check that email is unique.
   */
  public function checkEmail(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => ['required', 'email', 'unique:users,email'],
    ]);

    if ($validator->fails()) {
      return response()->json([
        'valid' => false,
        'message' => 'The email address is already in use.',
      ]);
    }

    return response()->json([
      'valid' => true,
      'message' => '',
    ]);
  }
}
