<?php
	require_once("util/util_image.php");
	require_once("config/app_config.php");
	
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
				
				if (is_uploaded_file($_FILES['child_photo']['tmp_name'])) {
				
					$target_path = $_SERVER['DOCUMENT_ROOT'].ApplicationConfig::$IMAGE_FOLDER_PATH;
					
					$this->create_if_not_exists($target_path, $this->dirperm);
					
					$orig_file = $target_path."full_".$photo_id.strtolower(
					 	strrchr(basename(($_FILES["child_photo"]["name"])),".")
					 );
					 
					 $resized_file = $target_path."rz_".$photo_id.strtolower(
					 	strrchr(basename(($_FILES["child_photo"]["name"])),".")
					 );
					 
					 $thumbnail_file = $target_path."tn_".$photo_id.strtolower(
					 	strrchr(basename(($_FILES["child_photo"]["name"])),".")
					 );
					 
					 $resized_file_name = $photo_id.strtolower(
					 	strrchr(basename(($_FILES["child_photo"]["name"])),".")
					 );
								
					move_uploaded_file($_FILES["child_photo"]["tmp_name"], $orig_file);
					
					/***
					 * TODO: Write resizing functions.
					 * - Allowed file extensions
					 * - Write validations for file size checks.
					 * - handle image lib missing.
					 */
					
					$image = new SimpleImage();
					$image->load($orig_file);
					$image->resizeToWidth(ApplicationConfig::$RESIZE_IMAGE_WIDTH);
					$image->save($resized_file);
					
					$image->load($orig_file);
					$image->resizeToWidth(ApplicationConfig::$RESIZE_TN_IMAGE_WIDTH);
					$image->save($thumbnail_file);
					
					return $resized_file_name;
				}else{
					return null;
				}  
				
			}
			
	}
?>