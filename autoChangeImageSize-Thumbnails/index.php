<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>How to Create Multiple Thumbnails While Uploading Image</title>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery.form.min.js"></script>
<script>
$(document).on('change', '#image_file_input', function () {   
    $('#image_upload_form').ajaxForm({
        success: function(html, statusText, xhr, $form) {
			obj = $.parseJSON(html);	
        		if(obj.status){		
        			$("#small-preview").prop('src',obj.small);		
        			$("#large-preview").prop('src',obj.large);		
        			$(".img_preview").show();	
        		}    
        		else {
        			alert(obj.error);
        		}
        }
    }).submit();		
});
</script>
</head>

<body>

<form enctype="multipart/form-data" action="image_upload_submit.php" method="post" name="image_upload_form" id="image_upload_form">

	Choose Image <input type="file" accept="image/gif,image/jpeg,image/jpg"  name="image_file_input" id="image_file_input">

</form>
<br>
<div class="img_preview" id="image-holder" style="display: none">		
	<img width="150" height="93" id="small-preview" src="#" alt="small image" /> 
	<img width="550" height="340" id="large-preview" src="#" alt="big image" />
</div>
</body>
</html>
