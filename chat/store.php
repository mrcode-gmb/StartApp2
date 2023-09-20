<!-- ?php
include_once ("session_destry.php");
include_once ("../controller/user_crud.php");
$newObj = new createUsers();
$selecct2 = $newObj->select_member_chat();
while($row5 = $selecct2->fetch()){
    echo '<a href="index.php?id='.$row5['public_id'].'" style="text-decoration: none; color: #444;">
            <div class="user-sl">
                <div class="user-img">';
                    if($row5['profile_pic'] == ""){
                        echo '<img src="../asset/img/profile.jpg" alt="">';
                    }
                    else{
                        echo '<img src="../userpicture/'.$row5['profile_pic'].'" alt="">';
                    }
                    echo '<div class="chat-md-ls">
                        <h4>'.$row5['first_name'].' '.$row5['last_name'].'</h4>
                        <p>last message .......</p>
                    </div>
                </div>
                <div class="check">
                    <i class="fa fa-check"></i>
                </div>
            </div>
        </a>';
}


?> -->


<?php
include_once ("session_destry.php");
include_once ("../controller/user_crud.php");
$newObj = new createUsers();
$selecct2 = $newObj->select_member_chat();
$resulted = "";
while($row5 = $selecct2->fetch()){
    $id = $row5['id'];
    $select3 = $newObj->select_lastmessage($id,$_SESSION['id']);
    $row6 = $select3->fetch();
    $sss = "";
    if($select3->rowCount() > 0){
        if($row6['chat_type'] == "text"){
            $resulted = "".$row6['contents'].".....";
        }
        else{
            $resulted  = "Photo";
        }
        
    }
    else{
        $resulted = "No message available";
    }

    (strlen($resulted) > 20) ? $message = substr($resulted, 0, 20) : $message = $resulted;
    $iding = $row5['id'];
    $sender = $newObj->select_empty_message($iding, $_SESSION['id']);
    if($sender->rowCount() > 0){
        echo '<a href="#" style="text-decoration: none; color: #444;">
            <div class="user-sl" onclick="getChatPage('.$row5['id'].')">
                <div class="user-img">';
                    if($row5['profile_pic'] == ""){
                        echo '<img src="../asset/img/profile.jpg" alt="">';
                    }
                    else{
                        echo '<img src="../userpicture/'.$row5['profile_pic'].'" alt="">';
                    }
                    echo '<div class="chat-md-ls">
                        <h4>'.$row5['first_name'].' '.$row5['last_name'].'</h4>
                        <p>'.$message.'</p>
                    </div>
                </div>
                <div class="check">
                    <i class="fa fa-check"></i>
                </div>
            </div>
        </a>';
    }
    else{
        // $sss =  "<div class='new-member-welcome'>Hi, ".$_SESSION['firstName'].", No any recent chat <br> <p>Go an find a new friend</p></div>";
    }
    
}

?>
