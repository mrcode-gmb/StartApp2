<?php
    include_once ("../../controller/CreateNewPostingController.php");
    include_once ("../session_destry.php");
    $newObj = new CreateNewPostingController();

    $selectAll = $newObj->AllProfilePosting($_SESSION['id']);

    if($selectAll->rowCount() > 0){
        while($rowAll = $selectAll->fetch()){
            $postId = $rowAll['post_id'];
            $selectLike = $newObj->selectAllPostLikeWith($postId,$_SESSION['id']); 
            $selectUnLike = $newObj->selectAllPostUnLikeWith($postId,$_SESSION['id']); 
            $selectLikeCount    = $newObj->selectAllPostLikeWithCount($postId);
            $selectUnLikeCount    = $newObj->selectAllPostUNLikeWithCount($postId);
            $selectCommentCount = $newObj->selectAllPostCommentWithCount($postId);  
            
            echo '<div class="post-page">
            <div class="post-head">
                <div class="post-head-lf">
                    <img src="../userpicture/'.$rowAll['profile_pic'].'" alt="">
                    <div class="name-post">
                        <h4>'.$rowAll['first_name'].' '.$rowAll['last_name'].' .</h4>
                        <p>@'.$rowAll['username'].'</p>
                        <label>'.$rowAll['date_post'].'</label>
                    </div>
                </div>
                <div class="post-head-rg">
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="post-body">
                <div class="post-text-body">
                    <div class="post-content">
                        <p>'.$rowAll['post_content'].'</p>
                    </div>
                    <div class="post-img">';
                        if($rowAll['post_img'] == ""){

                        }
                        else{
                            echo '<img src="posting/postingImages/'.$rowAll['post_img'].'" onclick="displayFullScreen(`'.$rowAll['post_img'].'`)">';
                        }
                    echo '</div>
                    <div class="post-count">
                        <div class="like-list">';
                            if($countter = $selectLikeCount->rowCount()){
                                echo '<span class="span-text">'.$countter.' </span> <h4> like</h4>';
                            }
                        echo '
                        </div>
                        <div class="like-list">';
                            if($cout = $selectCommentCount->rowCount()){
                                echo '<span style="color: #444;">'.$cout.'</span>';
                            }
                            echo '<span>comments</span>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="post-footer">
                <div class="post-end">
                    <div class="like">';
                        if($setId = $selectLike->rowCount() > 0){
                            echo '<i class="fa fa-heart" onclick="deleteOldLike('.$postId.')"></i>';
                        
                        }
                        else{

                            echo '<i class="fa fa-regular fa-heart" onclick="likeId('.$postId.')"></i>';

                        }
                        
                        
                        
                        if($countter = $selectLikeCount->rowCount()){
                            echo '<span>'.$countter.'</span>';
                        }
                        echo '
                    </div>
                    <div class="like">
                        <i class="fa fa-regular fa-comment" onclick="openComment('.$postId.')" id="commenticons"></i>';
                        if($cout = $selectCommentCount->rowCount()){
                            echo '<span>'.$cout.'</span>';
                        }
                    echo '</div>
                    <div class="like">';
                        
                        if($setIds = $selectUnLike->rowCount() > 0){
                            echo '<i class="fa fa-thumbs-down" onclick="deleteOldUnLike('.$postId.')"></i>';
                        // <i class="fa fa-heart" onclick="deleteOldLike('.$postId.')"></i>
                        }
                        else{
                            // <i class="fa fa-regular fa-heart" onclick="likeId('.$postId.')"></i>
                            echo '<i class="fa fa-regular fa-regular fa-thumbs-down" onclick="UnLikeIdlikeId('.$postId.')"></i>';
                            

                        }

                        if($countUnlike = $selectUnLikeCount->rowCount()){
                            echo '<span>'.$countUnlike.'</span>';
                        }
                        echo '
                    </div>
                </div>
            </div>
        </div>';
        }
    }
    else{
        echo "<div class='profile_post_empty'>You dont have any post, you can click, <a href='#' onclick='openModalPost()'>add</a>. to create post.</div>";
    }

?>
