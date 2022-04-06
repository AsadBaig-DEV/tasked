<?php

include "db_conn.php";
$response = array();
if(isset($_POST['delete']) && $_POST['delete'] == '1') {

  $sql = "Delete FROM task_details WHERE id=".$_POST['id'];
  $result = mysqli_query($conn, $sql);

  if($result){
    $response['result'] = true;
  }
  else{
    $response['result'] = false;
  }
  echo json_encode($response);
  

}

if(isset($_POST['edit']) && $_POST['edit'] == '1') {

  $sql = "SELECT * FROM task_details WHERE id=".$_POST['id'];
  $result = mysqli_query($conn, $sql);
  $data_result = mysqli_fetch_assoc($result);
  //var_dump($data_result);

  if(!empty($result)){
    echo json_encode($data_result);

    //var_dump($result);

   // $response['result'] = true;
  }
  else{
    $response['result'] = false;
    echo json_encode($response);
  }
// echo json_encode($response);
  

}

