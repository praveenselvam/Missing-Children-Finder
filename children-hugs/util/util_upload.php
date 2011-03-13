<?php
	class Upload {
		
			public $fileperm = 0644;
			public $dirperm = 0777;
												
			//public $target_path = $_SERVER['DOCUMENT_ROOT']."/missing-children/images/uploads/";
			
			
			public function create_if_not_exists($target_path,$dirpem)
			{
				if(!is_dir($target_path))
				{
					mkdir($target_path,$dirperm);
				}	
			}
			
			public function upload_photo($photo_id,$target_path)
			{
				$this->create_if_not_exists($target_path, $this->dirperm);
				
				$destination = $target_path.$photo_id."_".basename($_FILES["child_photo"]["tmp_name"]);			
				move_uploaded_file($_FILES["child_photo"]["tmp_name"], $destination);
			} 
	}
?>