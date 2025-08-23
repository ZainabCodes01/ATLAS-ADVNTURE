<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class LanguageController extends Controller
{
     public function translate(Request $request)
    {
        $response = Http::post('https://libretranslate.de/translate', [
            'q' => $request->text,
            'source' => $request->source ?? 'en',   // Default English
            'target' => $request->target ?? 'ur',  // Default Urdu
            'format' => 'text'
        ]);

        return response()->json($response->json());
    }
}
