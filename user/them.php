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
    input{
        padding: 5px;
        height : 30px;
        border: 2px solid black;
    }
   
    </style>

<link href="playground.css" rel="stylesheet" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<h1> Tạo lập tài khoản mới</h1>
<body>
    <div style='display:flex; justify-content: center; margin:50px; '>
    
    <form action="them-commit.php" method="GET">
         Tên người dùng
        <input type="text"  name="user_name" style='width: 200px;' required> <br>
        Email 
        <input type="text"  name="email" style='width: 300px;' required><br>
        Mật khẩu
        <input type="text"  name="password" style='width: 180px;' required><br>
        Group       
        <?php
       
        require "connect.php";
     
        $sql = "SELECT * FROM usergroup";
        $result = mysqli_query($conn , $sql);
        
        echo "<select name='usergroup_id'>";
        while($row=mysqli_fetch_assoc($result )){
           echo "<option value='".$row['usergroup_id']."'>".$row['title']."</option>";
        }
        echo"</select>";
        
        ?>
        <br>


    
       <br>
<button type="submit" class="btn btn-success" style='margin-left: 140px;' name="submit"> Insert</button>
       
    </form>
    </div>