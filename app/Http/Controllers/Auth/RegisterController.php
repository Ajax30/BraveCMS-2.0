<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'same:password', 'min:6'],
            'accept' => ['accepted'],
        ];

        $messages = [
            'first_name.required' => 'The "First name" field is required',
            'last_name.required' => 'The "Last name" field is required',
            'email.required' => 'Please provide a valid email address',
            'email.email' => 'The email address you provided is not valid',
            'password.required' => 'A password is required',
            'accept.required' => 'You must accept the Terms & conditions of service'
        ];
        
        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // All registred users have the role "Basic User",
        // except the first, which is a "Superadmin"
        $role_id = User::count() == 0 ? 4 : 1;

        return User::create([
          'role_id' => $role_id,
					'first_name' => $data['first_name'],
					'last_name' => $data['last_name'],
					'email' => $data['email'],
					'password' => Hash::make($data['password']),
        ]);
    }
}
