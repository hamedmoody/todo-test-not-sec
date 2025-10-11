<?php
if( isset( $_POST['register'] ) ){
    
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $first_name = $_POST['name'];
    $last_name  = $_POST['family'];
    $phone      = $_POST['phone'];

    $user_id    = insert_user( [
        'username'      => $username,
        'password'      => $password,
        'first_name'    => $first_name,
        'last_name'     => $last_name,
        'phone'         => $phone,  
    ] );
        
    if( $user_id ){
        $success = 'کاربر ثبت شد';
    }
        


}