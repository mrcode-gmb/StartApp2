<?php
    class NotificationController{

        public function __construct()
        {
            $this->dbConn = new pdo("mysql:host=localhost; dbname=start_app", "root", "37858023");
            
        }
        // notification function 

        public function getCommentNote()
        {
            $select = "SELECT * FROM comment_tbl WHERE users_create_id = ? AND view_status_comment = '0'";    
            $query  = $this->dbConn->prepare($select);
            $query  ->execute(array($_SESSION['id']));
            return $query;
        }

        public function UpdateCommentNote($id)
        {
            $update =  "UPDATE comment_tbl SET view_status_comment = '1' WHERE users_create_id = ? AND view_status_comment = '0'";
            $query  = $this->dbConn->prepare($update);
            $query  ->execute(array($id));
        }

        public function GetCommentNoteList($id)
        {
            $select = "SELECT * FROM comment_tbl ct INNER JOIN users u ON u.id = ct.sender_comment_id WHERE ct.users_create_id = ? AND ct.noted_status_comment = '0' ORDER BY comt_id DESC";    
            $query  = $this->dbConn->prepare($select);
            $query  ->execute(array($id));
            return $query;
        }








        public function time_agoF($tm,$rcs = 0){
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