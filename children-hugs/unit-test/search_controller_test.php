<?php
	require_once "controller/search_controller.php";
	class SearchControllerTest{
		public function test_basicsearch(){
			$param = array (
							"name" => "%Child%",
							"age_range_start" => 1,
							"age_range_end" => 20,
							"gender" => "M",
							"origin" => "%City%"
							);
			$param1 = array (
				"name" => "Child",
				"age_range_start" => "1",
				"age_range_end" => "10",
				"gender" => "M",
				);
							
			$srchcontroller=new SearchController();
			$result=$srchcontroller->action_performBasicSearch($param);
			echo "Printing result ".gettype($result).PHP_EOL;
			foreach($result as $row){
				foreach($row as $key=>$value){
					if(!is_numeric($key))
						echo "--> $key, $value".PHP_EOL;
				}
			}
		}
		public function run($basic_search){
			if($basic_search){
				$this->test_basicsearch();
			}else{
				// advanced search
			}
		}
	}
	$srchTest=new SearchControllerTest();
	$srchTest->run(TRUE);
?>