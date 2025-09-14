# TimeBlooming – Local Setup Guide

This project is built with **PHP + HTML + CSS** and designed to run locally using **XAMPP**.

---

## 🔹 Prerequisites
- Install [XAMPP](https://www.apachefriends.org/download.html)  
- Make sure **Apache** is running from XAMPP Control Panel  

---

## 🔹 Important: Disable Login Check
By default, the code checks for a session variable (`$_SESSION['user_login']`) and redirects to `login-register.php`.  
To run the project without login, **comment out these lines** at the very top of `index1.php, index2.php, index3.php`:

```php
<!-- <?php
    session_start();
    if (!isset($_SESSION['user_login'])) {
      header("location: login-register.php");
    }
    $soundPath = "./sound/";
?> -->

```

## How to run

1. Copy the entire project folder (timebloom/) into: C:\xampp\htdocs\

2. Start Apache in XAMPP Control Panel

3. Open your browser and go to: http://localhost/timebloom/index1.php
