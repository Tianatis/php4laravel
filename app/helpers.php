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

function comments_count($count = 0) {
    $array = array("комментраий", "комментария", "комментариев");
    return $count.' '.getWord($count, $array);
}
function articles_count($count = 0) {
    $array = array("статья", "статьи", "статей");
    return $count.' '.getWord($count, $array);
}
function messages_count($count = 0) {
    $array = array("сообщение", "сообщения", "сообщений");
    return $count.' '.getWord($count, $array);
}

function getWord($number, $suffix) {
    $keys = array(2, 0, 1, 1, 1, 2);
    $mod = $number % 100;
    $suffix_key = ($mod > 7 && $mod < 20) ? 2: $keys[min($mod % 10, 5)];
    return $suffix[$suffix_key];
}

function makeTree($arr){
    if(!count($arr)>0)
        return false;

    $items=[];

    foreach($arr as $item){
        $items[$item->parent_id][$item->id] =  $item;
    }
    return $items;



}