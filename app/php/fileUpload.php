<?php 

$uploaddir = '/app/data';
$uploadfile = $uploadddir . basename($_FILES['userfile']['name']);

echo '<pre>';

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo " File Uploaded"
} else {

  echo "failed"
}

print_r($_FILES);

print "</pre>";

?>
