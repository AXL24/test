<style>
    body {
        background-color: black !important;
        margin: auto;
    }
    th{
        padding:12px;
        color: red;
    }
    td{
        padding:10px;
    }
    tr{
        border-bottom: 2px teal solid !important;
    }
    form{
        float:left;
    }
   table{
    margin-top: 100px;
   }
    </style>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link href="playground.css" rel="stylesheet" >
<script>



</script>

<style>
    *{
        margin: auto;
    }
    </style>

<body>
<br>
<br>

<form action="search-user.php" method="get">
<div class="search-box">
        <input type="text" autocomplete="off" name="search"  placeholder='start typing'>
        <div class="result"></div>
    </div>

<input type='submit' value='submit' />
</form>
<h1> feedback and reply result</h1>
<table style="border: 2px solid ; ">
    <tr >
        <th>Feedback ID </th>
        <th>Username</th>
        <th>Feedback content</th>
        <th>Reply content</th>
        
        <th>Admin ID</th>
        <th>Reply ID</th>
    </tr>
    </html>
<?php
 
    require "connect.php";
    $sql ="SELECT * FROM feedback";
    $result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($result)) {
        $fid = $row['feedback_id'] ;
        $reply =mysqli_query($conn , "SELECT * FROM reply WHERE feedback_id = '$fid'");
        $reply_data= mysqli_fetch_assoc($reply);
        $uid = $row['user_id'];
        $user= mysqli_query($conn , "SELECT * FROM user WHERE user_id = '$uid'");
        $user_name = mysqli_fetch_assoc($user);

        echo "
        <tr>
        <td>$row[feedback_id]</td>
        <td>$user_name[user_name]</td>
        <div class='inner'>
        <td >$row[feedback_content]</td>
        </div>
        <td>$reply_data[reply_content]</td>
        <td>$reply_data[user_id]</td>
        <td>$reply_data[reply_id]</td>

        <td>
       
        </tr>
        ";
    }
    ?>
</table>
</body>