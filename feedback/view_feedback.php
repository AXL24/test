<html>
  <head></head>
  <link href="playground.css" rel="stylesheet" >
 
  <style>
    *{
      margin: 0px;
      padding: 0px;
    }
    ::-webkit-scrollbar {
    width: 1px;  
    height: 0;            
  }
    body{
      background: #212523;
    }
    .container{
      background: black;
      width: 700px;
      margin: 0 auto;
      padding-top: 1px;
      padding-bottom: 5px;
    }
    .feedback, .reply{
      margin-top: 5px;
      padding: 10px;
      border-bottom: 1px solid teal;
    }
    .reply{
      border: 0.5px solid grey;
    }
    p{
      margin-top: 5px;
      margin-bottom: 5px;
    }
    form{
      margin: 10px;
    }
    form h3{
      margin-bottom: 5px;
    }
    form input, form textarea{
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
    }
    form button.submit, button{
      background: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      padding: 10px 20px;
      width: 100%;
    }
    button.reply{
      background: black;
      font-color: orange;
       
    }
  </style>
  <body>
    
    <div class="container">
    <form action="search-feedback.php" method="get">
<div class="search-box">
        <input type="text" autocomplete="off" name="search"  placeholder='start typing' style='height: 25px;  border: none; '>
        <div class="result"></div>
    </div>

<input type='submit' value='submit' hidden>
</form>

<?php
session_start();
require 'connect.php';

      $datas = mysqli_query($conn, "SELECT * FROM feedback "); 
      foreach($datas as $data) {
        require 'feedback.php';
      }
      
       if ( isset($_SESSION['usergroup_id']) && $_SESSION['usergroup_id'] === '3' ){
        ?>
      <form action = 'add_reply.php' method = 'get'>
        <h3 id = 'title'>Hãy chọn trước khi ấn submit</h3>
        <input type='hidden' name='feedback_id' id='feedback_id'>
        <input type='hidden' name='user_id' value='<?php echo $_SESSION['user_id'] ; ?>'>
        <textarea name='reply_content' placeholder='Your reply'></textarea>
        <button class = 'submit' type='submit' name='submit'>Submit</button>
      </form> <?php
       }
      ?>
    </div>

    <script>
      function reply(feedback_id, user_name){
        title = document.getElementById('title');
        title.innerHTML = "Replying to " + user_name;
        document.getElementById('feedback_id').value = feedback_id;
        window.scrollTo(0, document.body.scrollHeight);
      }

 
    </script>


    </div>