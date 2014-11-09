<?php
	require_once '../model/GetTopicsList.php';
	require_once '../model/EventList.php';
    require_once '../model/UserEvent.php';
    require_once '../model/UserQuestion.php';
     require_once '../model/TopicsTime.php';
?>

<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VT Knowledge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?= SERVER_PATH ?>/public/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?= SERVER_PATH ?>/public/css/custom.css" rel="stylesheet">
      
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">


  </head>
    
  <body>

<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
        
       <br>

      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><strong><?php foreach ($userList as $user){ if(($_SESSION['id'])==$user->get('id')) print $user->get('firstName'); }?>
                   <?php foreach ($userList as $user){ if(($_SESSION['id'])==$user->get('id')) print $user->get('lastName'); }?></strong></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>
               
                <div class=" col-md-9 col-lg-9 "> 
                               
                 
                  <table class="table table-user-information">
                    <tbody>
                      
                      <tr>
                        <td><strong>Background</strong>:</td>
                        <td><?php foreach ($userList as $user){ if(($_SESSION['id'])==$user->get('id')) print $user->get('description'); }?></td>
                      </tr>
                      <tr>
                        <td><strong>Topics of Interest: </strong></td>
                        <td>  <?php $list = TopicList::getTopicListById($_SESSION['id']);
                  	for ($i = 0; $i < count($list); $i++) {
                  
			print($list[$i]->getTopicName() . "<br>");
			} ?> </td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td><strong>Gender : </strong></td>
                        <td><?php foreach ($userList as $user){ if(($_SESSION['id'])==$user->get('id')) print $user->get('gender'); }?></td>
                      </tr>
                       
                      
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="<?= SERVER_PATH ?>editProfile" class="btn btn-primary" id="editProfileButton" name="editProfileButton">Edit Profile</a>
                  
                </div>
              </div>
            </div>
               
            
          </div>
        </div>
        
      </div>
   	 <h3>Recent Activity</h3>
    
  

    
          <!-- TOPICS ADDED -->
    
     <p>&nbsp; &nbsp; <h4>Topics added are <label class="label label-info"><?php $list = TopicList::getTopicListById($_SESSION['id']);
                  	for ($i = 0; $i < count($list); $i++) {
                  
			print($list[$i]->getTopicName() . ",");
			} ?> </label></h4	></p> <p>
<?php  
   $userTime = TopicsTime::getTopicTime($_SESSION['id']);
     echo '<span class="byline">'.date("M j, g:i a", strtotime($userTime[0]->getWhen())).'</span>'; 

?>


</p>


<!-- ANSWER POSTED ---> 
<p>
<?php 
$username = UserEvent::getUserById($_SESSION['id']);
$user = EventList::getEventListById($_SESSION['id']);
 for ($i = 0; $i < count($username); $i++) {
    
                                echo '<p>&nbsp; &nbsp; <h4>Answer was posted by  <label class="label label-info">' .$username[$i]->getUser(). '</label>to your question</h4>';
                echo '<span class="byline">'.date("M j, g:i a", strtotime($username[$i]->getUserTime())).'</span>';                    
}
?>
</p>  
    


<!-- Questions POSTED--->

<p>
<?php 
$username1 = UserQuestion::getUserQuestion($_SESSION['id']);
 for ($i = 0; $i < count($username1); $i++) {
    
                                echo '<p>&nbsp; &nbsp; <h4>You asked a Question to  <label class="label label-info">' .$username1[$i]->getUser(). '</label></h4>';
     echo '<span class="byline">'.date("M j, g:i a", strtotime($username1[$i]->getUserTime())).'</span>';
                                        
 
}?></p>

                
    

<!-- FIRST NAME , LAST NAME -->
<p>
        <?php 

              $user = EventList::getEventListById($_SESSION['id']);
                    for ($i = 0; $i < count($user); $i++) {
                         if ($user[$i]->getEventTypeId()==1){
                                echo '<p>&nbsp; &nbsp; <h4>Changed First Name from <label class="label label-info">' .$user[$i]->getOldData() .'</label> to <label class="label label-info">' . $user[$i]->getNewData(). '</h4>';
                                     
                            echo '<span class="byline">'.date("M j, g:i a", strtotime($user[$i]->getTime())).'</span>';
}
                    else if ($user[$i]->getEventTypeId()==2){
                                echo '<p>&nbsp; &nbsp; <h4>Changed Last Name from <label class="label label-info">' .$user[$i]->getOldData(). '</label> to <label class="label label-info">' . $user[$i]->getNewData() . '</h4>';
                                       echo '<span class="byline">'.date("M j, g:i a", strtotime($user[$i]->getTime())).'</span>'; 
}


}

?>
   
</p>

    
    
    	<!-- <p>&nbsp; &nbsp; <h4>Changed FirstName from <label class="label label-info"><?php $user = EventList::getEventListById($_SESSION['id']);  if((($_SESSION['id'])==($user->user_id1)) && ($user->event_type_id == 1)) echo ($user->data_1); ?></label> to <label class="label label-info"> 
    	  <?php $user = EventList::getEventListById($_SESSION['id']);  if(($_SESSION['id'])==htmlentities($user->user_id1)) print htmlentities($user->data_2); ?></label>
    	  </h4	></p><h5>@ <?php  date_default_timezone_set('America/New_York'); $time = time(); $date = date('M j, g:i a',$time); print $date; ?></h5>
    	  
    	  <p>&nbsp; &nbsp; <h4>Changed LastName from <label class="label label-info"> <?php $user = EventList::getEventListById($_SESSION['id']); if((($_SESSION['id'])==($user->user_id1)) && ($user->event_type_id == 2)) print ($user->data_1); ?> </label> to <label class="label label-info">
    	  <?php $user = EventList::getEventListById($_SESSION['id']); if(($_SESSION['id'])==($user->user_id1)) print ($user->data_2); ?></label>
    	  </h4	></p><h5>@ <?php  date_default_timezone_set('America/New_York'); $time = time(); $date = date('M j, g:i a',$time); print $date; ?></h5>
    	  
    	  <p>&nbsp; &nbsp; <h4>Topics added are <label class="label label-info"><?php $list = TopicList::getTopicListById($_SESSION['id']);
                  	for ($i = 0; $i < count($list); $i++) {
                  
			print($list[$i]->getTopicName() . ",");
			} ?> </label></h4	></p><h5>@ <?php  date_default_timezone_set('America/New_York'); $time = time(); $date = date('M j, g:i a',$time); print $date; ?></h5>  -->
    
	<!--	<p>&nbsp; &nbsp; <h4>Changed FirstName from <label class="label label-info">
    
    
    <?php $user = EventList::getEventListById($_SESSION['id']);  

if((($_SESSION['id'])==($user[0]->getUserID1())) && ($user[0]->getEventTypeID() == 1))

        echo ($user->data_1); ?></label> to <label class="label label-info"> 
    	  <?php $user = EventList::getEventListById($_SESSION['id']);

        if(($_SESSION['id'])==($user->user_id1)) 
        print ($user->data_2); ?></label>
    	  </h4	></p>
<!--<h5>@ <?php  date_default_timezone_set('America/New_York'); $time = time(); $date = date('M j, g:i a',$time); print $date; ?></h5>
    	<h5>@ <?php  date_default_timezone_set('America/New_York'); $time = time(); $date = date('M j, g:i a',$time); print $date; ?></h5>  


    	  <p>&nbsp; &nbsp; <h4>Changed LastName from <label class="label label-info"> <?php $user = EventList::getEventListById($_SESSION['id']); if((($_SESSION['id'])==($user->user_id1)) && ($user->event_type_id == 2)) print ($user->data_1); ?> </label> to <label class="label label-info">
    	  <?php $user = EventList::getEventListById($_SESSION['id']); if(($_SESSION['id'])==($user->user_id1)) print ($user->data_2); ?></label>
    	  </h4	></p><h5>@ <?php  date_default_timezone_set('America/New_York'); $time = time(); $date = date('M j, g:i a',$time); print $date; ?></h5>
    	  


    	  <p>&nbsp; &nbsp; <h4>Topics added are <label class="label label-info"><?php $list = TopicList::getTopicListById($_SESSION['id']);
                  	for ($i = 0; $i < count($list); $i++) {
                  
			print($list[$i]->getTopicName() . ",");
			} ?> </label></h4	></p><h5>@ <?php  date_default_timezone_set('America/New_York'); $time = time(); $date = date('M j, g:i a',$time); print $date; ?></h5>  -->
    	
    	  
  
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= SERVER_PATH ?>/public/js/bootstrap.min.js"></script>
    <script src="<?= SERVER_PATH ?>/public/js/script.js"></script>
    </body>
</html>