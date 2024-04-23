<?php

use Stichoza\GoogleTranslate\GoogleTranslate;

function Translate($text){
    $translator = new GoogleTranslate();
    return $translator->translate($text, app()->getLocale());
}
