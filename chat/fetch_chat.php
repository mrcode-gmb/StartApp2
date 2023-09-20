<?php 
    include_once ("session_destry.php");
    include_once ("../controller/user_crud.php");
    $newObj = new createUsers();

    $reuqest_id =  $_POST['request_id'];
    $sender_id =  $_POST['sender_id'];
    $results = "";
    $seclect = $newObj->select_chat_table($reuqest_id,$sender_id);

    if($seclect->rowCount() > 0){
        while($fetchMes = $seclect->fetch()){
            if ($fetchMes['request_id_c'] === $reuqest_id) {
                if($fetchMes['chat_type'] == "text"){
                    $results .= '<div class="left-msg">
                                <div class="msg">
                                    <div class="content">
                                        <h5>'.$fetchMes['contents'].'</h5>
                                        <p>'.$newObj->time_agoF($fetchMes['time_send']).'</p>
                                    </div>';
                                    if($_SESSION['profile_pic'] == ""){
                                        $results .= '<img src="../asset/img/profile.jpg" alt="">';
                                    }
                                    else{
                                        $results .= '<img src="../userpicture/'.$_SESSION['profile_pic'].'" alt="">';
                                    }
                                $results .= '</div>
                            </div>';
                }
                else{
                    $results .= '<div class="left-msg">
                                    <div class="msg">
                                        <div class="content-img">
                                            <img src="../chat_galley/'.$fetchMes['contents'].'" alt="">
                                            <p>'.$newObj->time_agoF($fetchMes['time_send']).'</p>
                                        </div>
                                    </div>
                                </div>';
                }
            }
            else{
                if($fetchMes['chat_type'] == "text"){
                    $results .= '<div class="right-msg">
                            <div class="msg">';
                                if($fetchMes['profile_pic'] == ""){
                                    $results .= '<img src="../asset/img/profile.jpg" alt="">';
                                }
                                else{
                                   $results .= '<img src="../userpicture/'.$fetchMes['profile_pic'].'" alt="">';
                                }
                                $results .= '<div class="content">
                                    <h5>'.$fetchMes['contents'].'</h5>
                                    <p> '.$newObj->time_agoF($fetchMes['time_send']).'</p>
                                </div>
                            </div>
                        </div>';
                }
                else{
                    $results .= '<div class="right-msg">
                                    <div class="msg">
                                        <div class="content-img">
                                            <img src="../chat_galley/'.$fetchMes['contents'].'" alt="">
                                            <p>'.$newObj->time_agoF($fetchMes['time_send']).'</p>
                                        </div>
                                    </div>
                                </div>';
                }
            }
        }

        echo $results;
    }
    else{
        echo "<div style='width:100%; text-align: center; padding: 20px 0; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 20px; color: #999;'>No recent message now you can start</div>";
    }
    
        
   
   
?>