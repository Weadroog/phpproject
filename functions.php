<?php
function format_number ($number) {
    $number = ceil($number);
    if ($number > 999) {
        $number = number_format($number, 0, ',', ' ');
        $number = $number . ' &#8381';
    } else {
        $number = $number . ' &#8381';
    }
    return $number;
};
function include_template ($path , $data){
    if (file_exists($path) ){
        extract($data);
        ob_start();
        require ($path);
        $content = ob_get_clean();
        return $content;

    }else {
         return $content = '';
    }

}
date_default_timezone_set("Europe/Moscow");
function time_lot (){
    $ts = time();
    $sale_lot = strtotime('tomorrow');
    $diff = $sale_lot - $ts;
    $hours = floor($diff / 3600);
    $minuts = floor(($diff % 3600 ) / 60);
    print ( $hours . ':' . $minuts  );
}
function searchUserByEmail ($email, $users) {
    $result = null;
    foreach ($users as $user){
        if($user['email'] == $email){
            $result = $user;
            break;
        }
    }
    return $result;
}