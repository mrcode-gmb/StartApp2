<?php
    include_once ("../../../controller/CreateNewPostingController.php");
    include_once ("../../session_destry.php");
    $newObj = new CreateNewPostingController();
    
    $ids = $_GET['postingId'];

    $selectAll = $newObj->selectAllPostingSingle($ids);

    

?>
<div class="view-posting-modal">
    <div class="view-header">
        <div class="view-icon">
            <i class="fa fa-arrow-left" onclick="closeChatNowToUser()"></i>
        </div>
        <div class="view-txt">
            <p>This post by </p>
            <h4>&nbsp;<?php echo $_SESSION['firstName'];?></h4>
        </div>
    </div>
    <div class="comment-body">
        <div class="comment-sm">
            <?php
                if($selectAll->rowCount() > 0){
                    $rowAll = $selectAll->fetch();
        
                    $postId = $rowAll['post_id'];
                    $selectLike = $newObj->selectAllPostLikeWith($postId,$_SESSION['id']); 
                    $selectCommentCount = $newObj->selectAllPostCommentWithCount($postId); 
                
                    echo '<div class="comment-tab">
                        <div class="comment-left">';
                            if($rowAll['profile_pic'] == ""){
                                echo '<img src="../asset/img/profile.jpg">';
                            }
                            else{
                                echo '<img src="../userpicture/'.$rowAll['profile_pic'].'" alt="">';
                            }
                            echo '<div class="name">
                                <h4>'.$rowAll['first_name'].'</h4>
                                <div class="time-ago">
                                    <span>@'.$rowAll['username'].'</span>
                                    <p>'.$newObj->time_agoF($rowAll['time_post']).'</p>
                                </div>
                            </div>
                        </div>
                        <div class="comment-right">
                            <i class="fa fa-gear"></i>
                        </div>
                    </div>
                    <div class="comment-post">
                        <p>'.$rowAll['post_content'].'</p>';
                        if($rowAll['post_img'] == ""){

                        }
                        else{
                            echo '<img src="posting/postingImages/'.$rowAll['post_img'].'" onclick="displayFullScreen(`'.$rowAll['post_img'].'`)">';
                        }
                        
                    echo '</div>';
                }
            ?>
            <div class="comment-list">
                <div class="comment-list-head">
                <?php
                    if($countter = $selectCommentCount->rowCount()){
                        echo '<p>'.$countter.' </p>
                        <h4>total comment</h4>';
                        
                    }
                ?>
                </div>
            </div>
        </div>
        <div class="comment-them" id="getSinglePostWithComment">
            
        </div>
    </div>
    <div class="comment-footer">
        <form action="" method="post" id="commentForm">
            <div class="d-flex-come">
                <div class="form-group-comment">
                    <input type="hidden" name="user_postId" style="display: none;" value="<?php echo $rowAll['poster_id'];?>">
                    <input type="hidden" name="post_id" style="display: none;" value="<?php echo $postId;?>">
                    <input type="text" name="comment_content" id="commentInput" placeholder="what's on your mind">
                </div>
                <div class="btn">
                    <i class="bi bi-send" onclick="sendCommentId()"></i>
                </div>
            </div>
        </form>
    </div>
</div>

