<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
  // Allows only guest to acces this page
  public function __construct()
  {
    $this->middleware('guest');
  }
  public function index() {
    return view('auth.register');
  }
  public function store(Request $request) {
    // Validation
    $this->validate($request, [
      'name' => 'required|max:255',
      'username' => 'required|max:255',
      'email' => 'required|email|max:255',
      'password' => 'required|confirmed',
    ]);
    // Store User
    User::create([
      'name' => $request->name,
      'username' => $request->username,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);
    // Sing user in
    auth()->attempt($request->only('email', 'password'));
    // Redirect
    return redirect()->route('dashboard');
  }
}
