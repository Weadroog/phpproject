<?php
//require_once ('Array.php');
require_once ('init.php');
if (!$link){
    $error = mysqli_connect_error();
    $page_content = include_template('templates/error.php',['error' => $error]);
} else{
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
    $id = intval($_GET['lot_id']);
    $sql_lot ='SELECT lots.id, lot_id, title, path, now_price, count_rates, categories.name, user_name  FROM lots  '
        . 'JOIN categories ON lots.category_id = categories.id '
        . 'JOIN users ON lots.user_id = users.id '
        . 'WHERE lot_id = ' . $id;
    if ($result_lot = mysqli_query($link, $sql_lot)) {
        if (!mysqli_num_rows($result)) {
            http_response_code(404);
            $page_content = include_template('templates/error.php', ['error' => 'Лот с этим идентификатором не найден']);
        }
        else{
            $lot = mysqli_fetch_array($result_lot, MYSQLI_ASSOC);
        }

    }else{
        $error = mysqli_error($link);
        $page_content = include_template('templates/error.php', ['error' => $error]);
    }

    session_start();
    $lot_name = 'see_lots';
    $lot_arr = [];
    $expire = strtotime("+30 days");
    $path = "/";

  /*  if (isset($_GET['lot_id'])) {
        $lot_id = $_GET['lot_id'];
        foreach ($ads as $item) {
            if ($item['id'] == $lot_id) {
                $lot = $item;
                break;
            }

        }

    };
*/
    if (!$lot) {
        http_response_code(404);
    }
    if (isset($_GET['lot_id']) and !(in_array($lot_id, $lot_arr))) {
        array_push($lot_arr, $lot_id);
        $lots_his = json_encode($lot_arr);

    }
    setcookie($lot_name, $lots_his, $expire, $path);

    $page_content = include_template('templates/lot_item.php', ['lot' => $lot, 'categories' => $categories, 'users' => $users]);
}
$layout_content = include_template('templates/layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Yeticave - информация о лоте',

]);

print($layout_content);