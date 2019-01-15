<?php


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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $form = $_POST;
        $required = ['email', 'password', 'name'];
        $errors = [];
        foreach ($required as $field){
            if (empty($form[$field])){
                $errors[$field] = 'Это поле надо заполнить';
            }
        }
        if ( $user = searchUserByEmail($form['email'], $users)) {
            $errors['email'] = 'Такой аккаунт существует';
        }else {
            if (!empty($form['password'])) {
                $passwordHash = password_hash($form['password'], PASSWORD_DEFAULT);
            }
        }





        if (count($errors)) {
            $page_content = include_template('templates/sing-up.php', ['form' => $form, 'errors' => $errors,'categories' => $categories ]);
        }else {
            $sql = 'INSERT INTO users (dt_add, user_name, email, password, contact_info) VALUES (NOW(), ?, ?, ?, ?)';

            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, 'ssss',$form['name'], $form['email'], $passwordHash, $form['message'] );
            $res = mysqli_stmt_execute($stmt);
            if ($res) {
                $user_id = mysqli_insert_id($link);

                header("Location: /index.php");
            }
            else {
                $error = mysqli_error($link);
                $page_content = include_template('templates/error.php', ['error' => $error]);
            }
        }

    }
    else {
        $page_content = include_template('templates/sing-up.php', ['categories' => $categories, 'users' => $users]);
    }
}
$layout_content = include_template('templates/layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Yeticave - страница регистрации пользователя'
]);

print($layout_content);