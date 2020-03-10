<?php
// Dãy ngẫu nhiên
function createToken($length = 40){
    $token = '';
    $initString = '0123456789qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
    for($i = 1; $i <= $length; $i++){
        $position = rand(0, strlen($initString)-1);
        $token .= $initString[$position];

    }
    return $token;
}

?>