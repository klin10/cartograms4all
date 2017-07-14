<?php
//Php script that allow user to upload their own data to our remote location

//$sessionId = $_COOKIE['c4a_session_id'];
$sessionId = 10;
$targetDir = "/data/";
$targetFile = $target_dir . $sessionId . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

echo 'file check exist';
// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
echo 'ready to upload';
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "target file" ;
        echo $targetFile;
        echo "Sorry, there was an error uploading your file.";
    }
}

?>

