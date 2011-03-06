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
				echo "count: ".count($result).PHP_EOL;
			}
			return $result;
		}
		
	}
	
	$post_params=$_POST;
	// none of the search params are not exact matches except for gender
	$post_params['name']="%".$_POST['name']."%";
	$post_params['origin']="%".$_POST['origin']."%";
	// finding child nearly of the same age
	$post_params['age_range_start']=(int)$_POST['age']-2;
	$post_params['age_range_end']=(int)$_POST['age']+2;
	
	$search_controller=new SearchController();
	$_REQUEST['response']=$search_controller->action_performbasicsearch($post_params);
?>