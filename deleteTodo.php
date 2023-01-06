<?php 

require_once 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $todoId = $_POST['todoId'];
    $response = [];

    $stmt = $db->prepare('DELETE FROM `todos` WHERE todo_id=?');
    if($stmt->execute([$todoId])){
        $response = ['response' => 'success', 'message' => 'Todo successfully deleted'];
    }

    echo json_encode($response);

}