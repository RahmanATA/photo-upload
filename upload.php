<?php
if ($_FILES['file']['size'] != 0) {
  $errors= array();
  $file_name = $_FILES['file']['name'];
  $file_size =$_FILES['file']['size'];
  $file_tmp =$_FILES['file']['tmp_name'];
  $file_type=$_FILES['file']['type'];

  $file_ext = substr(strrchr($file_name, "."), 1);
  $file_name = md5(uniqid());
  $newFilename = $file_name.".".$file_ext;
  $extensions= array("jpeg","jpg","png", "JPG", "JPEG", "PNG");

  if(in_array($file_ext,$extensions) === false){
    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
  }

  if($file_size > 2097152){
    $errors[]='File size must be excately 2 MB';
  }

  if(empty($errors) == true){
    move_uploaded_file($file_tmp,"uploads/".$newFilename);
    echo "UPLOADED";
  }else{
    print_r($errors);
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="index.html" method="post" enctype="">
      <input type="file" name="file">
      <button type="submit" name="button">Submit</button>
    </form>
  </body>
</html>
