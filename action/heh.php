<?php
/**
 * Created by PhpStorm.
 * User: boott
 * Date: 19.02.2017
 * Time: 16:07
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$file = file(__DIR__.'/users.txt');
$get_email = trim($_POST['email']);
$get_password = trim($_POST['password']);

$result= array();

$count_strocks = count($file);
$x = 0;
foreach ($file as $val){
    $x++;
    $ex = explode(':||:', $val);
    $email = trim($ex[0]);
    $password = trim($ex[1]);
    if($get_email == $email && $get_password == $password){
        $result['text'] = "Добро пожаловать";
        break;
    }elseif ($get_email == $email && $get_password != $password){
        $result['text'] = 'Неверный логин или пароль';
        break;
    }elseif ($x == $count_strocks && ($get_email == '' || $get_password == '')){
        $result['text'] = 'Вы не ввели email или пароль';
        break;
    }elseif ($x == $count_strocks && $get_email != '' && $get_password != ''){
        file_put_contents(__DIR__.'/users.txt', "{$get_email}:||:{$get_password} \n", FILE_APPEND | LOCK_EX);
        $result['text'] = 'Учетная запись добавлена';

    }
}

echo json_encode($result);

