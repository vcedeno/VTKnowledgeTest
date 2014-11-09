<?php

class UserQuestion {
	private $user;
    private $when_happened;
   
        
	function __construct($user,$when_happened) {
		$this->user = $user;
       $this->when_happened =$when_happened;
	}
    
   public function getUser() {
		return $this->user;
	}
    
      public function getUserTime() {
		return $this->when_happened;
	}
   
		
	public static function getUserQuestion($id) {
		if (!mysql_connect("127.0.0.1", "root", "")) {
			throw new Exception("Connection to the database server failed!");
		} else {
			//print("SUCCESSFUL");
		}
		
		if (!mysql_select_db("mydb")) {
			throw new Exception("No mydb database found on database server.");
            #print("UNSUCCESSFUL");
		}
		//$id = 4;
	
        $query = "select u.user, e.when_happened from user u, event e
where u.id =e.user_id2 and e.user_id1= " .$id. " and e.event_type_id = 4
ORDER BY e.when_happened DESC LIMIT 15";
        //event_type_id,user_id1,data_1,data_2,when_happened
		#print("<br>");
       // print($query);
		#print("<br>");
		$result = mysql_query($query);
		$usersList = [];
		while ($row = mysql_fetch_assoc($result)) {
			$usersList[] = new UserQuestion($row['user'],$row['when_happened']);
         //print_r $eventList;
		}
		
		/*for ($i = 0; $i < count($list); $i++) {
			print("My topic is ". $list[$i]->getTopicName());
			#print(count($list));
		}*/
		return $usersList;
		
	}
}

?>
