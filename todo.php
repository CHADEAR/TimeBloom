<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-size: 16.5px;
            background-color: rgb(234, 255, 255);
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);        
           

        }

        h1 {
            text-align: center;
        }

        .input-container {
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .btnadd{
            background-color: #0056b3;
        }

        .btnclear{
            background-color: #fd464a;
            position: relative;
            margin-left: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .completed {
            text-decoration: line-through;
        }

        .top{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
        }

        .goback{
            position:relative;
            top: 45%;
            left: 45%;
            transform: translate(-50%, 300%);
            padding: 10px 20px;
        }

        @media screen and (min-width: 767px){
            .btnclear{
            background-color: #fd464a;
            position: relative;
            margin-left: 45px;
        }
            button{
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
           }
    }

       
        @media screen and (max-width: 767px){
            .input-container {
            width: 100%;
        }
           button{
            padding: 5px 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
           }
           .top button{
            padding: 2px 10px;
            height: 30px;
        }
           .container {
            max-width: 75%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 
        }
 
        
    }

    </style>
</head>
<body>
    <div class="container">
        <h1>Todolist</h1>
        <div class="input-container">
            <div class="top">
            <input type="text" id="taskInput" name="taskInput" placeholder="Enter task...">
            <button onclick="addTask()" class="btn add">Add</button>
            
            
            </div>
        </div>
        <button onclick="clearAll()" class="btnclear" >Clear All</button>
        <ul id="taskList">
            <?php
            // Establish database connection
            $servername = "sql313.infinityfree.com";
            $username = "if0_36085009";
            $password = "ctSPxpUZXtW";
            $dbname = "if0_36085009_todolist";
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch tasks from database
            $sql = "SELECT * FROM tasks";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $task_name = $row["task_name"];
                    $completed = $row["completed"] ? "completed" : "";
                    echo "<li class='$completed' data-id='{$row['id']}'><input type='checkbox' onchange='toggleTask(this)'>$task_name</li>";
                }
            } else {
                echo "";
            }
            $conn->close();
            ?>
        </ul>
       <button class="goback">back</button>
    </div>

    <script>
        document.querySelector(".goback").addEventListener("click", function() {
            window.location.href = "index1.php";
        });    

        function addTask() {
            var input = document.getElementById("taskInput");
            var task = input.value.trim();
            if (task === "") return;

            var listItem = document.createElement("li");
            listItem.textContent = task;

            var checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.onchange = function() {
                toggleTask(this);
            };

            listItem.prepend(checkbox);
            document.getElementById("taskList").appendChild(listItem);

            saveTask(task);
            input.value = "";
        }

        function toggleTask(checkbox) {
            var listItem = checkbox.parentNode;
            if (checkbox.checked) {
                listItem.classList.add("completed");
            } else {
                listItem.classList.remove("completed");
            }
            updateTaskStatus(listItem.dataset.id, checkbox.checked);
        }

        function clearAll() {
            var taskList = document.getElementById("taskList");
            taskList.innerHTML = "";
            deleteAllTasks();
        }

        function saveTask(task) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "save_task.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("task=" + encodeURIComponent(task));
        }

        function updateTaskStatus(taskId, completed) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_task_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("id=" + encodeURIComponent(taskId) + "&completed=" + (completed ? 1 : 0));
        }

        function deleteAllTasks() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_all_tasks.php", true);
            xhr.send();
        }
    </script>
</body>
</html>
