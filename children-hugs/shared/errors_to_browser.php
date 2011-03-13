<?php
	if($_REQUEST["validation_errors"] !=null)
	{
		$PAGE_ERRORS = "\"[";
		$validation_errors = $_REQUEST["validation_errors"]; 
		foreach ($validation_errors as $key=>$value)
		{
			$PAGE_ERRORS = $PAGE_ERRORS."{'".$key."':'".str_ireplace("'", "\'", $value)."'},";
		}
		$PAGE_ERRORS = $PAGE_ERRORS."{'EOF':'EOF'}]\";";
		echo "<script>var PAGE_ERRORS = ".$PAGE_ERRORS."</script>";
	}
?>