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
		private function augment_input($param, $augment_str){
            foreach($param as $key => $value){
                if($key == "dob" || $key == "gender" || $key == "age" || $key == "reporter_contact"){
                    $map[$key]=$value;
                    continue;
                }
                $map[$key]=$value. mt_rand(0, mt_getrandmax());;

            }
            return $map;
        }
        public function test_report_missing(){
			$report_missing_controller = new ControllerReportMissing();
			date_default_timezone_set("Asia/Calcutta");
			$this->MISSING_POST["dob"] = new DateTime();
			
			$test_complete_status = TRUE;
			$report_missing_controller->post($this->MISSING_POST);
						 
			//$test_complete_status = $test_complete_status && true;
			echo "Test Complete";

        }

        public function test_report_many_missing($howMany){
			$report_missing_controller = new ControllerReportMissing();
			date_default_timezone_set("Asia/Calcutta");
            $test_complete_status = TRUE;
            for($i=0;$i<10;$i++){
                $this->MISSING_POST["dob"] = new DateTime();
                $map=$this->augment_input($this->MISSING_POST,$i);
                $report_missing_controller->post($map);
                //$test_complete_status = $test_complete_status && true;
            }
            echo "Test Complete";
        }
		public function run($once)
		{
            if($once){
                $this->test_report_missing();
            }else{
                $this->test_report_many_missing(10);
            }
		}
	}
	
	$test = new ReportMissingControllerTest();
	$test->run(TRUE);
?>
