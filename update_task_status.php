<?php
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todolist_db";
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลที่ส่งมาจากคำขอ POST
$task_id = $_POST['id'];
$completed = $_POST['completed'];

// อัปเดตสถานะของงานในฐานข้อมูล
$sql = "UPDATE tasks SET completed=$completed WHERE id=$task_id";

if ($conn->query($sql) === TRUE) {
    echo "Task status updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
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
$task_id = $_POST['id'];
$completed = $_POST['completed'];

// อัปเดตสถานะของงานในฐานข้อมูล
$sql = "UPDATE tasks SET completed=$completed WHERE id=$task_id";

if ($conn->query($sql) === TRUE) {
    echo "Task status updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<?php
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todolist_db";
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลที่ส่งมาจากคำขอ POST
$task_id = $_POST['id'];
$completed = $_POST['completed'];

// อัปเดตสถานะของงานในฐานข้อมูล
$sql = "UPDATE tasks SET completed=$completed WHERE id=$task_id";

if ($conn->query($sql) === TRUE) {
    echo "Task status updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
