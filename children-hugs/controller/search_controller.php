<?php
	require_once "parameter_map.php";
	require_once "model/model_search.php";
	require_once "model/model_validator.php";
	require_once "rules/search_child_validation_rules.php";
	require_once "controller/base_controller.php";
	
	
	class SearchController extends ControllerBaseAction 
	{
		public function __construct()
		{
			self::configure();
		}
		
		public static function _print($item, $key)
		{
			echo "$key -- $item".PHP_EOL;
		}
		
		public function action_performbasicsearch($param_map)
		{			
			
			if(NULL != $param_map && 0 != count($param_map))
			{

				 foreach ($param_map as $k=>$v)
				 {
				 	if($v!=null && !empty($v))
				 	{
				 		$validation_map[$k] = $v;
				 	}
				 }
				
				 $validation_results = ModelValidator::validate(
			  							$validation_map,
			  							SearchChildValidationRules::$SEARCH_CHILD_MISSING_MAP			  							
			  							);
				 if(count($validation_results) == 0)
			  	{		
					$search_model=new ModelSearch();
					$final_param_map=array();
					$final_param_map=ControllerParameterMap::extractionHelper
										(ControllerParameterMap::$SEARCH_CHILD_MAP,$param_map);					
					try {
						$result=$search_model->basicSearch($final_param_map);
						$_REQUEST['response']= $result;	
					}catch(Exception $e)
					{
						Logger::getLogger(__CLASS__)->error($e);
					}
			  	}else{
			  		$_REQUEST["user_request"] = $param_map;
			  		$_REQUEST["validation_errors"] = $validation_results;
			  		$_REQUEST["server_response"] = "ERROR";
			  	}					
				
			}
			
		}
		
	}
	// Request processing falls here...!
	// Identify the type of request
	// Handle only GET requests
	if($_SERVER['REQUEST_METHOD']!='GET'){
		header("HTTP",false,405);
		$_REQUEST['error']=1;
		$_REQUEST['response']='Invalid HTTP method used. Only GET supported.';
		return;
	}

	$post_params=array();
	$post_params=$_GET;
	// none of the search params are exact matches except for gender
	$post_params['gender']=trim($_GET['gender']);
	if($_GET['name']!=NULL && trim($_GET['name'])!="")
		$post_params['name']="%".trim($_GET['name'])."%";
	if($_GET['origin']!=NULL && trim($_GET['origin'])!="")
		$post_params['origin']="%".trim($_GET['origin'])."%";
	// finding child nearly of the same age
	if($_GET['age'] !=NULL && trim($_GET['age']) != ""){
		$post_params['age_range_start']=(int)$_GET['age']-2;
		$post_params['age_range_end']=(int)$_GET['age']+2;
	}else
	{
		 Logger::getLogger(__CLASS__)->error("Did not receive age.");
	}
	$search_controller=new SearchController();
	$_REQUEST['error']=0;
	$search_controller->action_performbasicsearch($post_params);
?>