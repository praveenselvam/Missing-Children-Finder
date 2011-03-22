<?php	
	require_once "model/model_child_profile.php";	
	require_once "model/model_validator.php";	
	require_once "controller/base_controller.php";
	
	class ControllerChildProfile  extends ControllerBaseAction  
	{
		public function __construct() {
			self::configure();
		}
		
		public function addInformation($post_array)
		{
			$info_array = array();
			$info_array["child_id"] = $post_array["id2"];
			$info_array["salt"] = $post_array["id1"];
			$info_array["info_text"] = $post_array["profile_text"];
			$model = new ModelChildProfile();
			$model->addChildInformation($info_array);
		}
		
		public function viewProfile($params)
		{
			$model = new ModelChildProfile();
			$_REQUEST["response"] = $model->getProfile($params);
									
			$info_array["info_child_id"] = $params["child_id"];			
			
			$_REQUEST["add_info"] = $model->getAdditionalChildInfo($info_array);
			
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
	if(!empty($_POST))
	{
		if($controller->captcha_is_valid())
		{
			$controller->addInformation($_POST);
		}
	}		
	$controller->viewProfile($params);
?>