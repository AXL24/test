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


<style>
    *{
        margin: auto;
    }
    </style>

<body>
<a href="them.php" style='font-size: 30px;'> add new user</a><br>
<br>

<form action="search-user.php" method="get">
<div class="search-box">
        <input type="text"  name="search"  placeholder='start typing'>
        <div class="result"></div>
    </div>

<input type='submit' value='submit' />
</form>

<table style="border: 2px solid ; ">
    <tr >
        <th>ID </th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Role</th>
        <th>Options</th>
    </tr>
    </html>
<?php
 
    require "connect.php";
    $sql ="SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($result)) {
        $ugid = $row['usergroup_id'] ;
        $role =mysqli_query($conn , "SELECT * FROM usergroup WHERE usergroup_id = '$ugid'");
        $rtitle= mysqli_fetch_assoc($role);

        echo "
        <tr>
        <td>$row[user_id]</td>
        <td>$row[user_name]</td>
        <td>$row[email]</td>
        <td>$row[password]</td>
        <td>$rtitle[title]</td>
        <td>
        <a href='sua.php?user_id=$row[user_id]'> edit </a>
        <a href='xoa.php?user_id=$row[user_id]' onclick='return confirm('Are you sure you want to delete this item?');'> delete </a>
        </td>
        </tr>
        ";
    }
    ?>
</table>
</body>