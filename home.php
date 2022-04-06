<?php
session_start();
include "db_conn.php";
var_dump($_SESSION);
// SQL query to select data from database
if($_SESSION['user-role'] == 'admin'){
  $sql = "SELECT * FROM task_details";
}
else {
  $sql = 'SELECT * FROM task_details WHERE `assigned_to`="'.$_SESSION['db_username'].'"';
}
var_dump($sql);
$result = mysqli_query($conn, $sql);

if(isset($_SESSION['id']) && isset($_SESSION['db_username'])) {
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Home Page</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
      <h1>Hello, <?php echo $_SESSION['db_username'] ?></h1>
      <a href="logout.php" class="logout-btn">Logout</a>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Task #</th>
            <th scope="col">Task Name</th>
            <th scope="col">Task Detail</th>
            <th scope="col">Assigned by</th>
            <th scope="col">Assigned To</th>
            <th scope="col">Task Status</th>
            <th scope="col">Task Due date</th>
            <th scope="col">Edit Task</th>
            <th scope="col">Delete Task</th>
          </tr>
        </thead>
        <tbody>
        <?php while($rows=mysqli_fetch_assoc($result)) { 
          var_dump($rows);?>
          <tr>
            <th scope="row"><?php echo $rows['id'];?></th>
            <td><?php echo $rows['task_name'];?></td>
            <td><?php echo $rows['task_detail'];?></td>
            <td><?php echo $rows['assigned_by'];?></td>
            <td><?php echo $rows['assigned_to'];?></td>
            <td><?php echo $rows['task_status'];?></td>
            <td><?php echo $rows['due_date'];?></td>
            <td class="text-center"><a class="edit-btn text-primary" data-id="<?php echo $rows['id']; ?>" type= "button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit"></i></a></td>
            <td class="text-center"><a class="delete-btn text-danger" data-id="<?php echo $rows['id']; ?>" type="button"><i class="fas fa-trash-alt"></i></a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="row">
        <a href="" type="button" class="btn btn-primary add-new" style="width:90%; margin-inline: auto;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Task</a>
      </div>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Task Editor</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
            <form class="row g-3">
              <div class="col-md-6">
                <label for="task-name" class="form-label">Task Name</label>
                <input type="text" class="form-control" id="task-name">
              </div>
              <div class="col-md-6">
                <label for="assigned-to" class="form-label">Assigned To</label>
                <input type="text" class="form-control" id="assigned-to">
              </div>
              <div class="col-12">
                <label for="task-detail" class="form-label">Task Details</label>
                <input type="text-box" class="form-control" id="task-detail">
              </div>
              <div class="col-md-6">
                <label for="assigned-by" class="form-label">Assigned By</label>
                <input type="text" class="form-control" id="assigned-by">
              </div>
              <div class="col-md-6">
                <label for="task-status" class="form-label">Task Status</label>
                <select id="task-status" class="form-select">
                  <option selected>Choose...</option>
                  <option>Done</option>
                  <option>Pending</option>
                  <option>Ongoing</option>
                  <option>Cancelled</option>
                </select>
              </div>
              <div class="col-12">
                <label for="task-date" class="form-label">Task Details</label>
                <input type="date" class="form-control" id="task-date" min="<?= date('Y-m-d'); ?>">
              </div>
            </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <script src="script.js" async defer></script>
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
    <script>
      $(document).ready(function(){
        $(".delete-btn").click(function(){
         //var data = [];
         var test_temp = $(this).data("id");
          $.ajax({
              url: "ajax.php",
              type: "POST",
              data: {id : test_temp, delete:1} ,
            }).done(function(data) {
              let res = JSON.parse(data);
              console.log(res);
              if(res.result == true){
                location.reload();
              }else{
                console.log(res);
              }
          });
        });

        $(".add-new").click(function(){
        
          $('#task-name').val('');
          $('#assigned-to').val('');
          $('#task-detail').val('');
          $('#assigned-by').val('');
          $('#task-status').val('');
          $('#task-date').val('');

        });

        // $(".logout-btn").click(function(e){
        //   e.preventDefault();
        //   $.ajax({
        //       url: "logout.php",
        //       type: "POST",
        //     }).done(function() {
        //       location.reload();
        //     });
          

        // });

        $(".edit-btn").click(function(){
         var edit_temp = $(this).data("id");
          $('#task-name').val('');
          $('#assigned-to').val('');
          $('#task-detail').val('');
          $('#assigned-by').val('');
          $('#task-status').val('');
          $('#task-date').val('');

          $.ajax({
              url: "ajax.php",
              type: "POST",
              data: {id : edit_temp, edit:1} ,
            }).done(function(data) {
              let res = JSON.parse(data);
              //console.log(res);
              if(res.id !== ""){
                $('#task-name').val(res.task_name);
                $('#assigned-to').val(res.assigned_to);
                $('#task-detail').val(res.task_detail);
                $('#assigned-by').val(res.assigned_by);
                $('#task-status').val(res.task_status);
                $('#task-date').val(res.due_date);
                console.log(res);
              }else{
                console.log(res);
              }
          });
        });

      });
    </script>
  </html>
  <?php
}
else{
  header("location: index.php");
  exit();
}
?>