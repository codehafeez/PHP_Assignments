<?php
   if(isset($_FILES['userImage1'])){
      $file_name = $_FILES['userImage1']['name'];
      $file_tmp =$_FILES['userImage1']['tmp_name'];
      move_uploaded_file($file_tmp,"uploads/".$file_name);
   }
?>