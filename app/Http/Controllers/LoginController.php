<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view("pages.login");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(LoginRequest $request): RedirectResponse
  {
    $credentials = $request->validated();
    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended(route("admin.index"));
    }
    return to_route("login.index");
  }
}
