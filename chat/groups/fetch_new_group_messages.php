<?php

include_once ("../session_destry.php");
include_once ("../../controller/groupController.php");
$objGroup = new groupController();

?>


<?php


    $resultings = "";
    $id = $_POST['group_id'];
    $sessionId = $_POST['sender_id'];

    $selectQuery = $objGroup->selectGroupChatWith($id,$sessionId);

    if($selectQuery->rowCount()>0){
        while($row10 = $selectQuery->fetch()){
        
            if($row10['sender_id'] === $sessionId){
                if($row10['mess_type'] == "text"){
                    $resultings .= '<div class="left-msg">
                                <div class="msg">
                                    <div class="content">
                                        <h5>'.$row10['message'].'</h5>
                                        <p> '.$objGroup->time_agoF($row10['time_status']).'</p>
                                    </div>';
                                    if($_SESSION['profile_pic'] == ""){
                                        $resultings .= '<img src="../asset/img/profile.jpg" alt="">';
                                    }
                                    else{
                                        $resultings .= '<img src="../userpicture/'.$_SESSION['profile_pic'].'" alt="">';
                                    }
                                $resultings .= '</div>
                            </div>';
                }
                else{
                    $resultings .= '<div class="left-msg">
                        <div class="msg">
                            
                          <div class="content-img">
                                <img src="groups/groupImages/'.$row10['message'].'" alt="">
                                <p> '.$objGroup->time_agoF($row10['time_status']).'</p>
                            </div>';
                            if($_SESSION['profile_pic'] == ""){
                                $resultings .= '<img src="../asset/img/profile.jpg" alt="" style="border-radius: 50%; object-fit: cover; margin-left: 5px; width: 34px; height: 34px; border: solid 5px rgb(0, 100, 117);">';
                            }
                            else{
                                $resultings .= '<img src="../userpicture/'.$_SESSION['profile_pic'].'" alt="" style="border-radius: 50%; object-fit: cover; margin-left: 5px; width: 34px; height: 34px; border: solid 5px rgb(0, 100, 117);">';
                            }
                       $resultings .= ' </div>
                    </div>';
                }
            }
            else{
                if($row10['mess_type'] == "text"){
                    $resultings .= '<div class="right-msg">
                                    <div class="msg">';
                                        if($row10['profile_pic'] == ""){
                                            $resultings .= '<img src="../asset/img/profile.jpg" alt="">';
                                        }
                                        else{
                                        $resultings .= '<img src="../userpicture/'.$row10['profile_pic'].'" alt="">';
                                        }
                                        $resultings .= '<div class="content">
                                            <h5>'.$row10['message'].'</h5>
                                            <p> '.$objGroup->time_agoF($row10['time_status']).'</p>
                                        </div>
                                    </div>
                                </div>';
                }
                else{
                    $resultings .= '<div class="right-msg">
                                    <div class="msg">';
                                    if($row10['profile_pic'] == ""){
                                        $resultings .= '<img src="../asset/img/profile.jpg" alt="" style="border-radius: 50%; object-fit: cover; margin-right: 5px; width: 34px; height: 34px; border: solid 5px rgb(0, 100, 117);">';
                                    }
                                    else{
                                    $resultings .= '<img src="../userpicture/'.$row10['profile_pic'].'" alt="" style="border-radius: 50%; object-fit: cover; margin-right: 5px; width: 34px; height: 34px; border: solid 5px rgb(0, 100, 117);">';
                                    }
                                    $resultings .= '<div class="content-img">
                                            <img src="groups/groupImages/'.$row10['message'].'" alt="">
                                            <p> '.$objGroup->time_agoF($row10['time_status']).'</p>
                                        </div>
                                    </div>
                                </div>';
                }
            }
        }
        echo $resultings;
    }
    else{
        // echo "Empty";
    }
?>

