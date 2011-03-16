<?php
	class Upload {
		
			private $fileperm = 0644;
			private $dirperm = 0777;
				
			private function create_if_not_exists($target_path,$dirpem)
			{
				if(!is_dir($target_path))
				{
					mkdir($target_path,$dirperm);
				}	
			}
			
			public function upload_photo($photo_id)
			{
				$target_path = $_SERVER['DOCUMENT_ROOT']."/missing-children/images/uploads/";
				
				$this->create_if_not_exists($target_path, $this->dirperm);
				
				$destination = $target_path."full_".$photo_id.strtolower(
				 	strrchr(basename(($_FILES["child_photo"]["name"])),".")
				 );
							
				move_uploaded_file($_FILES["child_photo"]["tmp_name"], $destination);
				
				/***
				 * TODO: Write resizing functions.
				 * - Allowed file extensions
				 * - Write validations for file size checks.
				 * - handle image lib missing.
				 */
			}
			
	}
?>