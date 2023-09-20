<?php
    include_once ("../session_destry.php");
    include_once ("../../controller/groupController.php");

    $objGroup = new groupController();
    
    $peopleId = $_SESSION['id'];

    $groupId = $_POST['inputId'];
    $seleclAllPeople = $objGroup->selectAllPeople();
    if($seleclAllPeople->rowCount() > 0){
        while($fetchAll = $seleclAllPeople->fetch()){
            $iding = $fetchAll['id'];
            $selectId = $objGroup->selectAllPeopleNotReq($groupId,$iding);
            
            if($count = $selectId->rowCount()){
                
            }
            else{
                
                echo '<div class="join-content" style="padding: 10px; margin-bottom: 5px; background: white;">
                    <div class="joint-c-left">';
                    if($fetchAll['profile_pic'] == ""){
                        echo '<img src="../asset/img/profile.jpg" style="border-radius: 50%;">';
                    }
                    else{
                        echo '<img src="../userpicture/'.$fetchAll['profile_pic'].'" style="border-radius: 50%;">';
                    }
                    echo'<div class="join-name">
                            <h4>'.$fetchAll['first_name'].' '.$fetchAll['last_name'].'</h4>
                            <span>@'.$fetchAll['username'].'</span>
                        </div>
                    </div>
                    <div class="joint-c-left">
                        <form id="formData"><input type="hidden" name="creatId" value="'.$groupId.'"></form>
                        <button onclick="addNewPeopleToGroup('.$fetchAll['id'].')">Add</button>
                    </div>
                </div>';
            }
        }
    }
?>

<div class="join-content" style="padding: 10px; margin-bottom: 5px; background: white;">
    <div class="joint-c-left">
        <img src="../asset/img/profile.jpg" style="border-radius: 50%;">
        <div class="join-name">
            <h4>StartApp</h4>
            <span>@startappcommunity</span>
        </div>
    </div>
    <div class="joint-c-left">
        <button onclick="getChatPage('1')">Help</button>
    </div>
</div>