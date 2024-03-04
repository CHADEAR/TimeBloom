<?php
  // Establish database connection
            $servername = "sql313.infinityfree.com";
            $username = "if0_36085009";
            $password = "ctSPxpUZXtW";
            $dbname = "if0_36085009_todolist";
            $conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลที่ส่งมาจากคำขอ POST
$task_name = $_POST['task'];

// เพิ่มงานลงในฐานข้อมูล
$sql = "INSERT INTO tasks (task_name, completed) VALUES ('$task_name', 0)";

if ($conn->query($sql) === TRUE) {
    echo "New task added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
