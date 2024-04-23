<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CustomFontController extends Controller
{
    public function index(){
        return view("Move");
    }
    public function UploadImage(){
        return view('upload');
    }
    public function location(){
        return view('locationPath');
    }
    public function Search(){
        return view('search');
    }
    public function Copy(){
        return view('copy');
    }
}
