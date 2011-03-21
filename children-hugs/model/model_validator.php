<?php
require_once('util/recaptchalib.php');

class ModelValidator {
	
	public static $RECAPTCHA_PRIVATE_KEY = "6LejssISAAAAAITiLBJMbf6TrB2IzSBKscBz-bOf";
	
	public static function validate_captcha() {
		$resp = recaptcha_check_answer (self::$RECAPTCHA_PRIVATE_KEY,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
		return $resp;
	}
	
	public static function validate($source_parameters,$validation_map)
	{
		$validation_status = array ();
		
		foreach ($source_parameters as $key=>$value)
		{
			if($validation_map[$key] !=null && is_array($validation_map[$key]))
			{
				foreach($validation_map[$key] as $vk)
				{
					$pattern =  $vk["regex"];
					$subject = $value;				
					if((!is_null($pattern) && $pattern !="") && gettype($subject) == "string")
					{ 
						if(preg_match($pattern, $subject))
						{
							if($vk["match"] !="")
							{
								$validation_status[$key] = $vk["match"]; 
							}
						}else{
							if($vk["no_match"] !="")
							{
								$validation_status[$key] = $vk["no_match"];
							}
						}
					}
				}
			}
		}
		return $validation_status;
	}
}
?>