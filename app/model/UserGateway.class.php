<?php
 
/**
 * User data gateway.
 * 
 */
class UserGateway {
	
     public function selectAll($id) {
    	if ( !isset($id) ) {
    		$id = "NULL";
    	}
    	$dbId =  mysql_real_escape_string($id);
    	$dbres = mysql_query("SELECT * FROM user where id= $dbId ORDER BY $dbId ASC");
        
        
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            
            $list = $obj;
        }
         
        return $list;
    }   
    
   
 /*public function selectAll($order) {
        if ( !isset($order) ) {
            $order = "name";
        }
        $dbOrder =  mysql_real_escape_string($order);
        $dbres = mysql_query("SELECT names FROM topic ORDER BY $dbOrder ASC");
         
        $topics = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $topics[] = $obj;
        }
         
        return $topics;
    }
    
    /* public function selectAllUser($order) {
        if ( !isset($order) ) {
            $order = "user";
        }
        $dbOrder =  mysql_real_escape_string($order);
        //return the topics ordered in asc by $order
        
        $dbres = mysql_query("SELECT * FROM user ORDER BY $dbOrder ASC");
         
        $users = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $users[] = $obj;
        }
         
        return $users;
    }*/
    
    
    /*public function selectTopics($order) {
        if ( !isset($order) ) {
            $order = "name";
        }
        $dbOrder =  mysql_real_escape_string($order);
        //return the topics ordered in asc by $order
        
        $dbres = mysql_query("SELECT topic_id,topic_id1 FROM user ORDER BY $dbOrder ASC");
         
        $topics = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $topics[] = $obj;
        }
         
        return $topics;
        }
    
       public function selectDesc($id) {
        $dbId = mysql_real_escape_string($id);
         
        $dbres = mysql_query("SELECT description FROM user WHERE id=$dbId");
         
        return mysql_fetch_object($dbres);
           echo "Success";
         
    }

 /*public function update($fName, $lName,$desc,$user,$pass,$image,$gender,$topic_id,$topic_id1) {
         
      $dbId = ($id != NULL)?"'".mysql_real_escape_string($id)."'":'NULL';
      $dbfName = ($fName != NULL)?"'".mysql_real_escape_string($fName)."'":'NULL';
      $dblName = ($lName!= NULL)?"'".mysql_real_escape_string($lName)."'":'NULL';
      $dbDesc = ($desc != NULL)?"'".mysql_real_escape_string($desc)."'":'NULL';
      $dbUser = ($user != NULL)?"'".mysql_real_escape_string($user)."'":'NULL';
      $dbpass = ($pass != NULL)?"'".mysql_real_escape_string($pass)."'":'NULL';
      $dbImage = ($image!= NULL)?"'".mysql_real_escape_string($image)."'":'NULL';
      $dbGender = ($gender != NULL)?"'".mysql_real_escape_string($gender)."'":'NULL';
      $dbTopicid = ($topic_id!= NULL)?"'".mysql_real_escape_string($topic_id)."'":'NULL';
      $dbTopicid1 = ($topic_id1!= NULL)?"'".mysql_real_escape_string($topic_id1)."'":'NULL';
       
		
        mysql_query("update user set firstName=$dbfName, lastName =$dblName, description=$dbDesc, password=$dbpass, image=$dbImage, gender=$dbGender, topic_id=$dbTopicid, topic_id1=$dbTopicid1 where id=$dbId");
        
    }*/
    
 public function update($id,$fName,$lName,$desc,$password,$gender,$topic_id,$topic_id1) {
     
     // Get the old values
     $oldValues = $this->selectAll($id);
        // $id =5;
      $dbId = ($id != NULL)?"'".mysql_real_escape_string($id)."'":'NULL';
      $dbfName = ($fName != NULL)?"'".mysql_real_escape_string($fName)."'":'NULL';
      $dblName = ($lName!= NULL)?"'".mysql_real_escape_string($lName)."'":'NULL';
      $dbDesc = ($desc != NULL)?"'".mysql_real_escape_string($desc)."'":'NULL';
     // $dbUser = ($user != NULL)?"'".mysql_real_escape_string($user)."'":'NULL';
      $dbpass = ($password != NULL)?"'".mysql_real_escape_string($password)."'":'NULL';
     // $dbImage = ($image!= NULL)?"'".mysql_real_escape_string($image)."'":'NULL';
      $dbGender = ($gender != NULL)?"'".mysql_real_escape_string($gender)."'":'NULL';
      $dbTopicid = ($topic_id!= NULL)?"'".mysql_real_escape_string($topic_id)."'":'NULL';
      $dbTopicid1 = ($topic_id1!= NULL)?"'".mysql_real_escape_string($topic_id1)."'":'NULL';
       
		
        mysql_query("update user set firstName=$dbfName, lastName =$dblName, description=$dbDesc,password=$dbpass, gender=$dbGender,topic_id=$dbTopicid, topic_id1=$dbTopicid1 where id=$dbId");
        
        mysql_query("insert into event (event_type_id,user_id1,user_id2,data_1,data_2,when_happened) values(1,$oldValues->id,NULL,'$oldValues->firstName',$dbfName,now())");
        mysql_query("insert into event (event_type_id,user_id1,user_id2,data_1,data_2,when_happened) values(2,$oldValues->id,NULL,'$oldValues->lastName',$dblName,now())");
        mysql_query("insert into event (event_type_id,user_id1,user_id2,data_1,data_2,when_happened) values(3,$oldValues->id,NULL,'$oldValues->topic_id',$dbTopicid,now())");
        mysql_query("insert into event (event_type_id,user_id1,user_id2,data_1,data_2,when_happened) values(3,$oldValues->id,NULL,'$oldValues->topic_id1',$dbTopicid1,now())");
    }
    
    
    
 /* public function selectAllEvents($id) {
    	if ( !isset($id) ) {
    		$id = "NULL";
    	}
    	$dbId =  mysql_real_escape_string($id);
    	$dbres = mysql_query("SELECT * FROM event where user_id1= $dbId ORDER BY when_happened DESC LIMIT 8");
        
        $eventList=array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $eventList[] = $obj;
            print_r $eventList;
        }
         
        return $eventList;
    }  */
    
    
     /*  public function selectAllEvents($id) {
    	if ( !isset($id) ) {
    		$id = "NULL";
    	}
    	$dbId =  mysql_real_escape_string($id);
    	$query = "SELECT * FROM event where user_id1= $dbId ORDER BY when_happened DESC LIMIT 8";
        
        $eventList=array();
        while ( ($obj = mysql_fetch_assoc($dbres)) != NULL ) {
            $eventList[] = $obj;
        }
         
        return $eventList;
    } */ 
    
/*public function insert($fName,$lName,$desc,$user,$pass,$image,$gender,$topic_id,$topic_id1) {
         $image ="image";
           
      //$dbId = ($id != NULL)?"'".mysql_real_escape_string($id)."'":'NULL';
      $dbfName = ($fName != NULL)?"'".mysql_real_escape_string($fName)."'":'NULL';
      $dblName = ($lName!= NULL)?"'".mysql_real_escape_string($lName)."'":'NULL';
      $dbDesc = ($desc != NULL)?"'".mysql_real_escape_string($desc)."'":'NULL';
      $dbUser = ($user != NULL)?"'".mysql_real_escape_string($user)."'":'NULL';
      $dbpass = ($pass != NULL)?"'".mysql_real_escape_string($pass)."'":'NULL';
     // $dbImage = ($image!= NULL)?"'".mysql_real_escape_string($image)."'":'NULL';
      $dbGender = ($gender != NULL)?"'".mysql_real_escape_string($gender)."'":'NULL';
      $dbTopicid = ($topic_id!= NULL)?"'".mysql_real_escape_string($topic_id)."'":'NULL';
      $dbTopicid1 = ($topic_id1!= NULL)?"'".mysql_real_escape_string($topic_id1)."'":'NULL';


   $sql = mysql_query("INSERT INTO user (firstName,lastName,description,user,password,image,gender,topic_id,topic_id1) VALUES ($dbfName,$dblName,$dbDesc,$dbUser,$dbpass,$mysql_path,$dbGender,$dbTopicid,$dbTopicid1)");
   // $result = mysql_query($sql);
    echo $dbfName,$dblName,$dbDesc,$dbUser,$dbpass,$mysql_path,$dbGender,$dbTopicid,$dbTopicid1;
    echo $sql;
        if (!$sql) {
            die ("Can't Connect :" .mysql_error());
            echo " Cannot Insert" ;
        }

        echo "Successfully Saved!!!" ;
       // return mysql_insert_id();
        
    }
}*/
}

?>
