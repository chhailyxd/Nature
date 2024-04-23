<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DownloadController extends Controller
{
    public function uploadUrl(Request $req){
        $url = $req->input("image_url");
        dd($url);
        $res = Http::get($url);
        if($res->successful()){
            $filename = uniqid() . '.jpg';
            Storage::put('public/images/'. $filename, $res->body());
            return Storage::url('public/images/'. $filename);
        }else{
            abort(404);
        }
    }

    public function index(){
        return view('form.Download');
    }
}
