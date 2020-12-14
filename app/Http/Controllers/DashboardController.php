<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  // Allows only logged in users to acces this page
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index() {
    // dd(auth()->user());
    return view('dashboard');
  }
}
