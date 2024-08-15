<?php
$uid = $_GET["user_id"];
require "connect.php";
$del= "DELETE FROM user WHERE user_id=$uid";

mysqli_query($conn, $del);
if(mysqli_query($conn, $del)==TRUE)
{
    
    ?>
    <html><script>alert("Xóa thành công");
            window.location="manage.php";
</script></html>
    <?php
    
}
?>
<html>
    <a href="manage.php"> quay lai </a>
    </html>

