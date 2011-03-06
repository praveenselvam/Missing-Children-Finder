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
            
            <div class="span-6 border">
                <?php include 'shared/child_search_form.php'; ?>
                <hr/>
                <?php include 'shared/report_missing_child.php'; ?>
            </div>
            <div class="span-18 last">
                <form action="controller/report_missing.php" method="post">
	                <h2>Report a Missing Child</h2>
	                
	                <label>I have...</label>
	                <input type="radio" id="radio_lost_child" name="what_event" />
	                <label for="radio_lost_child">lost a child.</label>
	                <input type="radio" id="radio_orphaned_child" name="what_event" />
	                <label for="radio_orphaned_child">found an orphaned child.</label>
	                
	                <h4>Basic Information</h4>
	                
	                <label>Name:</label>
	                <input type="text" class="title" />
	                
	                <label>Gender:</label>
	                <input type="radio" name="gender" id="radio_gender_male_report"/>
	                <label for="radio_gender_male_report">Male</label>
	                <input type="radio" name="gender" id="radio_gender_female_report"/>
	                <label for="radio_gender_female_report">Female</label>
	                
	                <label>Date of Birth:</label>
	                <input type="text" name="dob"/>
	                <label>(OR)</label>
	                <label>Age:</label>
	                <input type="text" name="age"/>
	                
	                <label>Photos:</label>
	                <a href="javacript: void(0);">Select</a>
	                
	                <h4>Child's Home Address</h4>
	                
	                <label>Home, Street:</label>
	                <input type="text" name="street"/>
	                
	                <label>Locality:</label>
	                <input type="text" name="locality">
	                
	                <label>City:</label>
	                <input type="text" name="city">
	                
	                <label>State:</label>
	                <input type="text" name="state">
	                
	                <label>Country</label>
	                <input type="text" name="country">
	                
	                <h4>Your Information</h4>
	                
	                <label>E-Mail Address:</label>
	                <input type="text" name="reporter_email"/>
	                
	                <label>Full Name:</label>
	                <input type="text" name="reporter_name">
	                
	                <label>Phone:</label>
	                <input type="text" name="reporter_contact">
	                
	                <input type="checkbox" id="remember_contact_information" />
	                <label for="remember_contact_information">Remember my contact information.</label>
	                
	                <input type="checkbox" id="i_vounteer" />
	                <label for"i_vounteer">I volunteer to help children living around my location get back to their homes.</label>
	                
	                <input type="submit" value="Submit" />
                </form>
            </div>
        </div>
    </body>
</html>