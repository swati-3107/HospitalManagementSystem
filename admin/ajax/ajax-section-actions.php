<?php
if(isset($_POST['action']) && $_POST['action']!="")
{
     include("../config.php");
        $action = addslashes(htmlspecialchars($_POST['action']));
        $post =  mysqli_escape_array($db,$_POST);
        extract($post);
   switch($action)
   {
      case "allocateSection":
      //Check if section is already allocated
      
      $sql  = "SELECT COUNT(id) as count FROM `sp_executive_work_area`
      WHERE village_id=$village_id AND executive_id=$exec_id";
      
      $data = mysqli_query($db,$sql);
      extract(mysqli_fetch_assoc($data));
      
      if($count>0)
      {
        echo "Section already allocated.";
      }else{
        //Allocate section
        
        $query  = "INSERT INTO `sp_executive_work_area`
        (`id`, `executive_id`, `village_id`, `timestamp`)
        VALUES (NULL, \"$exec_id\", \"$village_id\", CURRENT_TIMESTAMP)";
        if(mysqli_query($db,$query))
        {
            echo "Section  allocated.";
        }else
        {
            echo "Problem occured while allocting section.";
        }
        
        
      }
      
      break;
      case "fetchAllocatedSection":
        
      $sql  = "SELECT world_countries.country_name,world_districts.district_name,world_state.state_name,world_taluka.taluka_name,world_village.village_name,sp_executive_work_area.executive_id,sp_executive_work_area.village_id FROM `sp_executive_work_area`,world_countries,world_districts,world_state,world_taluka,world_village WHERE  world_village.id=sp_executive_work_area.village_id AND world_village.taluka_id =world_taluka.id AND world_taluka.dist_id = world_districts.id AND world_districts.state_id = world_state.state_id AND world_state.country_id = world_countries.id AND sp_executive_work_area.executive_id=".$exec_id;

       
       
        $data =mysqli_query($db,$sql);
        $num = mysqli_num_rows($data);
        if($num>0)
        {
             ?>
          <table class="table tbale-sm">
            <thead>
                <tr>
                  <th>Sr. No</th>
                  <th>Village/Section</th>
                  <th>Taluka</th>
                  <th>District</th>
                  <th>State</th>
                  <th>Country</th>
                  <th>Action</th>
              </tr>
            </thead>
            
         <tbody>
           <?php
          for($i = 1;$i<=$num;$i++)
          {
            $row = mysqli_fetch_assoc($data);
            extract($row);
            /* country_name 	district_name 	state_name 	taluka_name 	village_name 	executive_id 	village_id 	*/
            ?>
            <tr id="rowid<?=$i?>">
                <td><?=$i?></td>
                <td><?=$village_name?></td>
                <td><?=$taluka_name?></td>
                <td><?=$district_name?></td>
                <td><?=$state_name?></td>
                <td><?=$country_name?></td>
                <td><button type="button" onclick="deAllocateSection('<?=$exec_id?>','<?=$village_id?>','rowid<?=$i?>');" class="btn btn-sm btn-danger">
                  <span class="fa fa-close"></span> deallocate
                </button></td>
            </tr>
            <?php
          }
           echo "</tbody></table>";
        }else{
            ?>
             <div class="alert alert-info">
                No work area yet assigned.
              </div>
            <?php
        }
        
      break;
    case "deAllocateSection":
         $sql  = "delete FROM `sp_executive_work_area` where executive_id=$exec_id and village_id =$village_id";
        if(mysqli_query($db,$sql))
        {
            echo "Section Deallocated";
        }
        
    break;
   }
}else{
    echo "No direct access allowed";
    
}

?>