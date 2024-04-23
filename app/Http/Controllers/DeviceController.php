<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index(){
        $deviceName = session('device_name');
        $os = session('os');
        return view('current_login',  compact('deviceName', 'os'));
    }
}
