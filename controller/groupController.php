<?php

    class groupController{

        public function __construct(){
            $this->dbConned = new pdo("mysql:host=localhost; dbname=start_app", "root", "37858023");
            
        }
        public function createNewGroup($creatorId,$groupName,$fileName){
            $create = "INSERT INTO group_name(creator_id,group_named,group_logo) VALUES (?,?,?)";
            $query = $this->dbConned->prepare($create);
            $query->execute(array($creatorId,$groupName,$fileName));
        }
        // public function createAdminRequestGroup($creatorId){
        //     $createR = "INSERT INTO group_request(group_key,joiner_id,request_status,role_status) VALUES (?,?,?,?)";
        //     $query   = $this->dbConned->prepare($createR);
        //     $query   ->execute(array('On', $creatorId, '1', 'admin'));
        // }

        public function verifyAdminGroups($vId,$adminId){
            $verify     = "INSERT INTO group_request(group_key, joiner_id, request_status, role_status) VALUES (?,?,?,?)";
            $query      = $this->dbConned->prepare($verify);
            $query      ->execute(array($vId,$adminId, '1', 'admin'));
        }

        public function verifyGroups($vId,$adminId){
            $verify     = "UPDATE group_name SET verify_status = '1' WHERE group_id = ? AND creator_id = ?";
            $query      = $this->dbConned->prepare($verify);
            $query      ->execute(array($vId,$adminId));
        }

        public function selectAllVerifiedsGroups($sessionId){
            $select = "SELECT * FROM group_name WHERE (creator_id = '$sessionId' AND verify_status = '0') ORDER BY group_id DESC";
            $query  = $this->dbConned->prepare($select);
            $query  ->execute();
            return $query;
        }

        public function selectAllVerifieds($sessionId){
            $select = "SELECT * FROM group_request gr INNER JOIN group_name gn ON gn.group_id = gr.group_key WHERE (gr.joiner_id = '{$sessionId}' AND gr.request_status = '1' AND gr.role_status = 'admin') OR (gr.joiner_id = '{$sessionId}' AND gr.request_status = '1' AND gr.role_status = 'member') ORDER BY group_id DESC";
            $query  = $this->dbConned->prepare($select);
            $query  ->execute();
            return $query;

        }

        // select single group 

        public function selectGroupChat($id){
            $select = "SELECT * FROM group_name WHERE group_id = '$id'";
            $query  = $this->dbConned->prepare($select);
            $query  ->execute();
            return $query;

        }

        public function selectCountGroupUsers($id){
            $select = "SELECT * FROM group_request WHERE group_key = '{$id}'";
            $query  = $this->dbConned->prepare($select);
            $query  ->execute();
            return $query;

        }

        /* insert message 
        * Nine function
        * 
        *
        */

        public function insertMessage($groupIded,$senderId,$message){
            $insert = "INSERT INTO group_chat(group_C_Id,sender_id,message,mess_type, time_status) VALUES (?,?,?,?,?)";
            $query  = $this->dbConned->prepare($insert);
            $query  ->execute(array($groupIded,$senderId,$message,'text', time()));
        }

        public function sendNewFileToGroupChat($grouId,$senderId,$sendFileName){
            $insert = "INSERT INTO group_chat(group_C_Id,sender_id,message,mess_type, time_status) VALUES (?,?,?,?,?)";
            $query  = $this->dbConned->prepare($insert);
            $query  ->execute(array($grouId,$senderId,$sendFileName,'file', time()));

        }
        
        
        
        /* insert message 
        * Nine function
        * 
        *   @param int $id
        *   @return int and string;
        */

        public function selectGroupChatWith($id,$sionId){

            $select = "SELECT * FROM group_chat gc INNER JOIN users ON users.id = gc.sender_id  WHERE (gc.group_C_Id = '{$id}' AND gc.sender_id = '{$sionId}') OR (gc.group_C_Id = '{$id}' AND gc.sender_id != '{$sionId}')";
            $query  = $this->dbConned->prepare($select);
            $query  ->execute();
            return $query;

        }



        public function select_lastGroup_message($id,$sessionId){
            $inserted = "SELECT * FROM group_chat WHERE (group_C_Id = '{$id}' AND sender_id = '{$sessionId}') OR (group_C_Id = '{$id}' AND sender_id != '{$sessionId}') ORDER BY chatId DESC LIMIT 1";
            $quer2 = $this->dbConned->prepare($inserted);
            $quer2->execute();
            return $quer2;

        }

        // some user want to join your group 

        public function selectAllGroups($id){
            $selectAll = "SELECT * FROM group_name WHERE creator_id != '{$id}'";
            $quer2 = $this->dbConned->prepare($selectAll);
            $quer2->execute();
            return $quer2;
        }

        public function selectFollowGroup($id){
            $selectAll = "SELECT * FROM group_name WHERE creator_id != '{$id}' ORDER BY rand()";
            $quer2 = $this->dbConned->prepare($selectAll);
            $quer2->execute();
            return $quer2;
        }
        public function selectAllGroupsWith($id,$sessionId){
            $selectAll = "SELECT * FROM group_request gr INNER JOIN group_name gn ON gn.group_id = gr.group_key WHERE group_key = '{$id}' AND joiner_id = '{$sessionId}'";
            $quer2 = $this->dbConned->prepare($selectAll);
            $quer2->execute();
            return $quer2;

        }

        public function followGroupsFunction($id,$sessionId){
            $selectAll = "SELECT * FROM group_request gr INNER JOIN group_name gn ON gn.group_id = gr.group_key WHERE group_key = '{$id}' AND joiner_id = '{$sessionId}' ORDER BY rand()";
            $quer2 = $this->dbConned->prepare($selectAll);
            $quer2->execute();
            return $quer2;

        }

        public function insertNewUserGroup($id,$setId){
            $Insert     = "INSERT INTO group_request(group_key, joiner_id, request_status, role_status) VALUES (?,?,?,?)";
            $query      = $this->dbConned->prepare($Insert);
            $query      ->execute(array($id,$setId, '1', 'member'));

        }

        public function selectAllPeople(){
            $select = "SELECT * FROM users";
            $quer2 = $this->dbConned->prepare($select);
            $quer2->execute();
            return $quer2;
        }

        public function selectAllPeopleNotReq($id,$peopleId){
            $selectAll = "SELECT * FROM group_request gr INNER JOIN users ON users.id = gr.joiner_id WHERE group_key = $id AND joiner_id = $peopleId";
            $quer2 = $this->dbConned->prepare($selectAll);
            $quer2->execute();
            return $quer2;
        }

        public function CreateNewMember($gropId,$mainId){
            $Insert     = "INSERT INTO group_request(group_key, joiner_id, request_status, role_status) VALUES (?,?,?,?)";
            $query      = $this->dbConned->prepare($Insert);
            $query      ->execute(array($gropId,$mainId, '1', 'member'));

        }
        // get group chat a just now message or 1 minute ago 
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