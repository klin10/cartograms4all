<?php
header('Access-Control-Allow-Origin: *');
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_POST['input_csv']) && $_POST['input_csv']['error'] == 0){
    
       // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
       // Check whether file exists before uploading it
        if(file_exists("upload/" . $_POST["input_csv"]["name"])){
          echo $_POST["input_csv"]["name"] . " is already exists.";
        } else{
            if (move_uploaded_file($_POST["input_csv"]["tmp_name"], "upload/" . $_POST["input_csv"]["name"])){
              echo "Your file was uploaded successfully.";
            } else {
                  echo "upload fail";
                  print_r($_POST);
	    }
        }    
     } else{
        die("Error: " . $_POST["input_csv"]["error"]);
    }
}
?>
