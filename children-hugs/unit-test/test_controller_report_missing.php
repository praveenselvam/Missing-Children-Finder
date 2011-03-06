<?php
	require_once '../controller/report_missing.php';
	class ReportMissingControllerTest {
		
		// TODO: change these values back to string,
		// the controller is expected to be capable of
		// converting the post strings into appropriate
		// objects.
		
		private $MISSING_POST = array(
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
		
		public function run()
		{
			$report_missing_controller = new ControllerReportMissing();
			
			$this->MISSING_POST["dob"] = new DateTime();
			
			$test_complete_status = TRUE;
			$report_missing_controller->post($this->MISSING_POST);
						 
			//$test_complete_status = $test_complete_status && true;
			echo "Test Complete";
		}
	}
	
	$test = new ReportMissingControllerTest();
	$test->run();
?>