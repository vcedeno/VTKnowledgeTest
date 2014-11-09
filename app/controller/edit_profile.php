<?php
require_once '../global.php';

$pageName = 'Edit Profile';

if(isset($_SESSION['user'])) {
require_once '../view/header.tpl';
require_once '../view/footer.tpl';

class editprofileController{
    private $contactsService = NULL;
     
    public function __construct() {
        $this->contactsService = new User1();
        $this->contactsService2 = new Topic();
       // $this->contactsService3 = new Event();
    }
    
    public function redirect($location) {
        //header('Location: '.$location);
    }
     
    public function handleRequest() {
        $op = isset($_GET['op'])?$_GET['op']:NULL;
        try {
           // if ( !$op || $op == 'list' ) {
            if ( !$op){
                $this->saveProfile();
            
            //}  elseif ( $op == 'new'   ) {
                //$this->saveQuestion();
           // } elseif ( $op == 'delete' ) {
                //$this->deleteTopic();
          //  } elseif ( $op == 'show' ) {
                //$this->showProfile();
            } else {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
           }
        } catch ( Exception $e ) {
            // some unknown Exception got through here, use application $id ='';error page to display it 
            $this->showError("Application error", $e->getMessage());
        }
    }
        
   public function saveProfile(){
        $title = 'Edit Profile';
        $id ='';
        $fName ='';
        $lName ='';
        $gender ='';
        $desc ='';
       // $user ='';
        $pass ='';
       // $image ='';
        $topic_id ='';
        $topic_id1 ='';
        
        $error =array();
        
        if (isset($_POST['form-submitted']) && isset($_SESSION['user'])){
        	
        	//$id = isset($_POST['id']) ?   $_POST['id']  :NULL;
           $id = isset($_SESSION['id']) ?   $_SESSION['id']  :NULL;
            $fName = isset($_POST["first_name"]) ?   $_POST["first_name"]  :NULL;
            $lName = isset($_POST["last_name"])?   $_POST["last_name"] :NULL;
            $gender = isset($_POST["gender"]) ?   $_POST["gender"]  :NULL;
            $desc = isset($_POST["description"])?   $_POST["description"] :NULL;  
           $user = isset($_POST["user"]) ?   $_POST["user"]  :NULL;
            $password = isset($_POST["pass"])?   $_POST["pass"] :NULL;
           // $image = isset($_POST["image"]) ?   $_POST["image"]  :NULL;
            $topic_id = isset($_POST["topic_id"])?   $_POST["topic_id"] :NULL;
            $topic_id1 = isset($_POST["topic_id1"])?   $_POST["topic_id1"] :NULL;
            
            try {
            //  $oldlist = $this->contactsService->getAllUsers($id);
        $oldlist =  User::loadByUsername($user);
       // print($oldlist);
              $this->contactsService->editUser($id,$fName,$lName,$desc,$password,$gender,$topic_id,$topic_id1);
              // $this->contactsService3->insertEvent($event_type_id,$user_id1,$data_1,$data_2,$when_happened);
                return $oldlist;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
            
        }
      //   $userList = EditUser::loadEditUsers();
         $topics = $this->contactsService2->getAllTopics("name");
        require_once '../view/Private_profile.tpl';
     
    }
    
    public function showError($title, $message) {
        include '../view/error.tpl';
    }
      
    
    public function showProfile(){
         $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }
        
        if ( isset($_POST['form-edit']) ){

        	$id = isset($_POST["editTopicID"]) ?   $_POST["editTopicID"]  :NULL;
            $name = isset($_POST["editTopicName"]) ?   $_POST["editTopicName"]  :NULL;
        	$desc = isset($_POST["editTopicDesc"])?   $_POST["editTopicDesc"] :NULL;
         
        	try {
              //  $this->contactsService->editTopic($id,$name, $desc);
                $this->listTopics();
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
            
        }
        $topic = $this->contactsService->getTopic($id);
        
        include '../controller/view_topic.php';
        
    }
    
        
    
}
$controller2 = new editprofileController();
 
$controller2->handleRequest();

}


else
{
	require_once '../view/home.tpl';
}

?>
