<?php
function hash_pass( $password ){
    return md5( 'd2KULf4ZCocXnf3ifcOhAIIWEvbRDz' . $password );
}

function insert_user( $user_data ){
    //Control insert user

    $username   = isset( $user_data['username'] ) ? strtolower( trim( $user_data['username'] ) ) : false;
    $password   = isset( $user_data['password'] ) ? $user_data['password'] : false;
    $phone      = isset( $user_data['phone'] ) ? $user_data['phone'] : false;
    $first_name = isset( $user_data['first_name'] ) ? $user_data['first_name'] : false;
    $last_name  = isset( $user_data['last_name'] ) ? $user_data['last_name'] : false;

    if( strlen( $username ) < 8 ){
        return [
            'success'   => false,
            'message'   => 'user less than 8 char'
        ];
    }

    if( str_contains( $username, ' ' ) ){
        return [
            'success'   => false,
            'message'   => 'user name has sapce'
        ];
    }

    $exists_user = get_user_by( 'username', $username );
    if( $exists_user ){
        return [
            'success'   => false,
            'message'   => 'user exists'
        ];
    }

    if( strlen( $phone ) != 11 ){
        return [
            'success'   => false,
            'message'   => 'phone invalid'
        ];
    }

    if( strlen( $password ) < 8 ){
        return [
            'success'   => false,
            'message'   => 'password 8 chars'
        ];
    }


    $hash_pass  = hash_pass( $password );

    $user_data = [
        'username'      => $username,
        'password'      => $hash_pass,
        'phone'         => $phone,
        'first_name'    => $first_name,
        'last_name'     => $last_name,
        'created_at'    => date( 'Y-m-d H:i:s' )
    ];

    $user_id =  db_insert( 'users', $user_data );

    return [
        'success'   => true,
        'message'   => 'ثبت کاربر انجام شد',
        'data'      => $user_id
    ];

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

function user_login( $username, $password ){
    
    $username = trim( strtolower( $username ) );
    
    if( ! $username ){
        return [
            'success'   => false,
            'message'   => 'user invalid'
        ];
    }

    if( ! $password ){
        return [
            'success'   => false,
            'message'   => 'password invalid format'
        ];
    }

    $password = hash_pass( $password );

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $user = db_get_row( $sql );

    if( ! $user ){
        return [
            'success'   => false,
            'message'   => 'user name or password is invalid',
        ];
    }

    //
    $_SESSION['user_id'] = $user['ID'];
    
    return [
        'success'   => true,
        'user'      => $user
    ];

}

function redirect( $url ){
    header( 'location: ' . $url );
    exit;
}

function get_user_id(){
    return isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : 0;
}

function is_user_login(){
    return get_user_id();
}

function current_user(){
    if( is_user_login() ){
        $user_id = get_user_id();
        $user = get_user_by( 'ID', $user_id );
        return $user;
    }
    return false;
}

function user_logout(){
    unset( $_SESSION['user_id'] );
}