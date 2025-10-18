<?php
if( isset( $_POST['register'] ) ){
    
    $username   = isset( $_POST['username'] ) ? $_POST['username'] : '';
    $password   = $_POST['password'];
    $first_name = $_POST['name'];
    $last_name  = $_POST['family'];
    $phone      = $_POST['phone'];

    $result    = insert_user( [
        'username'      => $username,
        'password'      => $password,
        'first_name'    => $first_name,
        'last_name'     => $last_name,
        'phone'         => $phone,  
    ] );
        
    if( $result['success'] ){
        $success = $result['message'];
    }else{
        $error = $result['message']; 
    }


}

if( isset( $_POST['login'] ) ){

    $username = isset( $_POST['username'] ) ? $_POST['username'] : '';
    $password = isset( $_POST['password'] ) ? $_POST['password'] : '';

    $user     = user_login( $username, $password );

    if( $user['success'] ){
        redirect('index.php');
    }else{
        $error = $user['message'];
    }


}

if( isset( $_GET['action'] ) && $_GET['action'] == 'logout' ){
    user_logout();
}

if( isset( $_POST['save_task'] ) && is_user_login() ){

    $title      = $_POST['title'];
    $status     = $_POST['status'];
    $progress   = $_POST['progress'];
    $date       = $_POST['date'];

    $task_id    = insert_task( $title, $status, $progress, $date );


}