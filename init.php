<?php
date_default_timezone_set( 'Asia/Tehran' );
session_start();

include( 'db_functions.php' );
mysqli_report( MYSQLI_REPORT_ERROR );
$db = @mysqli_connect( 'localhost', 'root', '', 'todo' );
if( ! $db ){
    db_log( mysqli_connect_error() );
    include( 'db-error.php' );
    exit;
}

$success    = '';
$error      = '';

//unset( $_SESSION['name'] );
//$_SESSION['name'] = 'Hamed';
//print_r( $_SESSION );
//exit;

include( 'libs/jdf.php' );

include( 'include/functions.php' );
include( 'include/functions-user.php' );
include( 'include/functions-task.php' );

include( 'include/form-proccess.php' );