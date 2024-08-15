<style>
  i{
   
  color: white !important;'
  }
  </style>


<div class="reply">
  <?php
  $aid = $datax['user_id'];
  $admin = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $aid  ");
  $admin_result =mysqli_fetch_assoc($admin);
  
  
  ?>
  <h4><?php echo $admin_result['user_name']  .' '. "<i>Admin</i>"; ?></h4>
  <p style='font-size:10px;'><?php echo $datax['created_at']; ?></p>
  <p><?php echo $datax['reply_content']; ?></p>
  <?php $reply_id = $datax['reply_id']; ?>
  
  
</div>
