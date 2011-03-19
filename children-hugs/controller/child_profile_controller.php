<?php	
	require_once "model/model_child_profile.php";	
	require_once "model/model_validator.php";	
	require_once "controller/base_controller.php";
	
	class ControllerChildProfile  extends ControllerBaseAction  
	{
		public function __construct() {
			self::configure();
		}
		
		public function viewProfile($params)
		{
			$model = new ModelChildProfile();
			$_REQUEST["response"] = $model->getProfile($params);
			if($_REQUEST["response"] == null)
			{
				$_REQUEST["ERROR"] = "TRUE";
			}
		}
			
	}
	$params = array();
		$params["salt"] = $_GET["id1"];
		$params["child_id"] = $_GET["id2"];
			
	foreach($_GET as $key => $value)
	{
		 	
	}
	$controller = new ControllerChildProfile();	
	$controller->viewProfile($params);
?>