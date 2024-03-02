<?php
    $servername = "sql313.infinityfree.com";
    $username = "if0_36085009";
    $password = "ctSPxpUZXtW";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=if0_36085009_users", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>