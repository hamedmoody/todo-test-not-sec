<?php
function insert_task( $title, $status, $progress, $date ){

    $data = [
        'title'         => $title,
        'status'        => $status,
        'progress'      => $progress,
        'date'          => $date,
        'user_id'       => get_user_id(),
        'created_at'    => current_date(),
        'updated_at'    => current_date(),
    ];

    $task_id = db_insert( 'tasks', $data );

    var_dump( $task_id );exit;

}