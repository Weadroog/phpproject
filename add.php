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
    } else {
        $error = mysqli_error($link);
        $page_content = include_template('templates/error.php', ['error' => $error]);
    }
}
session_start();
if (isset($_SESSION['user'])) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lot = $_POST;
        $required = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date', 'lot_img'];
        $dict = ['lot-name' => 'Название', 'message' => 'Описание', 'category' => 'Категория', 'lot-rate' => 'Начальная цена', 'lot-step' => 'Шаг ставки', 'lot-date' => 'Дата окончания торгов торгов', 'lot_img' => 'Изображение'];
        $errors = [];
        foreach ($_POST as $key => $value) {
            if (in_array($key, $required)) {
                if (!$value) {
                    $errors[$dict[$key]] = 'Это поле надо заполнить';
                }

            }
        }

        if (isset($_FILES['lot_img']['name'])) {
            $tmp_name = $_FILES['lot_img']['tmp_name'];
            $path = $_FILES['lot_img']['name'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            if (!empty($tmp_name)) {
                $file_type = finfo_file($finfo, $tmp_name);
            }
            if ($file_type !== "image/jpeg") {
                $errors['file'] = 'Загрузите картинку в формате jpeg';
            } else {
                move_uploaded_file($_FILES['lot_img']['tmp_name'], 'img/' . $path);
                $lot['path'] = 'img/'.$path;
            }

        } else {
            $errors['file'] = 'Вы не загрузили файл';
        }
        if (count($errors)) {
            $page_content = include_template('templates/add_lot.php', ['lot' => $lot, 'errors' => $errors, 'dict' => $dict, 'categories' => $categories]);
        } else {
            $sql = 'INSERT INTO lots (dt_add, title, description, path, user_id, category_id, start_price, step_price, dt_sale) VALUES (NOW(), ?, ?, ?, ?, ?, ?, ?, ?)';
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, 'ssssssss',$lot['lot-name'], $lot['message'], $lot['path'],$_SESSION['user']['id'],$lot['category'], $lot['lot-rate'], $lot['lot-step'], $lot['lot-date'] );
            $res = mysqli_stmt_execute($stmt);
            if ($res) {
                $lot_id = mysqli_insert_id($link);
                $lot_cor = $lot_id - 1;
                $sql = 'UPDATE lots SET  lot_id = ' . $lot_cor . ' WHERE id = ' . $lot_id;
                $resl = mysqli_query($link, $sql);
                if ($resl) {
                    $page_content = include_template('templates/lot_view.php', ['lot' => $lot, 'categories' => $categories]);
                }else{
                    $error = mysqli_error($link);
                    $page_content = include_template('templates/error.php', ['error' => $error]);
                }
            }else{
                $error = mysqli_error($link);
                $page_content = include_template('templates/error.php', ['error' => $error]);
            }
        }

    } else {
        $page_content = include_template('templates/add_lot.php', ['categories' => $categories]);
    }

    $layout_content = include_template('templates/layout.php', [
        'content' => $page_content,
        'categories' => $categories,
        'title' => 'Yeticave - добавление лота',

    ]);

    print($layout_content);
}else{
    http_response_code(403);
}