<?php


if($_COOKIE['micookie']){
    unset($_COOKIE['micookie']);
    setcookie('micookie', '', time() - 100);
}


if($_COOKIE['unyear']){
    unset($_COOKIE['unyaer']);
    setcookie('unyear', '', time() - 100);
}


