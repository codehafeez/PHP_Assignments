<?php
if(isset($_FILES['image_file_input']))
 {
	$output['status']=FALSE;
	set_time_limit(0);
	$allowedImageType = array("image/jpeg", "image/jpg", "image/gif", "image/png");

	if ($_FILES['image_file_input']["error"] > 0) {
		$output['error']= "File Error";
	}
	elseif (!in_array($_FILES['image_file_input']["type"], $allowedImageType)) {
		$output['error']= "Invalid image format";
	}
	elseif (round($_FILES['image_file_input']["size"] / 1024) > 4096) {
		$output['error']= "Maximum file upload size is exceeded";
	}
	else 
	{

	    $fName = $_FILES['image_file_input']['name'];
	    $temp_path = $_FILES['image_file_input']['tmp_name'];
		$file = pathinfo($fName);
		$fileType = $file["extension"];
		$fileName = rand(222, 888) . time() . ".$fileType";


    	// upload image small (thumbnail)
		$mainFolderUpload_dir = "uploads/";
		if (!file_exists($mainFolderUpload_dir)) { mkdir($mainFolderUpload_dir); } // create folder if not
		$small_thumbnail_path = "uploads/small/";
		if (!file_exists($small_thumbnail_path)) { mkdir($small_thumbnail_path); } // create folder if not

		$small_thumbnail = $small_thumbnail_path . $fileName;
		$thumb1 = createThumbnail($temp_path, $small_thumbnail,$fileType, 150, 93);				

		if($thumb1) 
		{
	    	// upload image large image
			$target_file = $mainFolderUpload_dir.$fileName;
			$data = uploadImageLarge($temp_path, $target_file);
			if($data){
			    $output['status']=TRUE;
			    $output['small']= $small_thumbnail;
			    $output['large']= $target_file;
			}
			else {
				$output['error']= "uploading large image error.";
			}
		}
		else {
			$output['error']= "uploading small thumbnail image error.";
		}
	}
	echo json_encode($output);
}


function uploadImageLarge($temp_path, $target_file){
	// upload image original (Large)
 	if (move_uploaded_file($temp_path, $target_file)) {
		return TRUE;
  	}
  	else {
		return FALSE;
  	}	
}

function createThumbnail($sourcePath, $targetPath, $file_type, $thumbWidth, $thumbHeight){	
    if($file_type === 'jpeg' || $file_type === 'jpg'){
	    $source = imagecreatefromjpeg($sourcePath);	
    }
    else if($file_type === 'gif'){
	    $source = imagecreatefromgif($sourcePath);	
    }
    else if($file_type === 'png'){
	    $source = imagecreatefrompng($sourcePath);	
    }

    $width = imagesx($source);
	$height = imagesy($source);	
	$tnumbImage = imagecreatetruecolor($thumbWidth, $thumbHeight);
	imagecopyresampled($tnumbImage, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);	
	if (imagejpeg($tnumbImage, $targetPath, 90)) {
	    imagedestroy($tnumbImage);
		imagedestroy($source);
		return TRUE;
	}
	else {
		return FALSE;
	}
}	
?>	