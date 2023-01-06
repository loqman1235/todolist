<?php 

require_once 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $todoId = $_POST['todoId'];
    $response = [];
    $stmt = $db->prepare('SELECT * FROM `todos` WHERE todo_id=?');
    $stmt->execute([$todoId]);
    $todo = $stmt->fetch();

    $response = ['response' => 'success', 'data' => $todo];
    echo json_encode($response);

}