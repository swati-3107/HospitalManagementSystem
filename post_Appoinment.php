<?php include("admin/config.php")?>
<?php 

//  $con = mysqli_connect('localhost','root','','drmayurakale');
 

 $name = $_POST['name'];
 $number = $_POST['mobile'];
 $appointment_date = $_POST['appointment_date'];
 $appointment_for = $_POST['appointment_for'];
 $message = $_POST['text'];


 $insert = "INSERT INTO `appointment`(`name`,`mobile`,`appointment_date`,`appointment_for`,`text`) values('$name','$number','$appointment_date','$appointment_for','$message')";

 $sql = mysqli_query($db,$insert);

//  print_r($sql);
if($sql)
{
  $_SESSION['status'] = "Your Appoinment has been submitted successfully!";
  header('location:index.php');
}
else{
  $_SESSION['status'] = "Try Again!";
  header('location:index.php');

}


// if($sql)
//  {
//     echo '<div class="alert alert-success" role="alert">
//     Your apppointment submited sucessfuly!
//   </div>';
//  }
//  else{
//     echo '<div class="alert alert-danger" role="alert">
//     try again
//   </div>';

 
