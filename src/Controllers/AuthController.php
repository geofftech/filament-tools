<?php

namespace GeoffTech\FilamentTools\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->has('target')) {
            redirect()->setIntendedUrl($request->get('target'));
        }

        return redirect(route('filament.profile.auth.login'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
