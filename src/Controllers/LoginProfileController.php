<?php

namespace GeoffTech\FilamentTools\Controllers;

use Illuminate\Http\Request;

class LoginProfileController
{
    public function __invoke(Request $request)
    {
        if ($request->has('target')) {
            redirect()->setIntendedUrl($request->get('target'));
        }

        return redirect(route('filament.profile.auth.login'));
    }
}
