<?php
	require_once '../model/model_manager.php';		
	class ModelManagerTest {
		public function run() {
			 $test_complete_status = TRUE;
			 
			 $test_complete_status = $test_complete_status & self::test_read_record();			 
			
			 
			 echo "Test : ".($test_complete_status?"PASS":"FAIL")."\n";
		}
		
		public function test_read_record() {
			$sql = "select * from status_catalog where status_id =:status_id";
			$param = array("status_id"=>1);
			
			$result = ModelManager::readRecord($sql, $param);
			if(gettype($result) == 'array' && $result != null)
			{  foreach($result as $row)
				{				
					foreach($row as $key=>$value)
					{
						echo $key." = ".$value;
						echo "\n";
					}
					
				}
			}
			return true;
		}
	}
	
	$test = new ModelManagerTest();
	$test->run();
?>