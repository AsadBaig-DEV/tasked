<?php
session_start();
include "db_conn.php";

if(isset($_POST['username']) && isset($_POST['password'])) {

  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}

$uname = validate($_POST['username']);
$pass = validate($_POST['password']);

if(empty($uname)) {
  header("location: index.php?error=Username is required");
  exit();
}
else if(empty($pass)) {
  header("location: index.php?error=Password is required");
  exit();
}

$sql = "SELECT * FROM users WHERE db_username='$uname' AND db_password='$pass'";

$result = mysqli_query($conn, $sql);

if(mysql_nom_rows($result) === 1){
  $row = mysqli_fetch_assoc($result);
  if($row['db_username'] === $uname && $row['db_password'] === $pass){ 
    echo "Logged In!";
    $_SESSION['db_username'] = $row['db_username'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['id'] = $row['id'];
    header("location: home.php");
    exit();
  }
  else{
    header("location: index.php?error=Incorrect Username or Password");
    exit();
  }
}
else{
  header("location: index.php");
  exit();
}