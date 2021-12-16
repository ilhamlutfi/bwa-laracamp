<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            // ambil data checkout berdasarkan id user login relasi ke tabel camp id
            'checkouts' => Checkout::with('Camp')->whereUserId(Auth::id())->get()
        ];

        return view('user.dashboard', $data);
    }
}
