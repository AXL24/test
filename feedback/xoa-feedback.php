<?php
$fid = $_GET["feedback_id"];
require "connect.php";
$del= "DELETE FROM feedback WHERE feedback_id=$fid";

mysqli_query($conn, $del);
if(mysqli_query($conn, $del)==TRUE)
{
    
    ?>
    <html><script>alert("Xóa thành công");
            window.location="view_feedback.php";
</script></html>
    <?php
    
}
?>
<html>
    <a href="feedback.php"> quay lai </a>
    </html>

