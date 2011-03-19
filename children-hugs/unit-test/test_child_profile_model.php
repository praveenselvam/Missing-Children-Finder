<?php
	require_once "model/model_child_profile.php";
	
	class TestChildProfile {
		
		public function test()
		{
			$TEST_PARAM_VALID = array (
				"salt" => 199334831,
				"child_id" => 1
				);
			
			$child_profile = new ModelChildProfile();
			$RESULT = $child_profile->getProfile($TEST_PARAM_VALID);
			
			foreach($RESULT as $row)
			{		
				foreach($row as $k=>$v)
				{
					echo $k."=".$v.PHP_EOL;
				}
			}
		}
	}
	
	$test = new TestChildProfile();
	$test->test();
?>