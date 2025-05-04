<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switchLanguage(Request $request): RedirectResponse
    {
        $locale = $request->input('locale', config('app.locale'));
        session(['locale' => $locale]);

        return redirect()->back();
    }
}
