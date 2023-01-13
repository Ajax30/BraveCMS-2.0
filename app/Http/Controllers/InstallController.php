<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class InstallController extends Controller
{
  public function index() {
    if (!Schema::hasTable('users')) {
      Artisan::call('migrate');
      Artisan::call('db:seed'); 
    } 
    return redirect('/register')->with('success', 'Way to go! You can create an account.');
  }
}
