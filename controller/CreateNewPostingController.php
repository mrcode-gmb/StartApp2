<?php
    
    class CreateNewPostingController{
        public function __construct(){
            $this->dbConned = new pdo("mysql:host=localhost; dbname=start_app", "root", "37858023");
            
        }
        public function store($poster_id,$contentArea,$postFile){
            $insert = "INSERT INTO create_posting(poster_id, post_content, post_img, date_post,time_post) VALUES (?,?,?,?,?)";
            $query = $this->dbConned->prepare($insert);
            $query->execute(array($poster_id,$contentArea,$postFile, date("d M, Y. h:i a"),time()));
        }
        public function selectAllPosting(){
            $select = "SELECT * FROM create_posting cp INNER JOIN users ON users.id = cp.poster_id ORDER BY post_id DESC";
            $query = $this->dbConned->prepare($select);
            $query->execute();
            return $query;

        }
        // like sql insert and update delete and etc 
        public  function storePostingIdLike($postId,$setId){
            $insert = "INSERT INTO like_table(posting_id_like, sender_like_id, date) VALUES (?,?,?)";
            $query = $this->dbConned->prepare($insert);
            $query->execute(array($postId,$setId, date('y-m-d')));
            
        }
        // select count like with one 
        public function selectAllPostLikeWith($postId,$setId){
            $select = "SELECT * FROM like_table lt INNER JOIN users ON users.id = lt.sender_like_id WHERE posting_id_like = $postId AND sender_like_id = $setId";
            $query = $this->dbConned->prepare($select);
            $query->execute();
            return $query;

        }
        
        public function selectAllPostLikeWithCount($postId){
            $select = "SELECT * FROM like_table lt INNER JOIN users ON users.id = lt.sender_like_id WHERE posting_id_like = $postId";
            $query = $this->dbConned->prepare($select);
            $query->execute();
            return $query;

        }

        // delete my like here 
        public function DestoryPostingIdLike($postId,$setId){
            $select = "DELETE FROM like_table WHERE posting_id_like = $postId AND sender_like_id = $setId";
            $query = $this->dbConned->prepare($select);
            $query->execute();

        }

        // select singgle post 
        public function selectAllPostingSingle($id){
            $select = "SELECT * FROM create_posting cp INNER JOIN users ON users.id = cp.poster_id WHERE post_id = $id";
            $query = $this->dbConned->prepare($select);
            $query->execute();
            return $query;

        }
        
        // start comment query here 

        public function createNewCommentFunction($postId,$senderId,$commentContent){
            $insert = "INSERT INTO comment_tbl(postId,sender_comment_id,comment_content,comt_date,time_zone) VALUES (?,?,?,?,?)"; 
            $query = $this->dbConned->prepare($insert);
            $query->execute(array($postId,$senderId,$commentContent, date("d M, Y. h:i a"),time()));
        }

        public function SelectAllCommentFunction($postId){
            $select = "SELECT * FROM comment_tbl ct INNER JOIN users ON users.id = ct.sender_comment_id WHERE postId = $postId ORDER BY comt_id DESC";
            // $select = "SELECT * FROM comment_tbl ct INNER JOIN users ON users.id = ct.sender_comment_id WHERE postId = $postId ORDER BY RAND()";
            $query = $this->dbConned->prepare($select);
            $query->execute();
            return $query;
            
        }

        public function selectAllPostCommentWithCount($postId){
            $select = "SELECT * FROM comment_tbl ct INNER JOIN users ON users.id = ct.sender_comment_id WHERE postId = $postId";
            $query = $this->dbConned->prepare($select);
            $query->execute();
            return $query;

        }


        // start unlink here 
        public function selectAllPostUnLikeWith($postId,$setId){
            $select = "SELECT * FROM unlike_tbl ut INNER JOIN users ON users.id = ut.create_unlike_id WHERE unlike_post_id = $postId AND create_unlike_id = $setId";
            $query = $this->dbConned->prepare($select);
            $query->execute();
            return $query;

        }
        // Unlike sql insert and update delete and etc 
        public  function storePostingIdUnLike($postId,$setId){
            $insert = "INSERT INTO unlike_tbl(unlike_post_id, create_unlike_id, date_unlike) VALUES (?,?,?)";
            $query = $this->dbConned->prepare($insert);
            $query->execute(array($postId,$setId, date('d M, Y. h:i a')));
            
        }

        public function selectAllPostUNLikeWithCount($postId){
            $select = "SELECT * FROM unlike_tbl ut INNER JOIN users ON users.id = ut.create_unlike_id WHERE unlike_post_id = $postId";
            $query = $this->dbConned->prepare($select);
            $query->execute();
            return $query;

        }

        // delete my Unlike here 
        public function DestoryPostingIdUnLike($postId,$setId){
            $select = "DELETE FROM unlike_tbl WHERE unlike_post_id = $postId AND create_unlike_id = $setId";
            $query = $this->dbConned->prepare($select);
            $query->execute();

        }
        public function AllProfilePosting($id){
            $select = "SELECT * FROM create_posting cp INNER JOIN users ON users.id = cp.poster_id WHERE cp.poster_id = '$id' ORDER BY post_id DESC";
            $query = $this->dbConned->prepare($select);
            $query->execute();
            return $query;

        }
        public function time_agoF($tm,$rcs = 0) {
            $cur_tm = time(); 
            $dif = $cur_tm-$tm;
            $pds = array('seconds ago','minutes ago','hours ago','days ago','weeks ago','months ago','years ago','decade');
            $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
        
            for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
                $no = floor($no);
                if($no <> 1)
                    $pds[$v] .='';
                $x = sprintf("%d %s ",$no,$pds[$v]);
                if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0))
                    $x .= time_ago($_tm);
                return $x;
        }

    }
?>