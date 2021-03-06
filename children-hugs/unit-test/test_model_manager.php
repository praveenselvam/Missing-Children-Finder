<?php
	require_once 'model/model_manager.php';		
	class ModelManagerTest {
		public function run() {
			 $test_complete_status = TRUE;
			 
			 $test_complete_status = $test_complete_status & $this->test_read_record(null,null);
			 			 
			/* $write_sql = "insert into child(name,gender,dob,age,photo_url,salt) 
			 			   values(:name,:gender,:dob,:age,:photo_url,:salt)";
			 $write_params = array(
			 					   "name" => "Test Child Name",
			 					   "gender" => "M",
			 					   "dob" => new DateTime(),
			 					   "age" => 21,
			 					   "photo_url" => "http://www.abc.com/",
			 						"salt" => (mt_rand(0, mt_getrandmax()))
			 					   );
			 //$test_complete_status = $test_complete_status & $this->test_write_record($write_sql,$write_params);
			  * 
			  */
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
				$sql = "select distinct c.salt as salt,c.name as name, c.age as age, c.gender as gender, a.city as city, a.state as state 
 										from child c, address a, rel_reporter_child_address r  
 										where r.rca_child_id=c.child_id and r.rca_address_id=a.address_id
 										and c.salt =:salt and c.child_id =:child_id";
				$param = array("child_id"=>1,"salt"=>199334831);
			}
			
			echo $sql;
			
			$result = ModelManager::readRecord($sql, $param);
			
			echo gettype($result);
			
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