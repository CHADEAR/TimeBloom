<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>loading</title>
<style>
  body {
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background : rgb(208, 233, 235);
    font-family: Arial, sans-serif;
  }

  img{
    width: 150px;
    height: auto;
    animation: slideUp 3s forwards; /* เพิ่ม animation เพื่อให้ภาพเลื่อนขึ้น */
  }
  
  #loading-text {
    font-size: 24px;
    margin-bottom: 20px;
  }
  
  #tap-text {
    display: none;
    font-size: 18px;
    color: rgb(84, 84, 84);
    cursor: pointer;
    position:absolute;
    top: 60%;
    left: 51%;
    transform: translate(-50%, 50%);
  }

  @keyframes slideUp {
    from {
      opacity: 0;
      transform: translateY(50px); /* เลื่อนขึ้น 50px */
    }
    to {
      opacity: 1;
      transform: translateY(0); /* เลื่อนกลับไปตำแหน่งเริ่มต้น */
    }
  }
</style>
</head>
<body>
<div id="loading-text"><img src="./public/app-logo.png" alt=""></div>
<div id="tap-text">Tap screen ...</div>

<script>
  // เมื่อเอกสารโหลดเสร็จ
  document.addEventListener("DOMContentLoaded", function() {
    // ฟังก์ชันสำหรับแสดงข้อความ "Tap screen"
    function showTapText() {
      document.getElementById("tap-text").style.display = "block";
    }

    // เมื่อคลิกที่หน้าจอ
    document.addEventListener("click", function() {
      // ไปที่หน้าถัดไป
      window.location.href = "index1.php";
    });

    // เรียกใช้ฟังก์ชันเพื่อแสดงข้อความ "Tap screen" หลังจากที่โหลดเสร็จ
    setTimeout(showTapText, 3000); // เมื่อโหลดเสร็จ หลังจาก 3 วินาที
  });
</script>
</body>
</html>
