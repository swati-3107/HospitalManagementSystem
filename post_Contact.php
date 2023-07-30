<?php include("admin/config.php")?>
<?php 

//  $conn = mysqli_connect('localhost','root','','drmayurakale');


 $name = $_POST['name'];
 $email = $_POST['email'];
 $mobile = $_POST['mobile'];
 $subject = $_POST['subject'];
 $message = $_POST['text'];


 $insert = "INSERT INTO `contact`(`name`,`email`,`mobile`,`subject`,`text`)values('$name','$email','$mobile','$subject','$message')";

 $sql = mysqli_query($db,$insert);

 if($sql)
 {
   $_SESSION['status'] = "Thank you we will connect u soon.... !";
   header('location:dr-maryura-kale-Contact.php');
 }
 else{
   $_SESSION['status'] = "Try Again!";
   header('location:dr-maryura-kale-Contact.php');
 
 }
