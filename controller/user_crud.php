<?php

    class createUsers{

        public function __construct(){
            $this->dbConn = new pdo("mysql:host=localhost; dbname=start_app", "root", "37858023");
            
        }
        public function createUser($fname,$lname,$gender,$pnumber,$email,$dob,$username,$pass){
            $insert = "INSERT INTO users( public_id, first_name, last_name, gender, phone_number, email, dob, username, password) VALUES (?,?,?,?,?,?,?,?,?)";
            $userQuery = $this->dbConn->prepare($insert);
            $userQuery->execute(array(rand(000000000000000000000, 999999999999999999999999),$fname,$lname,$gender,$pnumber,$email,$dob,$username,$pass));
        }
        public function backchack($username){
            $select1 = "SELECT * FROM users WHERE username = ?";
            $query1 = $this->dbConn->prepare($select1); 
            $query1->execute([$username]);
            return $query1;
        } 

        public function userlogin($key_check,$pass){
            $select1 = "SELECT * FROM users WHERE (username = '{$key_check}' AND password = '{$pass}') OR (phone_number = '{$key_check}' AND password = '{$pass}') OR (email = '{$key_check}' AND password = '{$pass}')";
            $query1 = $this->dbConn->prepare($select1); 
            $query1->execute();
            return $query1;
        }

        public function update_profile_pic($update_file,$id){
            $update = "UPDATE users SET profile_pic = ? WHERE id = ?";
            $quer2 = $this->dbConn->prepare($update);
            $quer2->execute(array($update_file,$id));
        }

        public function select_profile_pic($id){
            $select = "SELECT * FROM users WHERE id = ?";
            $quer2 = $this->dbConn->prepare($select);
            $quer2->execute(array($id));
            return $quer2;
        }

        public function select_member_chat(){
            $select1 = "SELECT * FROM users WHERE id != '".$_SESSION['id']."'";
            $query1 = $this->dbConn->prepare($select1); 
            $query1->execute();
            return $query1;

        }
        

        public function select_single_chat($id){
            $select1 = "SELECT * FROM users WHERE id = ?";
            $query1 = $this->dbConn->prepare($select1); 
            $query1->execute([$id]);
            return $query1;

        }

        // start create private chat here 

        public function insert_chat_table($reuqest_id,$sender_id,$mess){
            $inserted = "INSERT INTO chat_tbl (request_id_c, sender_id, contents, chat_type,time_send) VALUES (?,?,?,?,?)";
            $quer2 = $this->dbConn->prepare($inserted);
            $quer2->execute(array($reuqest_id,$sender_id,$mess, "text", time()));
        }

        public function select_chat_table($reuqest_id,$sender_id){
            $inserted = "SELECT * FROM chat_tbl ut INNER JOIN users ON users.id = ut.sender_id WHERE (request_id_c = '{$reuqest_id}' AND sender_id = '{$sender_id}') OR (request_id_c = '{$sender_id}' AND sender_id = '{$reuqest_id}')";
            $quer2 = $this->dbConn->prepare($inserted);
            $quer2->execute();
            return $quer2;
        }

        // insert photo or file 

        public function insert_photo_chat($request_id,$sender_id,$file_name){
            $inserted = "INSERT INTO chat_tbl (request_id_c,sender_id,contents,chat_type,time_send) VALUES(?,?,?,?,?)";
            $quer2 = $this->dbConn->prepare($inserted);
            $quer2->execute(array($request_id,$sender_id,$file_name, "photo",time()));

        }

        // show last chat
        public function select_lastmessage($id,$myId){
            $inserted = "SELECT * FROM chat_tbl WHERE (request_id_c = '{$id}' OR sender_id = '{$id}') AND (sender_id = '{$myId}' OR request_id_c = '{$myId}') ORDER BY id DESC LIMIT 1";
            $quer2 = $this->dbConn->prepare($inserted);
            $quer2->execute();
            return $quer2;

        }

        // get new message count all users 
        
        public function select_new_box_message($myId,$id){
            $inserted = "SELECT * FROM chat_tbl WHERE request_id_c = '{$myId}' AND sender_id = '{$id}' AND view_status = 1";
            $quer2 = $this->dbConn->prepare($inserted);
            $quer2->execute();
            return $quer2;

        }
        
        public function update_new_box_message($myId,$id){
            $inserted = "UPDATE chat_tbl SET view_status = 0 WHERE request_id_c = '{$myId}' AND sender_id = '{$id}'";
            $quer2 = $this->dbConn->prepare($inserted);
            $quer2->execute();
            return $quer2;

        }
        // get new people here 
        public function select_new_people_chat(){
            $select1 = "SELECT * FROM users WHERE id != '".$_SESSION['id']."'";
            $query1 = $this->dbConn->prepare($select1); 
            $query1->execute();
            return $query1;

        }

        public function select_accept_friends_request($senderId,$sessionId){
            $select1 = "SELECT * FROM friend_request WHERE (request_id = '{$senderId}' AND my_id = '{$sessionId}' AND accept_status = '1') OR (request_id = '{$sessionId}' AND my_id = '{$senderId}' AND accept_status = '1')";
            $query1 = $this->dbConn->prepare($select1); 
            $query1->execute();
            return $query1;

        }
        // select empty message on chat table 
        public function select_empty_message($iding, $session_id){
            $inserted = "SELECT * FROM chat_tbl WHERE (request_id_c = '{$iding}' AND sender_id = '{$session_id}') OR (request_id_c = '{$session_id}' AND sender_id = '{$iding}')";
            $quer2 = $this->dbConn->prepare($inserted);
            $quer2->execute();
            return $quer2;

        }

        public function select_all_friends($id){
            $select1 = "SELECT * FROM users WHERE id != '{$id}' AND id != 1";
            $query1 = $this->dbConn->prepare($select1); 
            $query1->execute();
            return $query1;

        }
        
        public function insertNewRequest($req_id, $my_id){
            $insert = "INSERT INTO friend_request(request_id, my_id, accept_status, date) VALUES (?,?,?,?)";
            $query1 = $this->dbConn->prepare($insert); 
            $query1->execute(array($req_id, $my_id, '0', date('d-m-y')));
        }

        public function select_request_empty($senderid,$myid){
            $insert = "SELECT * FROM friend_request WHERE (request_id =  '{$senderid}' AND my_id = '{$myid}') OR (request_id =  '{$myid}' AND my_id = '{$senderid}')";
            $query1 = $this->dbConn->prepare($insert); 
            $query1->execute();
            return $query1;

        }

        public function select_request($senderid,$myid){
            $insert = "SELECT * FROM friend_request WHERE request_id =  '{$senderid}' AND my_id = '{$myid}' AND accept_status = '0'";
            $query1 = $this->dbConn->prepare($insert); 
            $query1->execute();
            return $query1;

        }
        public function select_requested($myid){
            $insert = "SELECT * FROM friend_request WHERE my_id = '{$myid}' AND accept_status = '0'";
            $query1 = $this->dbConn->prepare($insert); 
            $query1->execute();
            return $query1;

        }
        public function accept_select_request($senderid,$myid){
            $insert = "SELECT * FROM friend_request WHERE request_id =  '{$myid}' AND my_id = '{$senderid}' AND accept_status = '0'";
            $query1 = $this->dbConn->prepare($insert); 
            $query1->execute();
            return $query1;

        }
        public function count__waitting_select_request($myid){
            $insert = "SELECT * FROM friend_request WHERE request_id =  '{$myid}' AND accept_status = '0'";
            $query1 = $this->dbConn->prepare($insert); 
            $query1->execute();
            return $query1;

        }
        
        public function deleteNewRequest($req_id, $my_id){
            $delete = "DELETE FROM friend_request WHERE request_id = '{$req_id}' AND my_id = '{$my_id}'";
            $quer2 = $this->dbConn->prepare($delete);
            $quer2->execute();
        }


        public function deleteSendedRequest($senderid, $my_id){
            $delete = "DELETE FROM friend_request WHERE request_id = '{$my_id}' AND my_id = '{$senderid}' AND accept_status = '0'";
            $quer2 = $this->dbConn->prepare($delete);
            $quer2->execute();
        }

        public function accaptSendedRequested($senderid,$sessionId){
            $update = "UPDATE friend_request SET accept_status = '1' WHERE request_id = '{$sessionId}' AND my_id = '{$senderid}'";
            $quer4 = $this->dbConn->prepare($update);
            $quer4->execute();
        }

        public function update($fname,$lname,$gender,$pnumber,$email,$dob,$id){
            $update = "UPDATE users SET first_name = ?, last_name = ?, gender = ?, phone_number = ?, email = ?, dob = ? WHERE id = ?";
            $quer2 = $this->dbConn->prepare($update);
            $quer2->execute(array($fname,$lname,$gender,$pnumber,$email,$dob,$id));

        }

        // change password script 

        public function oldPassword($oldpass,$id){
            $select = "SELECT * FROM users WHERE password = ? AND id = ?";
            $quer2  = $this->dbConn->prepare($select);
            $quer2->execute(array($oldpass,$id));
            return $quer2;
        }

        public function newpassword($new_pass,$id){
            $change = "UPDATE users SET password = ? WHERE id = ?";
            $query  = $this->dbConn->prepare($change);
            $query  ->execute(array($new_pass,$id));
        }

        // clear private chat 

        public function clearPrivateChat($id,$setID){
            $det = "DELETE FROM chat_tbl WHERE (request_id_c = '{$id}' AND sender_id = '{$setID}') OR (request_id_c = '{$setID}' AND sender_id = '{$id}')";
            $query = $this->dbConn->prepare($det);
            $query->execute();
        }

        // logout queries here 
        public function logouted($id){
            $update = "UPDATE users SET active_status = ? WHERE id = ?";
            $query  = $this->dbConn->prepare($update);
            $query  -> execute(array(date("d M, Y h:i a"),$id));
        }

        public function userOnline($id){
            $update = "UPDATE users SET active_status = ? WHERE id = ?";
            $query  = $this->dbConn->prepare($update);
            $query  -> execute(array("Online",$id));

        }

        public function VideosAll()
        {
            $select = "SELECT * FROM videos";
            $quer2  = $this->dbConn->prepare($select);
            $quer2->execute();
            return $quer2;
        }

        // get private chat a just now message or 1 minute ago 
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

//         SELECT u.*, c.*
// FROM users u
// LEFT JOIN (
//     SELECT ct.id, MAX(ct.id) AS last_chat_id
//     FROM chat_tbl ct
//     GROUP BY ct.id
// ) AS subquery ON u.id = subquery.id
// LEFT JOIN chat_tbl c ON subquery.last_chat_id = c.id
// ORDER BY c.id;
// SELECT fr.id,  u.username, fr.request_id, fr.my_id, fr.accept_status, c.contents FROM friend_request fr INNER JOIN users u ON u.id = (fr.request_id OR fr.my_id) INNER JOIN (SELECT ct.id, MAX(ct.id) AS last_chat_id FROM chat_tbl ct GROUP BY ct.id) AS subquery ON u.id = subquery.id
// INNER JOIN chat_tbl c ON subquery.last_chat_id = c.id WHERE ((fr.request_id = 3 AND fr.my_id = 2) OR (fr.request_id = 2 AND fr.my_id = 3)) ORDER BY c.id

    }


?>
<!-- SELECT fr.*, u.*, m.* FROM users u LEFT JOIN friend_request fr ON u.id = fr.request_id OR fr.my_id -->
<!-- JOIN (SELECT c.*, MAX(c.timestamp) AS last_message_timestamp FROM chat_tbl c WHERE (c.request_id_c = 2 AND  c.sender_id = 7) OR (c.request_id_c = 7 AND  c.sender_id = 2) GROUP BY  c.id) m ON u.id = m.request_id_c WHERE (fr.request_id = 2 AND fr.my_id = 7 AND fr.accept_status = 1) OR (fr.request_id = 7 AND fr.my_id = 2 AND fr.accept_status = 1) ORDER BY m.last_message_timestamp DESC -->

<!-- JOIN (SELECT c.*, MAX(c.timestamp) AS last_message_timestamp FROM chat_tbl c WHERE (c.request_id_c = 2 AND  c.sender_id = 7) OR (c.request_id_c = 7 AND  c.sender_id = 2) GROUP BY  c.id) m ON u.id = m.request_id_c WHERE (fr.request_id = 2 AND fr.my_id = 7 AND fr.accept_status = 1) OR (fr.request_id = 7 AND fr.my_id = 2 AND fr.accept_status = 1) ORDER BY m.last_message_timestamp DESC -->
