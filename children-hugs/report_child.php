<?php include 'controller/report_missing.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>
            Missing Children Finder
        </title>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            
            <?php include 'shared/includes.php'; ?>
        </head>
    </head>
    <body>
        <div class="container">

            <?php include 'shared/header.php'; ?>
            
            <?php include 'shared/left_pane.php'; ?>
            
            <?php
            	$result = $_REQUEST["user_request"]; 
            ?>
            
            <div class="span-18 middle_container last clearfix form" id="report_missing_child_form">
                <form action="report_child.php" method="post"  enctype="multipart/form-data">
                	<input type="hidden" name="form_action" value="REPORT_MISSING"/>
	                <h2>Report a Missing Child</h2>
	                
	                <div class="section clearfix intent">
                        <h4 class="span-3 text_right">I have...</h4>
                        <div class="span-15 last">
                            <input type="radio" id="radio_lost_child" name="child_status" value="LOST" <?php echo ($result["child_status"] =="LOST")?"checked":"";?>/>
                            <label for="radio_lost_child">lost a child.</label>
                            <br/>
                            <input type="radio" id="radio_orphaned_child" name="child_status" value="ORPHAN" <?php echo ($result["child_status"] =="ORPHAN")?"checked":"";?>/>
                            <label for="radio_orphaned_child">found an orphaned child.</label>
                            <span class="error_cstm" id="err_child_status"></span>                        
                        </div>                  
                    </div>
	                
	                <fieldset class="span-18 last">
	                    <legend>Basic Information</legend>
	                
    	                <label class="span-3 name">Name:</label>
    	                <input type="text" class="title span-14" name="child_name" value="<?php echo $result["child_name"];?>" />
	                	<span class="error_cstm" id="err_child_name"></span>
    	                <label class="span-3">Gender:</label>
    	                <div class="span-15 last">
        	                <div class="span-6 last float_all_left clearfix gender">
        	                    <input type="radio" name="gender" id="radio_gender_male_report" value="M" <?php echo ($result["gender"] =="M")?"checked":"";?>/>
            	                <label for="radio_gender_male_report">Male</label>
            	                <input type="radio" name="gender" id="radio_gender_female_report" value="F" <?php echo ($result["gender"] =="F")?"checked":"";?>/>
            	                <label for="radio_gender_female_report">Female</label>
            	                <span class="error_cstm" id="err_gender"></span>
            	            </div>
            	        </div>
            	        
    	                <label class="span-3 clear">Date of Birth:</label>
    	                <div class="span-15 last">
    	                    <input type="text" name="dob" class="span-6" value="<?php echo $result["dob"];?>" />    	                    
    	                </div>
    	                <span class="error_cstm" id="err_dob"></span>

    	                <label class="span-3 clear">Age:</label>
    	                <div class="span-15 last">
    	                    <input type="text" name="age" class="span-6" value="<?php echo $result["age"];?>" />
    	                </div>
    	                <span class="error_cstm" id="err_age"></span>
    	                
    	                <label class="span-3 clear">Missing Since:</label>
    	                <div class="span-15 last">
    	                    <input type="text" name="missing_since" class="span-6" value="<?php echo $result["missing_since"];?>" />
    	                </div>
    	                <span class="error_cstm" id="err_missing_since"></span>
	                
    	                <label class="span-3 clear">Photos:</label>
    	                <input type="file" name="child_photo"/>
    	            </fieldset>
	                
	                <fieldset class="span-18 last">
	                    <legend id="child_address_title">Child's Home Address</legend>
	                
    	                <label class="span-3">Home, Street:</label>
    	                <div class="span-15 last">
    	                    <input type="text" name="street" class="span-6" value="<?php echo $result["street"];?>"/>
    	                </div>
    	                <span class="error_cstm" id="err_street"></span>
	                
    	                <label class="span-3 clear">Locality:</label>
    	                <div class="span-15 last">
    	                    <input type="text" name="locality" class="span-6" value="<?php echo $result["locality"];?>" >
    	                </div>
    	                <span class="error_cstm" id="err_locality"></span>
	                
    	                <label class="span-3 clear">City:</label>
    	                <div class="span-15 last">
    	                    <input type="text" name="city" class="span-6" value="<?php echo $result["city"];?>"/>
    	                </div>
    	                <span class="error_cstm" id="err_city"></span>
	                
    	                <label class="span-3 clear">State:</label>
    	                <div class="span-15 last">
    	                    <input type="text" name="state" class="span-6" value="<?php echo $result["state"];?>">
    	                </div>
    	                <span class="error_cstm" id="err_state"></span>
	                
    	                <label class="span-3 clear">Country:</label>
    	                <div class="span-15 last">
    	                    <input type="text" name="country" class="span-6" value="<?php echo $result["country"];?>" >
    	                </div>
    	                <span class="error_cstm" id="err_country"></span>
    	            </fieldset>
	                
	                <fieldset class="span-18 last">
	                    <legend>Your Information</legend>
	                
    	                <label class="span-3">E-Mail Address:</label>
    	                <div class="span-15 last">
    	                    <input type="text" name="reporter_email" class="span-6" value="<?php echo $result["reporter_email"];?>"/>
    	                </div>
    	                <span class="error_cstm" id="err_reporter_email"></span>
	                
    	                <label class="span-3 clear">Full Name:</label>
    	                <div class="span-15 last">
    	                    <input type="text" name="reporter_name" class="span-6" value="<?php echo $result["reporter_name"];?>"/>
    	                </div>
    	                <span class="error_cstm" id="err_reporter_name"></span>
	                
    	                <label class="span-3 clear">Phone:</label>
    	                <div class="span-15 last">
    	                    <input type="text" name="reporter_contact" class="span-6" value="<?php echo $result["reporter_contact"];?>"/>
    	                </div>
    	                <span class="error_cstm" id="err_reporter_contact"></span>
    	                
    	                <div class="span-15 push-3 clear last no_bottom_space">
        	                <input type="checkbox" id="remember_contact_information" name="keep_my_contact"  <?php echo ($result["keep_my_contact"] =="on")?"checked":"";?>/>
        	                <label for="remember_contact_information">Remember my contact information.</label>
        	            </div>
	                
    	                <div class="span-15 push-3 clear last no_bottom_space">
        	                <input type="checkbox" id="i_vounteer" name="i_vounteer" <?php echo ($result["i_vounteer"] =="on")?"checked":"";?>/>
        	                <label for"i_vounteer">I volunteer to help children living around my location get back to their homes.</label>
        	            </div>
        	            
        	            <div class="span-15 push-3 clear last no_bottom_space">
        	             	<?php include 'shared/captcha.php'; ?>   
        	            </div>
    	            </fieldset>
					
	                <div class="section clearfix">
	                    <input type="submit" value="Submit" class="push-3 span-2 button" />
	                </div>
                </form>
            </div>
        </div>
        <?php include 'shared/errors_to_browser.php'; ?>
    </body>
</html>