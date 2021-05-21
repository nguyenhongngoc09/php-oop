<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../../../config/Database.php';
require_once '../../../models/Post.php';

$database = new Database();
$db = $database->connect();

$post = new Post($db);

$result = $post->read();

$num = $result->rowCount();

if ($num > 0) {
    $aryPosts = array();
    $aryPosts['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $postItem = array(
            'id' => $id,
            'title' => $title,
            'content' => html_entity_decode($content),
            'category_id' => $category_id,
            'category_name' => $category_name,
            'user_id' => $user_id
        );

        array_push($aryPosts['data'], $postItem);
    }

    echo json_encode($aryPosts);
} else {
    echo json_encode(['message' => 'No post found']);
}