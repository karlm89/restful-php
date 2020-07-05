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
    
    // Blog post query
    $result = $post->index();
    
    // Get row count
    $num = $result->rowCount();

    if($num > 0) {
        // Create Array
        $posts_arr = array();
        $posts_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $post_item = array (
                'id' => $id,
                'title' => $title,
                'author' => $author,
                'category_name' => $category_name,
                'body' => html_entity_decode($body),
                'category_id' => $category_id,
                'created_at' => $created_at
            );

            // Push to "Data"
            array_push($posts_arr['data'], $post_item);
        }

        // Turn to JSON
        echo json_encode($posts_arr);

    } else {
        echo json_encode(
            array('message' => 'No posts found.')
        );
    }