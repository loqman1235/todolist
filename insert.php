<?php

require_once 'db.php';


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $errors = null;
    $success = null;
    $response = [];

    $todo = htmlspecialchars(trim($_POST['todoVal']));

    if(empty($todo)) {
        $response = ['response' => 'error', 'message' => 'Please enter a todo'];
    } else {
        $stmt = $db->prepare("INSERT INTO `todos` (todo_name) VALUES (?)");
        if($stmt->execute([$todo])) {
            $response = ['response' => 'success', 'message' => 'Todo successfully added'];

        }
    }

    echo json_encode($response);
}
