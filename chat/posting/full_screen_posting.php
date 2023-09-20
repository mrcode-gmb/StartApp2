<?php
    if(isset($_GET['imgurl'])){
        $imgUrl = $_GET['imgurl'];
        echo '<div class="full-screeen">
                    <div class="screen-full">
                        <div class="full-header">
                            <div class="screen-close" onclick="closePostingImg()">
                                <a href="#" class="fa fa-times"></a>
                            </div>
                            <div class="screen-download">
                                <a href="posting/postingImages/'.$imgUrl.'" class="fa fa-download" download></a>
                            </div>
                        </div>
                        <div class="full-body">
                            <img src="posting/postingImages/'.$imgUrl.'" alt="">
                        </div>
                    </div>
                </div>';
    }

?>