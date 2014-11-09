<?php

class TopicList {
	private $name;
	function __construct($name) {
		$this->name = $name;
		#print("Name = ". $name);
	}
	
	public function getTopicName() {
		return $this->name;
	}
	
	public static function getTopicListById($id) {
		if (!mysql_connect("127.0.0.1", "root", "")) {
			throw new Exception("Connection to the database server failed!");
		} else {
			#print("SUCCESSFUL");
		}
		
		if (!mysql_select_db("mydb")) {
			throw new Exception("No mydb database found on database server.");
		}
		//$id = 4;
		$query = "select name from topic where id = (select topic_id from user where id=" . $id . ") or id = (select topic_id1 from user where id=" . $id .')';
		#print("<br>");
		#print($query);
		#print("<br>");
		$result = mysql_query($query);
		$list = [];
		while ($row = mysql_fetch_assoc($result)) {
			$list[] = new TopicList($row['name']);
		}
		
		/*for ($i = 0; $i < count($list); $i++) {
			print("My topic is ". $list[$i]->getTopicName());
			#print(count($list));
		}*/
		return $list;
		
	}
}