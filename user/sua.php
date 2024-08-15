<head>
<style>
    body{
        background-color: black !important;
        padding: 150px;
        margin: 150px
    }
    form{
       padding:10px;
       border: 3px solid orange;
        
    }
    h1{
        color: white !important;
        display:flex;
        justify-content: center;
       
        
    }
   
    </style>

<link href="playground.css" rel="stylesheet" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<?php
require "connect.php";


$uid = $_GET["user_id"];

$select= "SELECT * FROM user WHERE user_id=$uid";

$result = mysqli_query($conn, $select);

$selected_row = mysqli_fetch_assoc($result);

?>
<body>
    <h1> Cập nhật thông tin</h1>
    <div style='display:flex; justify-content: center; margin:90px; '>
   
<form action="sua_commit.php" method="POST">
<input type="hidden"  name="user_id" value="<?php echo $uid ?>">
Name
<input type="text"  name="user_name" value="<?php echo $selected_row["user_name"] ?>"> <br>
Email
<input type="text"  name="email" value="<?php echo $selected_row["email"] ?>"><br>
Password
<input type="text"  name="password" value="<?php echo $selected_row["password"] ?>"><br>



<input type="submit" value="Update" class="btn btn-success"  style='margin-left: 130px;'><br>

</form>
</div>
</body>
