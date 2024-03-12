<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find(Auth::id());
        $mobils = Mobil::all();
        return view('home')->with('user', $user)->with('mobils', $mobils);
    }
}
