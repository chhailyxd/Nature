<?php

namespace App\Http\Controllers;

use App\Rules\CaptchaRule;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Logout;

class UserController extends Controller
{
    public function index(Request $req, $name, $email){
        return view("welcome", compact('name', 'email'));
    }

    public function FormSubmit(Request $req)
	{
        $ip = $req->ip();
        // echo $_SERVER['HTTP_USER_AGENT'];
        $device = $_SERVER['HTTP_SEC_CH_UA_PLATFORM'];
        $ippc = '111.90.184.192';
        $apiKey = "cc84f32dd0c0af";
        $client = new Client();
        $response = $client->get("https://ipinfo.io/{$ippc}?token={$apiKey}");

        $data = json_decode($response->getBody());

        // return $data;

        $country = $data->country;
        $city = $data->city;
        $timezone = $data->timezone;

        echo "<h1>On Device: ".$device."</h1>";
        echo "<h3>Country  : ".$country. "</h3>";
        echo "<h4>City     : ".$city."</h4>";
        echo "<h4>Timezone : ".$timezone."</h4>";

        // // var_dump($_SERVER);
        // dd($ip);
        // $publicIp = $_SERVER['REMOTE_ADDR'];
        // dd($publicIp);
        $req->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'g-recaptcha-response' => ['required', new CaptchaRule()],
          ]);

        $name = $req->input("name");
        $email = $req->input('email');

        return redirect()->route('welcome', [
            'name' => $name,
            'email' => $email
        ]);
	}

    public function Recaptcha(){
        return view('form.recaptcha');
    }

    public function logout(Logout $event){
        Session()->forget('g-recaptcha-response');
        return redirect()->route('recaptcha');
    }
}
