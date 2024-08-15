<html>
    <style>
        

  
        *{
            
        }


        </style>
 

    </html>
<?php
require "connect.php";
$uid = $_GET['user_id'];
$feedback= $_GET['feedback_content'];

$sql = "INSERT INTO feedback (user_id, feedback_content) VALUES ('$uid', '$feedback')";


session_start();
if(!isset($_SESSION['user_name'])){
    ?>
    <html><script>alert("Bạn cần đăng nhập trước khi gửi feedback");
            window.location="http://localhost/FINAL/web/login.php";
</script></html>
    <?php
}


if ( isset($_SESSION['usergroup_id']) && $_SESSION['usergroup_id'] === '1' ){
    ?>
    <html><script>alert("Tài khoản của bạn k có quyền thực hiện thao tác này. Vui lòng liên hệ cho admin để được cấp quyền");
            window.location="http://localhost/FINAL/web/playground.php";
</script></html>
    <?php

}

if(mysqli_query($conn, $sql)==TRUE)
{
    
    ?>
    <html><script>alert("Thank you for the support");
            window.location="http://localhost/FINAL/web/playground.php";
</script></html>
    <?php
    
}
else 
{
    echo "error : " .sql ."<br>"
    .$conn->error;

}

$conn->close();
?>