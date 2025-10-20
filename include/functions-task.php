<?php
function insert_task( $title, $status, $progress, $date ){

    if( strlen( $title ) < 5  ){
        return [
            'success'   => false,
            'message'   => 'طول عنوان باید بیشتر باشد',
        ];
    }

    $data = [
        'title'         => $title,
        'status'        => $status,
        'progress'      => $progress,
        'to_time'       => $date,
        'user_id'       => get_user_id(),
        'created_at'    => current_date(),
        'updated_at'    => current_date(),
    ];

    $task_id = db_insert( 'tasks', $data );

    return [
        'sucess'    => true,
        'task_id'   => $task_id
    ];

}