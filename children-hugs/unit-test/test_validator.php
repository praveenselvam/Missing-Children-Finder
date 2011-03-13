<?php
	require_once "model/model_validator.php";
	require_once "rules/report_missing_child_validation_rules.php";
	
	class ValidatorTest {

		private $MISSING_POST_keep_reporter = array(
										"child_status" => "LOST","child_name" => "Child Name",
										"gender" => "M","dob" => null,"age" => "10",
										"street" => "Street","locality" => "Locality",
										"city" => "City","state" => "State",
										"country" => "Country","reporter_email" => "em@abc.com",
										"reporter_name" => "Full Name Reporter",
										"reporter_contact" => 98765434567,
										"keep_my_contact" => "on",
										"i_vounteer" => "on"
									);
		private $MISSING_POST_invalid = array(
										"child_status" => "LOST","child_name" => "Child Name",
										"gender" => "M","dob" => null,"age" => "10",
										"street" => "Street","locality" => "Locality",
										"city" => "City","state" => "State",
										"country" => "Country","reporter_email" => "emabc.com",
										"reporter_name" => "Full Name Reporter",
										"reporter_contact" => 98765434567,
										"keep_my_contact" => "on",
										"i_vounteer" => "on"
									);

	  private $MISSING_POST_valid = array(
										"child_status" => "LOST","child_name" => "Child Name",
										"gender" => "M","dob" => "2011-03-12","age" => "10",
										"street" => "Street","locality" => "Locality",
										"city" => "City","state" => "State",
										"country" => "Country","reporter_email" => "ema@bc.com",
										"reporter_name" => "Full Name Reporter",
										"reporter_contact" => 98765434567,
										"keep_my_contact" => "on",
										"i_vounteer" => "on"
									);
		
		public function test() {
		
			$status = ModelValidator::validate(
								$this->MISSING_POST_valid,
					  			MissingChildValidationRules::$REPORT_CHILD_MISSING_MAP 
					  		);

			print_r($status);
			echo count($status);		  		
		}
	}
	
	$test = new ValidatorTest();
	$test->test();
?>