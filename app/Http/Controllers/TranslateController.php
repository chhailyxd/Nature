<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateController extends Controller
{
    public function index(Request $req){
        $size = $req->cookie('font', 'df');
        $fonttheme = $req->cookie('family', 'df');
        $color = $req->cookie('color', 'df');
        // $locale = $req->cookie('locale', 'en');
        return view("Translate", compact('size', 'fonttheme', 'color'));
    }

    public function CustomFontSize(Request $req){
        // session()->put('font', $req->size);
        return redirect()->back()->withCookie(cookie('font', $req->size));
    }

    public function CustomFontTheme(Request $req){
        // session()->put('family', $req->font);
        return redirect()->back()->withCookie(cookie('family', $req->font));
    }

    public function CustomColor(Request $req){
        // session()->put('color', $req->color);
        return redirect()->back()->withCookie(cookie('color', $req->color));
    }

    public function TranslateContent(Request $req){
        App::setLocale($req->lang);
        // session()->put('locale', $req->lang);
        return redirect()->back()->withCookie(cookie('locale', $req->lang));
    }
}
