<?php
	class MissingChildValidationRules {	
		public static $REPORT_CHILD_MISSING_MAP = array (
			"child_name" => array( 
								array (
									"regex" => "/^[a-z\sA-Z']+$/",
									"match" => "",
									"no_match" => "Please enter alphabets only, allowed special characters are ' and"
									   )
								),
			"gender" => array( 
								array (
									"regex" => "/^M|F$/i",
									"match" => "",
									"no_match" => "Wrong gender choice."
									  )
								),
			"dob" => array( 
							 array (
								"regex" => "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",
								"match" => "",
								"no_match" => "Invalid date of birth, use, year-month-day, e.g 2011-03-11, for March 11th 2011"
									)
						  ),
			"missing_since" => array( 
							 array (
								"regex" => "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/",
								"match" => "",
								"no_match" => "Invalid date, use, year-month-day, e.g 2011-03-11, for March 11th 2011"
									)
						  ),			  
			"age" => array( 
							array (
								"regex" => "/^[0-9]+$/",
								"match" => "",
								"no_match" => "Please specify your age"
							)
						),
			"street" => array( 
							array (
									"regex" => "/^[a-z\sA-Z'_]+$/",
									"match" => "",
									"no_match" => "Please enter alphabets only, allowed special characters are ' and _"
									   )
						),
																						
			"locality" => array( 
							array (
									"regex" => "/^[a-z\sA-Z'_]+$/",
									"match" => "",
									"no_match" => "Please enter alphabets only, allowed special characters are ' and _"
									   )
						),
			"city" => array( 
							array (
									"regex" => "/^[a-z\sA-Z'_]+$/",
									"match" => "",
									"no_match" => "Please enter alphabets only, allowed special characters are ' and _"
									   )
						),
			"state" => array( 
							array (
								"regex" => "/^[a-z\sA-Z'_]+$/",
								"match" => "",
								"no_match" => "Please enter alphabets only, allowed special characters are ' and _"
							)
						),
			"country" => array( 
							array (
									"regex" => "/^[a-z\sA-Z'_]+$/",
									"match" => "",
									"no_match" => "Please enter alphabets only, allowed special characters are ' and _"
									   )
						),
			"reporter_email" => array( 
							array (
								"regex" => "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",
								"match" => "",
								"no_match" => "Invalid email address"
							)
						),
			"reporter_name" => array( 
								array (
									"regex" => "/^[a-z\sA-Z'_]+$/",
									"match" => "",
									"no_match" => "Please enter alphabets only, allowed special characters are ' and _"
									 )	   
						),
			"reporter_contact" => array( 
							array (
								"regex" => "/^[0-9-]+|\s$/",
								"match" => "",
								"no_match" => "Invalid contact number, enter your contact number seperated by - if needed"
							)
						),
			"child_status" => array( 
							array (
								"regex" => "/^LOST|ORPHAN$/",
								"match" => "",
								"no_match" => "Invalid child status"
							)
						),
			"keep_my_contact" => array( 
							array (
								"regex" => "/^on|off$/i",
								"match" => "",
								"no_match" => "Invalid option"
							)
						),
			"i_vounteer" => array( 
							array (
								"regex" => "/^on|off$/i",
								"match" => "",
								"no_match" => "Invalid option"
							)
						),																																			
		);
	}
	?>