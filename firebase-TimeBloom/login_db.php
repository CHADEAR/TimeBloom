<?php 

    session_start();
    require_once 'config/db.php';

    if (isset($_POST['login'])) {
        $uname = $_POST['uname'];
        $password = $_POST['password'];

      
        if (empty($uname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อผู้ใช้';
            header("location: login.php");
        } 
        else if (empty($password)) 
        {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: login.php");
        } 
        else 
        {
            try 
            {

                $check_data = $conn->prepare("SELECT * FROM users WHERE uname = :uname");
                $check_data->bindParam(":uname", $uname);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0)
                 {
                    if ($uname == $row['uname'])
                     {
                        if (password_verify($password, $row['password']))
                         {
                                $_SESSION['admin_login'] = $row['id'];
                                header("location: admin.php");
                        } 
                        else 
                        {
                            $_SESSION['error'] = 'รหัสผ่านผิด';
                            header("location: login.php");
                        }
                    } 
                    else 
                    {
                        $_SESSION['error'] = 'ชื่อผู้ใช้ผิด';
                        header("location: login.php");
                    }
                } 
                else 
                {
                    $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                    header("location: login.php");
                }

            } 
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }


?>