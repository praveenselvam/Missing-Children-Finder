<?php
	require_once 'parameter_map.php';
	require_once '../model/model_report_missing.php';
	
	class ControllerReportMissing {
										  
		
		public function post($post_array)
		{
			$report_missing_model = new ModelReportMissing();
			
			  $childInformation = $this->extractChildInformation($post_array);			  
			  $reporterInformation = $this->extractReporterInformation($post_array);
			  $addressInformation = $this->extractAddressInformation($post_array);
			  $preferenceInformation = $this->extractPreferenceInformation($post_array);
			
			  $action_result = $report_missing_model->reportMissingChild($childInformation,
															  $reporterInformation,
															  $addressInformation,
															  $preferenceInformation);	
		}
		
		private function extractChildInformation($post_array)
		{
			return ControllerParameterMap::extractionHelper(ControllerParameterMap::$CHILD_INPUT_MAP,
															 $post_array);
		}
		private function extractReporterInformation($post_array)
		{
			return ControllerParameterMap::extractionHelper(ControllerParameterMap::$REPORTER_INPUT_MAP,
																 $post_array);
		}
		private function extractAddressInformation($post_array)
		{
			return ControllerParameterMap::extractionHelper(ControllerParameterMap::$ADDRESS_INPUT_MAP,
															 $post_array);
		}
		private function extractPreferenceInformation($post_array)
		{
			return ControllerParameterMap::extractionHelper(ControllerParameterMap::$PREFERENCE_INPUT_MAP,
															 $post_array);
		}		
	}
	
	//
	foreach($_GET as $key => $value)
	{
		//echo "Key ".$key." = ".$value;
	}
	
	foreach($_POST as $key => $value)
	{
		echo "\"".$key."\" => \"".$value."\",";
	}
?>