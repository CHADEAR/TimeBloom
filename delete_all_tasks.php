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

// ลบงานทั้งหมดในฐานข้อมูล
$sql = "DELETE FROM tasks";

if ($conn->query($sql) === TRUE) {
    echo "All tasks deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
