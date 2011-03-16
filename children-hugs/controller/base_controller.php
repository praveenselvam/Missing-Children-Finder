<?php
	require_once "util/log4php/Logger.php";
	
	abstract class ControllerBaseAction {
		
		public function configure() {			
			Logger::configure(preg_replace("/controller\/*/", "config/logging.properties", dirname(__FILE__)));			
					
		}
	}
?>