<?php
function insert_user( $user_data ){
    //Control insert user
    global $error;

    $username   = isset( $user_data['username'] ) ? strtolower( trim( $user_data['username'] ) ) : false;
    $password   = isset( $user_data['password'] ) ? $user_data['password'] : false;
    $phone      = isset( $user_data['phone'] ) ? $user_data['phone'] : false;
    $first_name = isset( $user_data['first_name'] ) ? $user_data['first_name'] : false;
    $last_name  = isset( $user_data['last_name'] ) ? $user_data['last_name'] : false;

    if( strlen( $username ) < 8 ){
        $error = 'user less than 8 char';
        return false;
    }

    if( str_contains( $username, ' ' ) ){
        $error = 'user name has sapce';
        return false;
    }

    $exists_user = get_user_by( 'username', $username );
    if( $exists_user ){
        $error = 'user exists';
        return false;
    }

    if( strlen( $phone ) != 11 ){
        $error = 'phone invalid';
        return false;
    }

    if( strlen( $password ) < 8 ){
        $error = 'password 8 chars';
        return false;
    }


    $hash_pass  = md5( 'd2KULf4ZCocXnf3ifcOhAIIWEvbRDz' . $password );


    $user_data = [
        'username'      => $username,
        'password'      => $hash_pass,
        'phone'         => $phone,
        'first_name'    => $first_name,
        'last_name'     => $last_name,
        'created_at'    => date( 'Y-m-d H:i:s' )
    ];

    return db_insert( 'users', $user_data );

}

function get_user_by( $field, $value ){
    

    global $db;
    $sql = "SELECT * FROM users WHERE $field = '$value'";

    $result = mysqli_query( $db, $sql );

    if( ! $result ){
        return false;
    }

    if( ! $result->num_rows ){
        return false;
    }

    $user = mysqli_fetch_assoc( $result );

    return $user;

}