
<?php

    include_once ("../session_destry.php");
    include_once ("../../controller/groupController.php");

    $objGroup = new groupController();
    $idd = "";
    $id = $_SESSION['id'];

    $selectAllGroups = $objGroup->selectFollowGroup($id);

    while ($fetchAll = $selectAllGroups->fetch()) {
      $idd = $fetchAll['group_id'];
      $selectAllWith =  $objGroup->followGroupsFunction($idd,$id);
       
        if($count = $selectAllWith->rowCount() > 0){
            // echo 'dffd';
        
        }
        else{
            $resulting="";
            $resulting = $fetchAll['group_named'];

            (strlen($resulting) > 8) ? $name = substr($resulting, 0, 8).'...' : $name = $resulting;
            
            echo '<div class="group-part">
                    <img src="groups/groupslogos/'.$fetchAll['group_logo'].'" alt="">
                    <div class="part-name">
                        <p>'.$name.'</p>
                        <button type="button" id="follow_button'.$fetchAll['group_id'].'" onclick="followGroups('.$fetchAll['group_id'].')">Follow</button>
                    </div>
                </div>';
        }
    }
    
        
        
    

   
?>

