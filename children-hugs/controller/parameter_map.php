<?php
	class ControllerParameterMap {
		
		public static $CHILD_INPUT_MAP = array (								
											"child_name" => "name",
											"gender" => "gender",
											"dob" => "dob",
											"age" => "age",
											"missing_since" =>"missing_since"
										  );
		public static $ADDRESS_INPUT_MAP = array (
											"street" => "street",
											"locality" => "locality",
											"city" => "city",
											"state" => "state",
											"country" => "country"											
										  );
		public static $REPORTER_INPUT_MAP = array (
											"reporter_email" => "email",
											"reporter_name" => "name",
											"reporter_contact" => "contact_number"											
										  );
										  										  								  
		public static $PREFERENCE_INPUT_MAP = array (
											"child_status" => "child_status",
											"keep_my_contact" => "keep_my_contact",
											"i_vounteer" => "i_vounteer"
										  );
		
		public static $SEARCH_CHILD_MAP = array(
									"name" 				=> "name",
									"age_range_start" 	=> "st_age",
									"age_range_end" 	=> "end_age",
									"gender"			=> "gender",
									"origin"			=> "city"
								);
		
		/* not used right now, will be making use of it soon. actually, this alias list 
		 * will need to be updated for each table */
		public static $TABLE_ALIAS_MAP = array (
											"child" => "c",
											"address" => "a"
										);
								
		
		/**
		 * 
		 * Iterate through the array $using, and look for values in $from
		 * that have the same ket as that of $using->key,
		 * create an array, with the cross mapped array[$using->value] = $from[$using->key];
		 * Used to translate the user supplied params to the ones that match the db col names,
		 * usually the UI name and the DB col name are the same. But they could change sometimes.
		 * 
		 * @param unknown_type $using
		 * @param unknown_type $from
		 */
		public static function extractionHelper($using,$from) {
			if ($from !=null)
			{
				$extracted_info = array();
				foreach($using as $cKey=>$cValue) {
					$extracted_info[$cValue] = $from[$cKey];
				}
				return $extracted_info;
			}
			return null;
		}
	}
?>