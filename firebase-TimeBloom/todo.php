<?php
    session_start();
    if (!isset($_SESSION['user_login'])) {
      header("location: login-register.php");
    }

?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">  
    <title>Todo List</title>
    <link rel="stylesheet" href="todo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Iconscout Link For Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.4.0/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
    <nav><a href="index.php"><i class='bx bxs-x-circle'></i></a></nav>
    <div class="wrapper">
      <div class="task-input">
        <i class="ri-checkbox-line icon"></i>
        <input type="text" placeholder="Add a new task">
        <button class="add-text">Add</button>
      </div>
      <div class="controls">
        <div class="filters">
          <span class="active" id="all">All</span>
          <span id="pending">Pending</span>
          <span id="completed">Completed</span>
        </div>
        <button class="clear-btn">Clear All</button>
      </div>
      <ul class="task-box"></ul>
    </div>
    <script src="todo.js"></script>
  </body>
</html>