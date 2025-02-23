<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLang(Request $request)
    {
        $lang = $request->lang;

        // Store selected language in session
        Session::put('lang', $lang);

        // Set locale for the app
        App::setLocale($lang);

        return redirect()->back(); // Refresh the page
    }
}
