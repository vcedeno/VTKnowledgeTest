<?php

class TopicsTime {
	private $when_happened;
   
        
	function __construct($when_happened) {
		$this->when_happened = $when_happened;
       
	}
    
   public function getWhen() {
		return $this->when_happened;
	}
    
   
		
	public static function getTopicTime($id) {
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
	
        $query = "select when_happened from event where user_id1 = " . $id . " and event_type_id=3 ORDER BY when_happened DESC LIMIT 1";
        //event_type_id,user_id1,data_1,data_2,when_happened
		#print("<br>");
       // print($query);
		#print("<br>");
		$result = mysql_query($query);
		$userTime = [];
		while ($row = mysql_fetch_assoc($result)) {
			$userTime[] = new TopicsTime($row['when_happened']);
         
		}
		
		/*for ($i = 0; $i < count($list); $i++) {
			print("My topic is ". $list[$i]->getTopicName());
			#print(count($list));
		}*/
       // print_r $userTime;
		return $userTime;
		
	}
}

?>
