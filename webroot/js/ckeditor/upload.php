
<?php
//upload.php
if(isset($_FILES['upload']['name']))
{
 $file = $_FILES['upload']['tmp_name'];
 $file_name = $_FILES['upload']['name'];
 $file_name_array = explode(".", $file_name);
 
 $extension = end($file_name_array);
 $real_image_name = $file_name_array[0];
 $new_image_name = rand() . '.' . $extension;
 chmod('upload', 0777);
 
 $allowed_extension = array("jpg", "gif", "png");
 if(in_array($extension, $allowed_extension))
 {
  move_uploaded_file($file, 'upload/' . $real_image_name. '.' . $extension);
  $function_number = $_GET['CKEditorFuncNum'];
  $url = 'http://localhost:8090/ELV/webroot/js/ckeditor/upload/' .$real_image_name. '.' . $extension;
  $message = '';
  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
 }
}

?>
