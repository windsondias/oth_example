<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function __invoke(string $locale)
    {
        if (! in_array($locale, ['en', 'es', 'pt_BR'])) {
            abort(400);
        }

        App::setLocale($locale);

        Session::put('locale', $locale);

        return redirect()->intended();
    }
}
