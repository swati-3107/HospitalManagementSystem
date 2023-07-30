<?php
if(isset($_POST['action']) && $_POST['action']!="")
{
    include("../config.php");
    $action = addslashes(htmlspecialchars($_POST['action']));
    $post =  mysqli_escape_array($db,$_POST);
    extract($post);
    
    if(isset($table))
    {
        switch($table)
        {
            case "world_countries":
                $id_column = "id";
                break;
           case "world_state":
                $id_column = "state_id";
                break;
            default:
                $id_column='id';
        }
        
    }
    switch($action)
    {
        case "add":
           
           
           $sql  = "INSERT INTO `$table` (`id`, `country_code`, `country_name`) VALUES (NULL, \"$code\", \"$name\")";
           
           if(mysqli_query($db,$sql))
           {
            echo "New country added";
           }

           break;
         
        
        
        
        
         case "addState":
           
           
$sql  = "INSERT INTO `world_state`
(`state_id`, `state_name`, `country_id`) VALUES
(NULL, \"$state_name\", \"$country_id\")";
           if(mysqli_query($db,$sql))
           {
            echo "New State added";
           }

           break;
        
         case "addDist":
           
           

$sql  = "INSERT INTO `world_districts`
(`id`, `district_name`, `state_id`) VALUES
(NULL, \"$district_name\", \"$state_id\")";

           if(mysqli_query($db,$sql))
           {
            echo "New District added";
           }

           break;
        
         case "addTaluka":
           
           

$sql  = "INSERT INTO `world_taluka`
(`id`, `taluka_name`, `taluka_pincode`, `dist_id`) VALUES
(NULL, \"$taluka_name\", \"$pincode\", \"$district_id\")";

           if(mysqli_query($db,$sql))
           {
            echo "New Taluka added";
           }

           break;
           case "addVillage":
           
           

$sql  = "INSERT INTO `world_village`
(`id`, `village_name`, `village_pin_code`, `taluka_id`)
VALUES (NULL, \"$village_name\", \"$village_pin_code\", \"$taluka_id\")";

           if(mysqli_query($db,$sql))
           {
            echo "New Village added";
           }

           break;
        case "update":
            
           
            $sql  = "update $table set $column = \"$value\" where $id_column=".(int)$cid;
           
           if(mysqli_query($db,$sql))
           {
            $column = ucfirst(str_replace("_",' ',$column));
            echo "$column Updated";
           }
             break;
            
            case "delete":
            
           
           $sql  = "delete from $table where $id_column=".(int)$cid;
           
           if(mysqli_query($db,$sql))
           {
            
            echo "country Deleted";
           }
             break;
            
            case "fetchStates":
            $sql  = "SELECT * FROM `world_state` WHERE country_id=\"$country_id\"";
            $data = mysqli_query($db,$sql);
            
            $num = mysqli_num_rows($data);
            
            if($num>0)
            {
                ?>
                    <option value="">Choose State</option>

                <?php
             for($i = 1;$i<=$num;$i++)
             {
                $row = mysqli_fetch_assoc($data);
                extract($row);
                /* 	state_id 	state_name 	country_id    */
                ?>
                        <option value="<?=$state_id?>"><?=$state_name?></option>
                <?php
             }
            }
            
            
            break;
                        
            case "fetchDistricts":
            $sql  = "SELECT * FROM `world_districts` WHERE state_id=\"$state_id\"";
            $data = mysqli_query($db,$sql);
            
            $num = mysqli_num_rows($data);
            
            if($num>0)
            {
                ?>
                    <option value="">Choose District</option>

                <?php
             for($i = 1;$i<=$num;$i++)
             {
                $row = mysqli_fetch_assoc($data);
                extract($row);
                /* 	id 	district_name 	state_id   */
                ?>
                        <option value="<?=$id?>"><?=$district_name?></option>
                <?php
             }
            }
            
            
            break;
            
            
            case "fetchTalukas":
            $sql  = "SELECT * FROM `world_taluka` WHERE dist_id=\"$district_id\"";
            $data = mysqli_query($db,$sql);
            
            $num = mysqli_num_rows($data);
            
            if($num>0)
            {
                ?>
                    <option value="">Choose Taluka</option>
                <?php
             for($i = 1;$i<=$num;$i++)
             {
                $row = mysqli_fetch_assoc($data);
                extract($row);
                /* 	 id 	taluka_name 	taluka_pincode 	dist_id   */
                ?>
                 <option value="<?=$id?>"><?=$taluka_name?></option>
                <?php
             }
            }
            
            
            break;
            
            case "fetchVillages":
            $sql  = "SELECT * FROM `world_village` WHERE taluka_id=\"$taluka_id\"";
            $data = mysqli_query($db,$sql);
            
            $num = mysqli_num_rows($data);
            
            if($num>0)
            {
                ?>
                <?php
             for($i = 1;$i<=$num;$i++)
             {
                $row = mysqli_fetch_assoc($data);
                extract($row);
                /* 	id 	village_name 	village_pin_code 	taluka_id    */
                ?>
                 <label class="checkbox-inline">
                    <input type="checkbox" value="<?=$id?>" name="work_village[]"> &nbsp;&nbsp;<?=$village_name?>
                 </label>
                <?php
             }
            }
            
            
            break;
            case "fetchVillagesSelect":
            $sql  = "SELECT * FROM `world_village` WHERE taluka_id=\"$taluka_id\"";
            $data = mysqli_query($db,$sql);
            
            $num = mysqli_num_rows($data);
            
            if($num>0)
            {
                ?>
                 <option value="">Choose Section/Village</option>
                <?php
             for($i = 1;$i<=$num;$i++)
             {
                $row = mysqli_fetch_assoc($data);
                extract($row);
                /* 	id 	village_name 	village_pin_code 	taluka_id    */
                ?>
                <option value="<?=$id?>"><?=$village_name?></option>
                <?php
             }
            }
            
            
            break;
        
    
        
        
        
        
        
        
        
       
    }
    
    
    
    
    
    
    
    
    
    
    
}else{
    echo "direct access not allowed.";
}


