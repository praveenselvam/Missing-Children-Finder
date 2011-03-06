<?php
	class QueryGenerator{
		// TODO: Lot of pending design level issues.
		// It is desirable to have a QueryGenerator facility based on the
		// -- fields(select)
		// -- table names
		// -- constraints
		// -- grouping, ordering
		// dynamically.
		// Lot of design issues need to be discussed. 
		// Leaving this as a place holder for future work.
		public static function _print($item, $key){
			echo "$key, $item".PHP_EOL;
		}
		// Looks like ControllerParameterMap also does something similar. 
		// Using that as it has already been used! 
		public static function transformParams($param_map, $mappings){
			$final_mappings=array();
			foreach($param_map as $key => $value){
				echo "$key...\n";
				$found=FALSE;
				foreach($mappings as $mapping_key => $mapping_value){
					if($key == $mapping_key){
						echo "--- $key, $mapping_key , $mapping_value".PHP_EOL;
						$final_mappings[$mapping_value]=$value;
						break;
					}
				}
			}
			return $final_mappings;
		}
	}
?>