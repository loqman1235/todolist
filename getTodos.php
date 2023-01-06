<?php 

require_once 'db.php';
$result = '';



$stmt = $db->query('SELECT * FROM `todos`');
$todos = $stmt->fetchAll();

// Check if rows exist
if(!$todos) {
    $result .= '<p>No todos</p>';

} else{
    foreach($todos as $todo) {
        $result .= '<li>';
        $result .= '<p class="todo_list_text">' . $todo['todo_name'] . '</p>';
        $result .= '<div class="todo_btns">';
        $result .= '<button id="editTodo" class="edit_todo_btn" onclick="updateTodo('.$todo['todo_id'].')"><i class="far fa-edit"></i></button>';
        $result .= '<button class="delete_todo_btn" onclick="deleteTodo('.$todo['todo_id'].')"><i class="far fa-trash-alt"></i></button>';
        $result .= '</div>';
        $result .= '</li>';
    
    }
    
}




echo json_encode($result);