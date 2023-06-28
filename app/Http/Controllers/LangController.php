<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function cambiar(Request $request)
    {
        App::setLocale($request->all()['lang']);
        session()->put('locale', $request->all()['lang']);

        return redirect()->back();
    }
}
