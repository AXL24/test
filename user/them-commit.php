
<head>
    <style>
body{
    background-color: black !important;
        padding: 150px;
        margin: 150px;

}
</style>

<link href="playground.css" rel="stylesheet" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
require "connect.php";
$name = $_GET['user_name'];
$email= $_GET['email'];
$password=$_GET['password'];
$group = $_GET['usergroup_id'];



$check_exist = mysqli_query($conn, "SELECT user_name FROM user WHERE user_name = '$name' ");

if (mysqli_num_rows($check_exist) >0 ){
    ?>
        <html><script>alert("Tên người dùng đã tồn tại  !");
                window.location="FINAL/web/playground.php";
    </script></html>
        <?php
        exit;
}

else{
     $sql = "INSERT INTO user (user_name, email, password, usergroup_id) VALUES ('$name', '$email', '$password' ,'$group' )";
     ($conn->query($sql)==TRUE);
    

    echo "New user added successfully";
    ?>
   
    <?php
    
}



$conn->close();
?>
</body>