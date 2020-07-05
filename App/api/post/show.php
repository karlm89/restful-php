<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config.php';
    include_once '../../models/Post.php';

    // DB & Connection
    $database = new Database();
    $db = $database->connect();

    // Get Posts object
    $post = new Post($db);
    
    // Get ID
    $post->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get Post 
    $post->show();
    
    // Create Array
    $post_arr = array (
        'id' => $post->id,
        'title' => $post->title,
        'author' => $post->author,
        'category_id' => $post->category_id,
        'category_name' => $post->category_name,
        'body' => $post->body,
        'created_at' => $post->created_at
    );

    // Make JSON
    print_r(json_encode($post_arr));