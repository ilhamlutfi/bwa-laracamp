<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // panggil suport Mail::
use App\Mail\User\AfterRegister; // panggil function AfterRegister untuk email

class UserController extends Controller
{
    public function login()
    {
        return view('auth.user.login');
    }

    public function google()
    {
        // menampilkan view email google untuk login
        return Socialite::driver('google')->redirect();
    }

    // handle login or register socialite drive google
    public function handleProviderCallback()
    {
        // ambil data user login dgn google
        $callback = Socialite::driver('google')->stateless()->user();

        // parsing ke variable $data
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => $callback->getAvatar(),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];

        // firstOrCreate digunakan untuk menambah data baru jika email tidak ada di db
        // $user = User::firstOrCreate(['email' => $data['email']], $data);

        // check email sudah registrasi atau belum di tabel user
        $user = User::whereEmail($data['email'])->first();
        
        if (!$user) {
            // kalau email tidak ada registrasikan create ke db
            $user = User::create($data);
            // kirim email dengan function AfterRegister
            Mail::to($user->email)->send(new AfterRegister($user));
        }

        // inisiasi user yang login
        Auth::login($user, true);

        return redirect(route('welcome'));
    }
}
