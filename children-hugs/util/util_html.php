<?php
	class HtmlUtils {
		public static function sanitizeForBrowser($rowArray)
		{
			if(gettype($rowArray) == 'array')
			{
				foreach($rowArray as $row)
				{
					if(gettype($row) == 'array')
					{
						foreach($row as $k=>$v)
						{
							$row[$k] = nl2br(htmlentities($v, ENT_QUOTES, "UTF-8"));
						}
					}
				}
			}			
		}
	}
?>