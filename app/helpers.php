<?php

function CleanText($text)
{
    //убирает двойные пробелы
    $cleantext = preg_replace('/\s/', ' ',  $text) ;
    //убирает пробелы в конце строки
    $cleantext = trim($cleantext) ;
    //защита от xss
    $cleantext = htmlspecialchars($cleantext);

    return $cleantext;
}

function intro($string){
    $string = strip_tags($string);
    if(mb_strlen($string)>200){
        $string = mb_substr($string, 0, 200);
        $string = rtrim($string, "!,.-");
        $string = mb_substr($string, 0, mb_strrpos($string, ' '));
        $string .= "… ";
    }
    return $string;

}
