<?php

namespace App\Http\Controllers\Lang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Language extends Controller
{
    public function setLanguage($lang) {
        $availableLangs = ['en', 'ar'];
        if (!in_array($lang, $availableLangs)) {
            abort(400, 'Unsupported language');
        }
        App::setlocale($lang);
        Session::put('local', $lang);
        return redirect()->back();
    }}
