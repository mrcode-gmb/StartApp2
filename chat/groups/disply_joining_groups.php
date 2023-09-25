<div id="displayJoiningGroups">
    
</div>
<?php

    include_once ("../session_destry.php");
    include_once ("../../controller/groupController.php");

    $objGroup = new groupController();
    $idd = "";
    $id = $_SESSION['id'];

    $selectAllGroups = $objGroup->selectAllGroups($id);

    while ($fetchAll = $selectAllGroups->fetch()) {
      $idd = $fetchAll['group_id'];
      $selectAllWith =  $objGroup->selectAllGroupsWith($idd,$id);
       
        if($count = $selectAllWith->rowCount() > 0){
            // echo 'dffd';
        
        }
        else{
            echo '<div class="join-content">
                <div class="joint-c-left">
                    <img src="groups/groupslogos/'.$fetchAll['group_logo'].'" alt="">
                    <div class="join-name">
                        <h4>'.$fetchAll['group_named'].'</h4>
                        <span>150 people</span>
                    </div>
                </div>
                <div class="joint-c-left">
                    <button onclick="insertNewGroupRequest('.$fetchAll['group_id'].')">Follow</button>
                </div>
            </div>';
        }
    }
    
        
        
    

   
?>
<div class="user-sl">
    <div class="user-img">
        <img src="../asset/img/profile.jpg" alt="">
       <div class="chat-md-ls">
            <h4>StartApp</h4>
            <p>community</p>
        </div>
    </div>
    <div class="check">
        <button type="button" onclick="getChatPage('1')">Help</button>
    </div>
</div>


