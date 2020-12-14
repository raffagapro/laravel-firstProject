<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  // Allows only guest to acces this page
  public function __construct()
  {
    $this->middleware('guest');
  }
  public function index() {
    return view('auth.login');
  }
  public function store(Request $request) {
    // Validation
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required',
    ]);
    // Sing user in
    if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
      return back()->with('status', 'Invalid Login Credentials');
    }
    // Redirect
    return redirect()->route('dashboard');
  }
}
