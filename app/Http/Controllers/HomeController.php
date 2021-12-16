<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        // check role yang login admin atau user biasa
        switch (Auth::user()->is_admin) {
            case true:
                return redirect(route('admin.dashboard'));
                break;
            
            default:
                return redirect(route('user.dashboard'));
                break;
        }
    }
}
