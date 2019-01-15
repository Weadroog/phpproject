<?php
//require_once ('userdata.php');
require_once ('init.php');
if (!$link){
    $error = mysqli_connect_error();
    $page_content = include_template('templates/error.php',['error' => $error]);
}else {
    $sql = 'SELECT `id`, `name` FROM categories';
    $result = mysqli_query($link, $sql);

    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($link);
        $page_content = include_template('templates/error.php', ['error' => $error]);
    }
    $sql_users = 'SELECT `id`, `user_name`, `email`, `password`  FROM users';
    $result_us = mysqli_query($link, $sql_users);
    if ($result_us) {
        $users = mysqli_fetch_all($result_us, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($link);
        $page_content = include_template('templates/error.php', ['error' => $error]);
    }
}
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;
    $required = ['email', 'password'];
    $errors = [];
    foreach ($required as $field){
        if (empty($form[$field])){
            $errors[$field] = 'Это поле надо заполнить';
        }
    }
    if (!count($errors) and $user = searchUserByEmail($form['email'], $users)){

            if (password_verify($form['password'], $user['password'])) {
                $_SESSION['user'] = $user;

            } else {
                $errors['password'] = 'Неверный пароль';
            }

    }else {
        $errors['email'] = 'Такой пользователь не найден';

    }

    if (count($errors)) {
        $page_content = include_template('templates/login.php', ['form' => $form, 'errors' => $errors,'categories' => $categories ]);
    }else {
        header("Location: /index.php");

    }

}else {
    if (isset($_SESSION['user'])) {
        $page_content = include_template('welcome.php', ['username' => $_SESSION['user']['user_name'],'categories' => $categories]);
    }
    else {
        $page_content = include_template('templates/login.php', ['categories' => $categories]);
    }
}
$layout_content = include_template('templates/layout.php', [
    'content' => $page_content,
    'categories' => $categories ,
    'title' => 'Yeticave - авторизация на сайте'

]);

print($layout_content);