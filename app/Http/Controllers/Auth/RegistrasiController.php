<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrasiRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrasiController extends Controller
{
    public function register(RegistrasiRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        Auth::login($user);
        return redirect()->route('home');
    }
}
