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
            
            <div class="span-18 last clearfix form" id="report_missing_child_form">
                <form action="controller/report_missing.php" method="post">
	                <h2>Report a Missing Child</h2>
	                
	                <div class="section clearfix">
                        <h4 class="span-3">I have...</h4>
                        <div class="span-15 last">
                            <input type="radio" id="radio_lost_child" name="what_event" />
                            <label for="radio_lost_child">lost a child.</label>
                            <br/>
                            <input type="radio" id="radio_orphaned_child" name="what_event" />
                            <label for="radio_orphaned_child">found an orphaned child.</label>
                        </div>
                    </div>
	                
	                <fieldset class="span-18 last">
	                    <legend>Basic Information</legend>
	                
    	                <label class="span-3">Name:</label>
    	                <input type="text" class="title span-14" />
	                
    	                <label class="span-3">Gender:</label>
    	                <div class="span-6 last">
    	                    <input type="radio" name="gender" id="radio_gender_male_report"/>
        	                <label for="radio_gender_male_report">Male</label>
        	                <input type="radio" name="gender" id="radio_gender_female_report"/>
        	                <label for="radio_gender_female_report">Female</label>
        	            </div>
	                
    	                <label class="span-3 clear">Date of Birth:</label>
    	                <input type="text" name="dob" class="span-6" />

    	                <label class="span-3 clear">Age:</label>
    	                <input type="text" name="age" class="span-6" />
	                
    	                <label class="span-3 clear">Photos:</label>
    	                <a href="javacript: void(0);" class="span-15 last">Select</a>
    	            </fieldset>
	                
	                <fieldset class="span-18 last">
	                    <legend>Child's Home Address</legend>
	                
    	                <label class="span-3">Home, Street:</label>
    	                <input type="text" name="street" class="span-6" />
	                
    	                <label class="span-3 clear">Locality:</label>
    	                <input type="text" name="locality" class="span-6" >
	                
    	                <label class="span-3 clear">City:</label>
    	                <input type="text" name="city" class="span-6" />
	                
    	                <label class="span-3 clear">State:</label>
    	                <input type="text" name="state" class="span-6" >
	                
    	                <label class="span-3 clear">Country</label>
    	                <input type="text" name="country" class="span-6" >
    	            </fieldset>
	                
	                <fieldset class="span-18 last">
	                    <legend>Your Information</legend>
	                
    	                <label class="span-3">E-Mail Address:</label>
    	                <input type="text" name="reporter_email" class="span-6" />
	                
    	                <label class="span-3 clear">Full Name:</label>
    	                <input type="text" name="reporter_name" class="span-6" />
	                
    	                <label class="span-3 clear">Phone:</label>
    	                <input type="text" name="reporter_contact" class="span-6" />
    	                
    	                <div class="span-15 push-3 clear last no_bottom_space">
        	                <input type="checkbox" id="remember_contact_information" />
        	                <label for="remember_contact_information">Remember my contact information.</label>
        	            </div>
	                
    	                <div class="span-15 push-3 clear last no_bottom_space">
        	                <input type="checkbox" id="i_vounteer" />
        	                <label for"i_vounteer">I volunteer to help children living around my location get back to their homes.</label>
        	            </div>
    	            </fieldset>

	                <div class="section clearfix">
	                    <input type="submit" value="Submit" class="push-3 span-2 button" />
	                </div>
                </form>
            </div>
        </div>
    </body>
</html>