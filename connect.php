<?php

$objCon = mysqli_connect("sql313.infinityfree.com", "if0_36085009", "ctSPxpUZXtW","if0_36085009_users");

if ($objCon -> connect_errno){
    echo "Failed " . $objCon -> connect_error;
    exit();
}
else
echo "connect success";
?>