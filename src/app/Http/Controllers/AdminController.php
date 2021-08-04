<?php

namespace App\Http\Controllers;
use Auth;
use App\Enums\UserRole;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(Auth::user()->role == UserRole::getKey(UserRole::CUSTOMER)){
            return redirect('/home');
        }
        return view('admin.index');
    }
}