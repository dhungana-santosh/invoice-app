<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function switchLanguage(Request $request): RedirectResponse
    {
        app()->setLocale($request->get('locale'));
        session()->put('locale', $request->get('locale'));
        return redirect()->back();
    }
}
