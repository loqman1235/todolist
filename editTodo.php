<?php 

require_once 'db.php';


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $todoId = $_POST['todoInputId'];
    $todoName = htmlspecialchars(trim($_POST['todoName']));
    $response = [];

   if(empty($todoName)) {
    $response = ['response' => 'error', 'message' => 'Please enter a todo'];

   } else {
        $stmt = $db->prepare("UPDATE `todos` SET todo_name=? WHERE todo_id=?");
    
        if($stmt->execute([$todoName, $todoId])) {
            $response = ['response' => 'success', 'message' => 'Todo successfully updated'];
        } else {
            $response = ['response' => 'error', 'message' => 'An error has occured'];
        }
   }

    echo json_encode($response);

}