<?php
session_start();


function userSession($user){
    $_SESSION["userid"]=$user->id;
    $_SESSION["username"]=$user->username;
}