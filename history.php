<?php
require_once ('Array.php');
require_once ('functions.php');
if (isset($_COOKIE['see_lots'])){
    $history = json_decode($_COOKIE['see_lots']);

}
$page_content = include_template('templates/history_lots.php', ['ads' => $ads,'history' => $history]);
$layout_content = include_template('templates/layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Yeticave - история просмотров',

]);

print($layout_content);