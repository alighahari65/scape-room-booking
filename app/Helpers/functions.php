<?php

use App\Models\User;


function isUserBirthday($user)
{
    $time = strtotime($user->birthday);
    if (date('m-d') == date('m-d', $time)) {
        return true;
    }
    return false;
}

function finalPrice($price, $discount)
{
    return $price - ($price * $discount);   
}
