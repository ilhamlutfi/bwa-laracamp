<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Checkout;

class Camp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'price'];

    public function getIsRegisteredAttribute()
    {
        // check apakah ada yg login atau tidak
        if (!Auth::check()) {
            // jika belum login kembalikan
            return false;
        }

        // periksa apakah user sudah registrasi di kursus yang sama/ada
        return Checkout::whereCampId($this->id)->whereUserId(Auth::id())->exists();
    }
}
