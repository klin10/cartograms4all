<?php

header('Access-Control-Allow-Origin: *');
// Check if the form was submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["input_csv"]) && $_FILES["input_csv"]["error"] == 0){
    
       // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $_FILES["input_csv"]["name"])){
                echo $_FILES["input_csv"]["name"] . " is already exists.";
            } else{
                if (move_uploaded_file($_FILES["input_csv"]["tmp_name"], "upload/" . $_FILES["input_csv"]["name"])){
                  echo "Your file was uploaded successfully.";
                }
                else {
                  echo "upload fail";
                  print_r($_FILES);
		}
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["input_csv"]["error"];
    }
}
?>
