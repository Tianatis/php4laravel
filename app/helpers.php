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

public function showMsg($message, $type = 'str')
{
    if($message['mess_code'] != ''){
        $ms = $this->CleanText($message['mess_code']);
        switch($ms)
        {
            case 'auth':
                $mess = 'Вы успешно авторизованы.';
                break;
            case 'err_article':
                $mess = 'Большой брат следит за тобой...<br>Читай то, что есть.';
                break;
            case 'err_edit_no_article':
                $mess = 'Не выбрана статья для редактирования';
                break;
            case 'article_deleted':
                $mess = 'Статья успешно удалена';
                break;
            case 'article_already_deleted':
                $mess = 'Наверно вы удалили эту статью раньше...';;
                break;

            case 'err_article_deleted':
                $mess = 'Не удалось удалить статью';
                break;
            case 'err_edit':
                $mess = 'Большой брат следит за тобой...<br>Редактируй то, что есть.';
                break;
            case 'err_edit_article':
                $mess = 'Cтатьи, которую вы хотите отредактировать, не существует!';
                break;
            case 'success_edit':
                $mess = 'Статья успешно отредактирована.';
                break;
            case 'article_add':
                $mess = 'Статья добавлена.';
                break;
            case 'need_auth':
                $mess = 'Необходима авторизация';
                break;
            case 'need_admin':
                $mess = 'Недостаточно прав для выполнения этого действия';
                break;
            case 'wrong_auth_data':
                $mess = 'Неверный логин или пароль';
                break;
            case 'add_auth_data':
                $mess = 'Введите логин и пароль';
                break;
            case 'respond_add':
                $mess = 'Ответ добавлен';
                break;
            case 'text':
                $mess = $this->CleanText($message['mess_text']);
                break;
        }

        $color	= 'black';
        if(isset($message['mess_type'])){
            if($message['mess_type'] == 'err')
                $color	= 'red';
            elseif($message['mess_type'] == 'success')
                $color	= 'green';
        }

        $msg = "<div class='mess_text' style='color:$color;'>$mess</div>";
        if($type ==='box')
            $msg = "<div id='message_box'>$msg</div>";
    }else{
        $msg = false;
    }
    unset($_SESSION['mess_code']);
    unset($_SESSION['mess_type']);
    unset($_SESSION['mess_text']);

    return $msg;
}