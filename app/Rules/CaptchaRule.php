<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CaptchaRule implements Rule{
    public function passes($attribute, $value){
        return true;
    }

    public function message(){
        return 'The :attibute field is invalid';
    }
}
