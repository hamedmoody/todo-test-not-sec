<?php
include( 'init.php' );

header( 'content-type: application/json' );

$action = $_POST['action'];

$result = [];

if( $action == 'save_task' ){

    $title      = $_POST['title'];
    $status     = $_POST['status'];
    $progress   = $_POST['progress'];
    $date       = $_POST['date'];

    $task    = insert_task( $title, $status, $progress, $date );

    if( $task['success'] ){

        $result['message'] = 'وظیفه ثبت شد';
        $result['task_id'] = $task['task_id'];


    }else{

        http_response_code( 400 );
        $result['message'] = $task['message'];

    }

    echo json_encode( $result );

}