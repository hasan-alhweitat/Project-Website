<?php
if(isset($_POST['submit'])){
    $user=$_POST['user'];
    $pass=$_POST['password'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_login="db1";
  // Create connection
  $conn =  mysqli_connect($servername, $username, $password, $db_login);
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  else{
  echo "Connected successfully";
  }
  /*
  // Create database
  $sql = "CREATE DATABASE db1";
  if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
  } else {
  echo "Error creating database: " . $conn->error;
  }

  
// sql to create table
$sql = "CREATE TABLE newuser (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email varchar(50) not null,
    number int (20) not null
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table user created successfully";
    } 
    else {
      echo "Error creating table: " . $conn->error;
    }
  */

session_start();
$qu="select * from newuser where username='$user' and password='$pass'";
  $result=mysqli_query($conn,$qu);
  $count=mysqli_num_rows($result);
  if($count==0){
    echo"<script> alert('تاكد من اسم المستخدم والرقم السري'); </script>";
  }
  else{
    $_SESSION["$user"]; //=userId from database
    echo"<script> alert('اهلا وسهلا'); </script>";
    echo" <script> window.location.href='index.php';</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="stylesignin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
</head>
<body>
    <div class="grid-container">
        <div class="my-store">
            <h1><i class="fas fa-store"></i>  My Store</h1>
        </div>
        <div class="sgin">
            <form action="" method="post">
                <h2>Sign In</h2>
                <label for="username"></label>
                <input type="name" id="username" name="user" placeholder="Username" required>

                <label for="password"></label>
                <input type="password" id="password" name="password" placeholder="Password" required>

                <input  type="submit" class="submit" name="submit" value="Sign In" /> 
            </form>
        </div>
        <div class="create">
            <li> New to pearson?  <a href="signup.php"> create an account </a> <i class="fas fa-user-plus"></i></li>
            <li> Login as <a href="index.php"> Guest  </a> </li>
        </div>
        <div class="logout">
                <li><a href="#">logout </a> <i class="fas fa-sign-out-alt"></i></li>
        </div>
    </div>
</body>
</html>