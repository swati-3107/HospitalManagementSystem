<?php
include('../config.php');
if(isset($_POST['action']))
{
    switch($_POST['action'])
    {
        case 'updateStatus':
            $post = mysqli_escape_array($db,$_POST);
            extract($post);
             $sql  = "update `store_intent` set status=\"$status\" WHERE id=$intentid";

            if(mysqli_query($db,$sql))
            {
                echo "Status Updated";
            }else{
               echo "Status cant update.Please refresh your page and trya again.";
            }
            
            
            
            break;
        
        
        
        
    }
}

