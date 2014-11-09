
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VT Knowledge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
      <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/custom.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  </head>
    
  <body>
            
<div class="container">
         <form method="POST" action=""> 
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" alt="" class="img-circle img-responsive">
          <!--<h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control"> -->
            <br />
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
          <!--alert -->
       <!-- <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div> -->
         <!-- <p class="errorMessage">
                    <?php
                    if($errorMessage != '') {
                        print($errorMessage); 
                    }
                    ?> -->
          
        <h3>Personal info</h3>
         
       <!-- <form class="form-horizontal" > -->
            
            <!--First Name -->
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name"  required autofocus/>
            </div>
          </div>
            
            <!--Last Name -->
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last name"  required />
                
            </div>
          </div>
            
            <!-- gender -->
        <div class="form-group">
           <div class="row"> 
        <label class="col-lg-3 control-label">&nbsp; &nbsp; Gender:</label>
            <div class="col-lg-8">
        <label class="radio-inline" style="font-family:Oswald">&nbsp; &nbsp; 
          <input name="gender" id="male" value="Male" type="radio"> Male
        </label>
        <label class="radio-inline" style="font-family:Oswald">&nbsp; &nbsp; 
          <input name="gender" id="female" value="Female" checked="checked" type="radio">Female
        </label>
        <label class="radio-inline" style="font-family:Oswald">&nbsp; &nbsp; 
          <input name="gender" id="other" value="other" type="radio">Don't want to disclose
        </label>
        </div>
           </div> 
            </div>
            
            <!--Background -->
        <div class="form-group">
               <label class="col-lg-3 control-label">Background:</label>
            <div class="col-lg-8">
                        <textarea name="description" class="form-control input-lg" rows="3" placeholder="Describe Yourself"></textarea>
            </div>
        </div>
            
            <!--Topics of Interest-->
         <div class="form-group">
              <label class="col-lg-3 control-label">Topics of Interest: </label>
            <div class="col-lg-8"> &nbsp; 
            <div class="btn-group btn-input clearfix">  
                                <select name="topic_id" class="selectpicker show-tick form-control" data-live-search="true" required>
  									<option value="">Topic 1</option>
  									<?php foreach ($topics as $topic): ?>
  									<option value="<?php echo htmlentities($topic->id); ?>"><?php echo htmlentities($topic->name); ?></option>
  									<?php endforeach; ?>
								</select>
								<br />
                
								<select name="topic_id1" class="form-control" required>
  									<option value="">Topic 2</option>  <!-- for dynamic generation of drop down list -->
  									<?php foreach ($topics as $topic): ?>
  									<option value="<?php echo htmlentities($topic->id); ?>"><?php echo htmlentities($topic->name); ?></option>
  									<?php endforeach; ?>
								</select>
								<p><br></p>
            </div>
        </div>
            </div>
            
            <!--User Name -->
      <!-- <div class="form-group">
            <label class="col-md-3 control-label">VT Email ID:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="username" id="username" placeholder="VT Email ID"  />
            </div>
          </div> -->
            
            <!-- New Password-->
          <div class="form-group">
            <label class="col-md-3 control-label">New Password:</label>
            <div class="col-md-8">
              <input class="form-control" name="pass" placeholder="Password" type="password" id="pass" required />
                <p>Use at least one lower case letter, one upper case letter, one numeral, and eight characters</p>
                
            </div>
          </div>
            
            
             <!-- Confirm New Password-->
        <div class="form-group">
            <label class="col-md-3 control-label">Confirm New password:</label>
            <div class="col-md-8">
              <input class="form-control" name="reenterpass" placeholder="Confirm Password" type="password" id="reenterpass" required/>
                
                    
            </div>
        </div> 
            
         
      <!--  </form> -->
          
      </div>
  </div>
          
      <div class="form-group"> 
           <label class="col-md-3 control-label"></label> 
            <div class="col-md-8">
             
                <button type="submit"  class="btn btn-default">	<a href="<?= SERVER_PATH ?>"  >Cancel</a>	</button>
           <!-- <a href="<?= SERVER_PATH ?>publicProfile" name="form-submitted" class="btn btn-primary">Save Changes</a>-->
              <input name="form-submitted" type="submit" class="btn btn-primary" value="Save Changes" />  
            </div> 
             
          </div> 
    </form>
      </div>
      
      
          
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= SERVER_PATH ?>/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= SERVER_PATH ?>public/js/script.js"></script>
    </body>
</html>