
<?php
require "connect.php";
    $uid = $_POST['user_id'];
    $name = $_POST['user_name'];
    $email= $_POST['email'];
    $password=$_POST['password'];
    $commit = "UPDATE user SET user_name='$name' , email='$email' , password='$password'  WHERE user_id='$uid'";
    if (mysqli_query($conn, $commit)){
        ?>
        <html>
        sua thanh cong 
        <a href="manage.php"> an de kiem tra thong tin</a>
    </html>
    <?php
    }
    ?>
  
    