<?php
	require_once "parameter_map.php";
	require_once "model/model_search.php";
	
	class SearchController{
		public function __construct(){}
		
		public static function _print($item, $key){
			echo "$key -- $item".PHP_EOL;
		}
		
		public function action_performbasicsearch($param_map){
			if(NULL != $param_map && 0 != count($param_map)){
				$search_model=new ModelSearch();
				$final_param_map=array();
				$final_param_map=ControllerParameterMap::extractionHelper
									(ControllerParameterMap::$SEARCH_CHILD_MAP,$param_map);
	
				$result=$search_model->basicSearch($final_param_map);
			}
			return $result;
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
	$_GET['gender']=($_GET['male']=="on"?"M":($_GET['female']=="on"?"F":""));
	$post_params['gender']=$_GET['gender'];
	$post_params['name']="%".$_GET['name']."%";
	$post_params['origin']="%".$_GET['origin']."%";
	// finding child nearly of the same age
	$post_params['age_range_start']=(int)$_GET['age']-2;
	$post_params['age_range_end']=(int)$_GET['age']+2;	
	$search_controller=new SearchController();
	$_REQUEST['error']=0;
	$_REQUEST['response']=$search_controller->action_performbasicsearch($post_params);
?>