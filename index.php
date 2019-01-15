<?php
//require_once ('userdata.php');
//require_once ('Array.php');
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
    $sql = 'SELECT lots.id, lot_id, title, path, now_price, count_rates, categories.name, user_name  FROM lots  '
        . 'JOIN categories ON lots.category_id = categories.id '
        . 'JOIN users ON lots.user_id = users.id '
        . 'ORDER BY lots.dt_add DESC';
    if ($res = mysqli_query($link, $sql)){
        $ads = mysqli_fetch_all($res, MYSQLI_ASSOC);
        $page_content = include_template('templates/index.php', ['ads' => $ads, 'categories' => $categories, 'username' => $_SESSION['user']]);
    }else {
        $page_content = include_template('templates/error.php', ['error' => mysqli_error($link)]);
    }
}
session_start();
//$page_content = include_template('templates/index.php', ['ads' => $ads, 'categories' => $categories, 'username' => $_SESSION['user']]);
if(!isset($_SESSION['user'])) {
    $layout_content = include_template('templates/layout.php', [
        'content' => $page_content,
        'categories' => $categories,
        'title' => 'Yeticave - Главная страница'
    ]);
}else {
    $layout_content = include_template('templates/layout.php', [
        'content' => $page_content,
        'categories' => $categories,
        'title' => 'Yeticave - Главная страница',
        'username' => $_SESSION['user']

    ]);
}
print($layout_content);


