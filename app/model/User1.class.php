<?php

require_once 'UserGateway.class.php';
require_once 'ValidationException.class.php';
 
class User1{

private $userGateway    = NULL;

private function openDb() {
if (!mysql_connect("127.0.0.1", "root", "")) {
throw new Exception("Connection to the database server failed!");
}
if (!mysql_select_db("mydb")) {
throw new Exception("No mydb database found on database server.");
}
}

private function closeDb() {
mysql_close();
}

public function __construct() {
$this->userGateway = new userGateway();
}

/*public function getAllQuestions($order) {
		try {
				$this->openDb();
				$res = $this->userGateway->selectAll($order);
				$this->closeDb();
				return $res;
				} catch (Exception $e) {
				$this->closeDb();
				throw $e;
				}
}*/

 public function gettopics($order) {
		try {
				$this->openDb();
				$res = $this->userGateway->selectTopics($order);
				$this->closeDb();
				return $res;
				} catch (Exception $e) {
				$this->closeDb();
				throw $e;
				}   
    
     }
    
       public function getDesc($order) {
		try {
				$this->openDb();
				$res = $this->userGateway->selectDesc($id);
				$this->closeDb();
				return $res;
				} catch (Exception $e) {
				$this->closeDb();
				throw $e;
				}   
    
     }

 public function getAllUsers($id) {
		try {
				$this->openDb();
				$res = $this->userGateway->selectAll($id);
				$this->closeDb();
				return $res;
				} catch (Exception $e) {
				$this->closeDb();
				throw $e;
				}   
    
}
    
     public function editUser($id,$fName,$lName,$desc,$password,$gender,$topic_id,$topic_id1) {
         
    		
            try {
                $this->openDb();
               $res= $this->userGateway->update($id,$fName,$lName,$desc,$password,$gender,$topic_id,$topic_id1);
                
               $this->closeDb();
				return $res;
            } catch (Exception $e) {
                $this->closeDb();
                throw e;
            }
     }
    
   /*  public function getAllEvents($id) {
		try {
				$this->openDb();
                $res = array();
				$res[] = $this->userGateway->selectAllEvents($id);
				$this->closeDb();
				return $res;
				} catch (Exception $e) {
				$this->closeDb();
				throw $e;
				}   
    
     }*/
}