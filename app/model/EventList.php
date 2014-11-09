<?php

class EventList {
	private $event_type_id;
    private $user_id1;
    private $user_id2;
    private $data_1;
    private $data_2;
    private $when_happened;
        
	function __construct($event_type_id, $user_id1,$user_id2,$data_1,$data_2,$when_happened) {
		$this->event_type_id = $event_type_id;
        $this->user_id1 = $user_id1;
        $this->user_id2 = $user_id2;
        $this->data_1 = $data_1;
        $this->data_2 = $data_2;
        $this->when_happened = $when_happened;
		//print("Name = ". $event_type_id);
	}
    
   public function getEventTypeID() {
		return $this->event_type_id;
	}
    
    public function getUserID1(){
        return $this->user_id1;
    }
	
	  public function getUserID2(){
        return $this->user_id2;
    }
	
      public function getOldData(){
         return $this->data_1;
    }
	
       public function getNewData(){
          return $this->data_2;
    }
    
       public function getTime(){
          return $this->when_happened;
    }
		
	public static function getEventListById($id) {
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
	
        $query = "SELECT * FROM event where user_id1= " . $id . " ORDER BY when_happened DESC LIMIT 15";
        //event_type_id,user_id1,data_1,data_2,when_happened
		#print("<br>");
       // print($query);
		#print("<br>");
		$result = mysql_query($query);
		$eventList = [];
		while ($row = mysql_fetch_assoc($result)) {
			$eventList[] = new EventList($row['event_type_id'],$row['user_id1'],$row['user_id2'],$row['data_1'],$row['data_2'],$row['when_happened']);
         //print_r $eventList;
		}
		
		/*for ($i = 0; $i < count($list); $i++) {
			print("My topic is ". $list[$i]->getTopicName());
			#print(count($list));
		}*/
		return $eventList;
		
	}
}

?>
