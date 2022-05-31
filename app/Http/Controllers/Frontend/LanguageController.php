<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function French(){
        session()->get('language');
        session()->forget('language');
        session()->put('language','french');

        return redirect()->back();
    }

    public function English(){
        session()->get('language');
        session()->forget('language');
        session()->put('language','english');

        return redirect()->back();
    }
}
