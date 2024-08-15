<head>
<style>
    body {
        background-color: black !important;
        margin: 300px !important;
        padding: 300px !important;
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
</head>
<body>
    <h1>Search result</h1>
<?php
require "connect.php";

$search = $_GET['search'];

$sql = "SELECT * FROM user WHERE user_id LIKE '%$search%' OR user_name LIKE '%$search%' OR email LIKE '%$search%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table style='border: 2px solid ; '>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Usergroup</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $ugid = $row['usergroup_id'] ;
        $role =mysqli_query($conn , "SELECT * FROM usergroup WHERE usergroup_id = '$ugid'");
        $rtitle= mysqli_fetch_assoc($role);

        echo "<tr><td>".$row['user_id']."</td><td>".$row['user_name']."</td><td>".$row['email']."</td><td>".$rtitle['title']."</td><td>
        <a href='sua.php?user_id=$row[user_id]'> edit </a>
        <a href='xoa.php?user_id=$row[user_id]'> delete </a>
        </td></tr>";
    }
    echo "</table>";
} else {
    echo "No data ";
}

$conn->close();
?>
<a href='manage.php'> go back</a>
</body>
