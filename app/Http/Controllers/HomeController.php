<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        $data = [
            // ambil data checkout berdasarkan id user login relasi ke tabel camp id
            'checkouts' => Checkout::with('Camp')->whereUserId(Auth::id())->get()
        ];

        return view('user.dashboard', $data);
    }
}
