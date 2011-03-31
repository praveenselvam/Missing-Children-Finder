<?php
	class SearchChildValidationRules {	
		public static $SEARCH_CHILD_MISSING_MAP = array (
			"name" => array( 
								array (
									"regex" => "/^[a-z\sA-Z'_\%]+$/",
									"match" => "",
									"no_match" => "Please enter alphabets only, allowed special characters are ' and _"
									   )
								),
			"origin" => array( 
								array (
									"regex" => "/^[a-z\sA-Z'_\%]+$/",
									"match" => "",
									"no_match" => "Please enter alphabets only, Origin denotes where the child is from."
									   )
								),
			"gender" => array( 
								array (
									"regex" => "/^M|F$/i",
									"match" => "",
									"no_match" => "Please select male or female"
									  )
								),
			"age" => array( 
							 array (
								"regex" => "/^[0-9]+$/",
								"match" => "",
								"no_match" => "Please enter a valid age"
									)
						  )																																	
			);
	}
?>