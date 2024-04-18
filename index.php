<?php
$delete=false;
session_start();
include 'connection.php';

if(isset($_POST['login'])){
    $email=test_input($_POST['email']);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['emailLogErr']= "Invalid Email Format";
    }
    $password=test_input($_POST['password']);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $_SESSION['passErr']= 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }

    $email=mysqli_real_escape_string($con,$email);
    $password=mysqli_real_escape_string($con,$password);

    if(!$_SESSION['emailLogErr'] && !$_SESSION['passErr']){
        $query="SELECT * FROM `admin` WHERE `EMAIL`=? AND `PASSWORD`=?";

        if($stmt=mysqli_prepare($con,$query)){
            mysqli_stmt_bind_param($stmt,"ss",$email,$password);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt)==1){
                $_SESSION['AdminLoginId']=$email;
                header("location: admin.php");
            }else{
                echo "<script>alert('Invalid username or password')</script>";
            }
            mysqli_stmt_close($stmt);
        }else{
            echo "<script>alert('Sql query not prepared.')</script>";
        }
        
    }else{
      $_SESSION['logStatus']='Invalid username or password';
       header('location: latestJobs.php');
    }
}

if(isset($_GET['delete'])){
    $srno= $_GET['delete'];
    $delete=true;
    $query="DELETE FROM `srdata` WHERE `srdata`.`Sr_No` = '$srno'";
    $run=mysqli_query($con,$query);
     if($run){
            $_SESSION['delstatus']='Comment has been deleted.';
            header('location: admin.php');
        }else{
            echo 'Some error occurred';
        }
}

function test_input($data){
    $data= trim($data);
    $data= stripslashes($data);
    $data= htmlspecialchars($data);
    return $data;
}
if(isset($_POST['submit'])){
    if(isset($_POST['srnoEdit'])){
        $srno=$_POST['srnoEdit'];
        $name=$_POST['nameEdit'];
        $email=$_POST['emailEdit'];
        $phone=$_POST['phoneEdit'];
        $city=$_POST['cityEdit'];
        $comment=$_POST['commentEdit'];
    
        $query="UPDATE `srdata` SET `NAME` = '$name', `EMAIL` = '$email', `PHONE` = '$phone', `CITY` = '$city', `COMMENT` = '$comment' WHERE `srdata`.`Sr_No` = '$srno';";
        $run=mysqli_query($con,$query);
        if($run){
            $_SESSION['updateStatus']='Your comment has been updated successfuly';
            header('location: admin.php');
        }else{
            echo 'Some error occurred';
        }
    }else{
    $name= test_input($_POST['name']);
    if(!preg_match("/^[a-zA-Z ]*$/",$name)){
        $_SESSION['nameErr']= "Only letters and white space Allowed.";
    }
    $email=test_input($_POST['email']);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['emailErr']= "Invalid Email Format";
    }
    $phone=test_input($_POST['phone']);
    if (!preg_match ("/^[6-9]{1}[0-9]{9}+$/", $phone) ){  
        $_SESSION['phoneErr']= "Mobile number is incorrect.";  
    }
    $city=$_POST['city'];
    $comment=$_POST['comment'];

    if(!$_SESSION['nameErr'] && !$_SESSION['emailErr'] && !$_SESSION['phoneErr']){
    $query="insert into srdata(NAME,EMAIL,PHONE,CITY,COMMENT) VALUES ('$name','$email','$phone','$city','$comment')";
    $run=mysqli_query($con,$query);
    if($run){
        $_SESSION['status']='Your comment has been submitted successfuly';
        header('location: latestJobs.php');
    }else{
        echo 'Some error occurred';
    }
 }else{
    $_SESSION['failed']='Form not submitted!';
    header('location: latestJobs.php#form');
  }
 }
}
?>