<?php
	/**
	 * TODO: Convert all tests to php unit
	 * Enter description here ...
	 * @author allen
	 *
	 */
	require_once '../model/db.php';
	class DbTest {
		
		public function test_get_instance()
		{
			echo "Testing getInstance\n";			
			$db_instance = DataBase::getInstance();			
			$test_status = TRUE;
			$test_status = $test_status & ( $db_instance != null);
			echo "Not null ? : ".($test_status?"true":"false")."\n";			
			$test_status = $test_status & ( $db_instance instanceof PDO);
			echo "Instance of PDO ? : ".($test_status?"true":"false")."\n";			
			return $test_status;
		}
		
		public function test_var_instance() {
			$int = 10;
			$float = 10.22;
			$string = "String";
			echo "in=".gettype($int);
			echo "float=".gettype($float);
			echo "string=".gettype($string);
			return true;			
		}
		
		public function run() {
			 $test_complete_status = TRUE;
			 $test_complete_status = $test_complete_status & $this->test_get_instance();
			 
			 $test_complete_status = $test_complete_status & $this->test_var_instance();
			 
			 echo "Test : ".($test_complete_status?"PASS":"FAIL")."\n";
		}
	}

	$test_obj = new DbTest();
	$test_obj->run();
		
?>