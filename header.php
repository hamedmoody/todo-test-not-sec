<?php
require 'init.php';
if( ! is_user_login() ){
    redirect( 'login.php' );
}
$user       = current_user();
$full_name  = $user['first_name'] . ' ' . $user['last_name'];
$phone      = $user['phone'];
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        if( $page == 'dashboard' ){
            echo 'پیشخوان';
        }elseif( $page == 'tasklist' ){
            echo 'لیست وظایف';
        }elseif( $page == 'newtask' ){
            echo 'وظیفه جدید';
        }
        ?>
    </title>
    <link rel="stylesheet" href="https://dl.daneshjooyar.com/mvie/Moodi_Hamed/assets/css/font-yekanbakh-vf.css">
    <link rel="stylesheet" href="css/panel.css">
</head>
<body>