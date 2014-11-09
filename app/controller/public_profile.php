<?php
require_once '../global.php';


$pageName = 'Public Profile';

/*Verify if the user has a session to show login or homepage*/
if(isset($_SESSION['user'])) {

require_once '../view/header.tpl';


require_once '../view/footer.tpl';
// require_once '../view/public_profile.tpl';

class publicProfileController{
    private $contactsService = NULL;
    private $contactsService2 = NULL;
    private $contactsService3 = NULL;
     
    public function __construct() {
      //  $this->contactsService = new Edituser1();
        $this->contactsService2 = new Topic();
       $this->contactsService3 = new User();
        $this->contactsService = new User1();
    }
    
    public function redirect($location) {
        //header('Location: '.$location);
    }
     
    public function handleRequest() {
     $id = isset($_GET['id'])?$_GET['id']:NULL;
       /* if ( !$id ) {
            throw new Exception('Internal error.');
        }
      /*  $op = isset($_GET['op'])?$_GET['op']:NULL;
        try {
            if ( !$op || $op == 'list' ) {
                $this->saveProfile();
                
            }  elseif ( $op == 'new'   ) {
                //$this->saveQuestion();
            } elseif ( $op == 'delete' ) {
                //$this->deleteTopic();
            } elseif ( $op == 'show' ) {
                $this->showProfile();
            } else {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
        } catch ( Exception $e ) {
            // some unknown Exception got through here, use application error page to display it 
           
           $this->showError("Application error", $e->getMessage());
        }*/
        
         //load all the edit users
              // $userEditList = Edituser1::loadEditUsers();
           $userList = User::loadUsers();
        
      //  $eventList = $this->contactsService->getAllEvents($_SESSION['id']);
       // echo sizeOf($eventList);
        //echo array_values($eventList);
            //  $userList = $this->contactsService3 -> getAllUsers($id);
                //load all the topics
        		$topics = $this->contactsService2->getAllTopics("name");
        require_once '../view/public_profile.tpl';
    }
        
 /*   public function saveProfile(){
        $title = 'Public Profile';
        
        $fName ='';
        $lName ='';
        $gender ='';
        $desc ='';
        $user ='';
        $password ='';
        $image ='';
        $topic_id ='';
        $topic_id1 ='';
        
        $error =array();
        
        $desc = $this->contactsService->getDesc("name");
       
         $topics = $this->contactsService2->getTopics("name");
      
     
    }*/
    
    public function showError($title, $message) {
        include '../view/error.tpl';
    }
}
   $controller3 = new publicProfileController();
 
	$controller3->handleRequest();
}
else
{
	require_once '../view/login.tpl';
} 
    
?>            