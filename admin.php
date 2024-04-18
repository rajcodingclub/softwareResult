<?php 
session_start(); 
if(!isset($_SESSION['AdminLoginId'])){
    header('location: latestJobs.php');
}
if(isset($_POST['logout'])){
  session_destroy();
  header('location: latestJobs.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
  <style>
    .panel {
      width: 100%;
      height: 80px;
      color: white;
      background-color: rgb(7, 7, 107);
      display: flex;
      align-items: center; 
      justify-content: space-around;
    }
  </style>
  <title>Admin Panel</title>
</head>

<body>

  <div class="panel">
    <h2>Admin Panel- <?php echo $_SESSION['AdminLoginId']; ?></h2>
    <form method="post">
    <button type="submit" class="btn btn-light" name="logout">Log Out</button>
    </form>
  </div>

  <?php
        
        if(isset($_SESSION['updateStatus'])) { ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong>
    <?php echo $_SESSION['updateStatus']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php } unset($_SESSION['updateStatus']);  ?>

  <?php
        
        if(isset($_SESSION['delstatus'])) { ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Delete!</strong>
    <?php echo $_SESSION['delstatus']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php } unset($_SESSION['delstatus']); ?>



  <!--Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModalLabel">Edit Comment</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="index.php?update=true">
            <input type="hidden" name="srnoEdit" id="srnoEdit">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Name</label>
              <input type="text" class="form-control" id="nameEdit" name="nameEdit" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input type="emai" class="form-control" id="emailEdit" name="emailEdit" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Phone</label>
              <input type="phone" class="form-control" id="phoneEdit" name="phoneEdit" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">City</label>
              <input type="text" class="form-control" id="cityEdit" name="cityEdit" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
              <textarea class="form-control" id="commentEdit" rows="3" name="commentEdit"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <table class="table" id="myTable">
    <thead>
      <tr>
        <th scope="col">Sr_No</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">City</th>
        <th scope="col">Comment</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <div class="container my-3">
        <?php
               include 'connection.php';
               $query="select * from srdata";
               $result=mysqli_query($con,$query);
               $srno=0;
               while($row= mysqli_fetch_assoc($result)){
                $srno=$srno+1;
               echo "<tr>
               <th scope='row'>" .$srno. "</th>
               <td>" .$row['NAME']. "</td>
               <td>" .$row['EMAIL']. "</td>
               <td>" .$row['PHONE']. "</td>
               <td>" .$row['CITY']. "</td>
               <td>" .$row['COMMENT']. "</td>
               <td><button type='button' class='edit btn btn-primary' id=".$row['Sr_No']." >Edit</button> <button type='button' class='delete btn btn-danger' id=d".$row['Sr_No']." >Delete</button></td>
               </tr>";
              
               }
            ?>
      </div>
    </tbody>

  </table>
  <hr>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>

  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit",);
        tr = e.target.parentNode.parentNode;
        NAME = tr.getElementsByTagName("td")[0].innerText;
        EMAIL = tr.getElementsByTagName("td")[1].innerText;
        PHONE = tr.getElementsByTagName("td")[2].innerText;
        CITY = tr.getElementsByTagName("td")[3].innerText;
        COMMENT = tr.getElementsByTagName("td")[4].innerText;
        console.log(NAME, EMAIL, PHONE, CITY, COMMENT);
        nameEdit.value = NAME;
        emailEdit.value = EMAIL;
        phoneEdit.value = PHONE;
        cityEdit.value = CITY;
        commentEdit.value = COMMENT;
        srnoEdit.value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("delete",);
        srno = e.target.id.substr(1,);

        if (confirm("Do you want to delete this comment!")) {
          console.log("Yes");
          window.location = `index.php?delete=${srno}`;
        } else {
          console.log("No");
        }
      })
    })
  </script>
</body>

</html>