<?php
date_default_timezone_set( 'Asia/Tehran' );

$db = mysqli_connect( 'localhost', 'root', '', 'todo' );

$success    = '';
$error      = '';

include( 'libs/jdf.php' );
include( 'db_functions.php' );
include( 'include/functions-user.php' );

include( 'include/form-proccess.php' );