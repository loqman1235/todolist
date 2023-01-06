<?php 

require_once 'db.php';




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link
      href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/app.js" defer></script>
</head>
<body>
    <div class="todo_container">
        <div class="todo_header">
            <h2>Todo App</h2>
        </div>
        <div class="todo_body">
        
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="todo_form">
                <input type="text" name="todoInp" id="todoInp" placeholder="Enter a todo here...">
                <button type="submit" class="todo_btn">Add Todo</button>
            </form>
            <ul class="todos_list">
            </ul>
        </div>
    </div>

    
<div class="modal_backdrop">
    <div class="modal">
        <div class="modal_header">
            <h2>Edit Todo</h2>
        </div>
        <div class="modal_body">
            <input type="text" id="editInp">
        </div>
        <div class="modal_footer">
            <button id="closeModalBtn" class="btn_cancel">Cancel</button>
            <button type="submit" class="btn_edit" id="editBtn">Edit</button>
        </div>
    </div>
</div>

</body>
</html>