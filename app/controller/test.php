<?php

require_once '../model/GetTopicsList.php';
	require_once '../model/GetEventListById.php';


?>

<html>

<body>
    
<p> Hello World</p>    
    
    <p>Topics of Interest: </p>
                        <p>  <?php $list = TopicList::getTopicListById($id=4);
                  	for ($i = 0; $i < count($list); $i++) {
                  
			print($list[$i]->getTopicName() . "<br>");
			} ?> </p>
    
    <p>Data 1</p>
    <p><?php $user = EventList::getEventListById($id=4);

   // print "hello";
for ($i = 0; $i < count($user); $i++) {
    
    if ( $id == 4  && $user[$i]->getEventTypeId()==1){
      
    print($user[$i]->getOldData()."<br>");
            
}
    else if( $id == 4 && $user[$i]->getEventTypeId() ==2){
        print ($user[$i]->getOldData()."<br>");
}
    else{
        print ($user[$i]->getNewData()."<br>");
}
    
}
        ?>
</p>

    
    </body>
</html>