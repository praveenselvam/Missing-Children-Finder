<?php
	require_once '../model/model_manager.php';		
	class ModelManagerTest {
		public function run() {
			 $test_complete_status = TRUE;
			 
			 $test_complete_status = $test_complete_status & $this->test_read_record(null,null);
			 			 
			 $write_sql = "insert into child(name,gender,dob,age,photo_url,salt) 
			 			   values(:name,:gender,:dob,:age,:photo_url,:salt)";
			 $write_params = array(
			 					   "name" => "Test Child Name",
			 					   "gender" => "M",
			 					   "dob" => new DateTime(),
			 					   "age" => 21,
			 					   "photo_url" => "http://www.abc.com/",
			 						"salt" => (mt_rand(0, mt_getrandmax()))
			 					   );
			 $test_complete_status = $test_complete_status & $this->test_write_record($write_sql,$write_params);
			 echo "Test : ".($test_complete_status?"PASS":"FAIL")."\n";
		}
		
		
		
		public function test_write_record($sql,$param) {
				$result = ModelManager::writeRecord($sql, $param);
				echo $result;
				return true;
		}
		
		public function test_read_record($sql,$param) {
			if($param == null || $sql == null)
			{
				$sql = "select * from status_catalog where status_id =:status_id";
				$param = array("status_id"=>1);
			}
			
			$result = ModelManager::readRecord($sql, $param);
			if(gettype($result) == 'array' && $result != null)
			{  
				foreach($result as $row)
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