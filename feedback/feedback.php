<div class="feedback">
<?php $feedback_id = $data['feedback_id'];
   $uid = $data['user_id'];
  $user = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $uid  ");
  $user_result =mysqli_fetch_assoc($user);
  if ( isset($_SESSION['usergroup_id']) && $_SESSION['usergroup_id'] === '3' ){
  echo" <a style='color:red;' href='xoa-feedback.php?feedback_id=$feedback_id' onclick='return confirm('Are you sure you want to delete this item?');'> delete </a>";
  }
?>
 
  <h4><?php echo $user_result['user_name']; ?></h4> 
  <p style='font-size:10px;'><?php echo $data['created_at']; ?></p>
  <p><?php echo $data['feedback_content']; ?></p>

<?php
  
       if ( isset($_SESSION['usergroup_id']) && $_SESSION['usergroup_id'] === '3' ){
        ?>

  <button class="reply" onclick = "reply(<?php echo $feedback_id; ?>, '<?php echo $user_result['user_name']; ?>');">Reply</button>
  <?php 
  }
  
  $dataz = mysqli_query($conn, "SELECT * FROM reply WHERE feedback_id=$feedback_id "); 
      foreach($dataz as $datax) {
        require 'reply.php';
      }
        ?>
</div>
