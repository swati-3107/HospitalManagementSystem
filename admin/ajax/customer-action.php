
<?php
include("../config.php");


if(isset($_POST['action']))
{
    switch($_POST['action'])
    {
       
    
        
       
       case 'updateStatus':
          $custtomerid = mysqli_real_escape_string($db,$_POST['custtomerid']);
          $upstatus = mysqli_real_escape_string($db,$_POST['upstatus']);
          
          if(mysqli_query($db,"update oc_customer set status=$upstatus where customer_id =$custtomerid"))
          {
          echo 1;    
          }else{
          echo 0;
      }
        
        
       break;

     
    
    
    }
}


?>