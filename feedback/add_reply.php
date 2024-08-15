<html>
    <style>
        

  
        *{
            
        }


        </style>
 

    </html>
<?php
require "connect.php";
$admin_id=$_GET['user_id'];
$fid = $_GET['feedback_id'];
$reply= $_GET['reply_content'];

$sql = "INSERT INTO reply (user_id, feedback_id , reply_content) VALUES ('$admin_id', '$fid' ,'$reply')";

if($conn->query($sql)==TRUE)
{
    echo'';
    ?>
    <html><script>alert("Replied !");
            window.location="view_feedback.php";
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