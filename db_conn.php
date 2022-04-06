<?php

  $server_name = "localhost";
  $server_username = "root";
  $server_password ="mysql";

  $db_name = "test_task";

  $conn = mysqli_connect($server_name,$server_username,$server_password,$db_name);

  if(!$conn) {
    echo "connection failed";
  }