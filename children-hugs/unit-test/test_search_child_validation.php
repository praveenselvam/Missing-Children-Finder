<?php
	require_once "model/model_validator.php";
	require_once "rules/search_child_validation_rules.php";
	
	class TestSearchValidation {
		
		 private $SEARCH_GET_valid = array(
										"name" => "",
										"gender" => "M",
										"origin" => "",
										"age" => "10"
									);
		 private $SEARCH_GET_invalid = array(
										"name" => "LOST",
										"gender" => "M",
										"origin" => "Street",
										"age" => "10"
									);							
		
		public function test()
		{
			$status = ModelValidator::validate(
								$this->SEARCH_GET_valid,
					  			SearchChildValidationRules::$SEARCH_CHILD_MISSING_MAP 
					  		);

			print_r($status);
			echo count($status);
		}
	}
	
	$test = new TestSearchValidation();
	$test->test();
	
?>