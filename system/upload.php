<?php
if(isset($_POST["saveFile"])){
    //delete images from folder,so there is only 1 file
    $files = glob('../images/*'); 
    foreach($files as $file){ 
        if(is_file($file))
            unlink($file); 
    }
    $target_dir = "../images/";
    $fileName= basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
    
            $uploadOk = 1;
        } else {
            header("Location: ../index.php");
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        header("Location: ../index.php");
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        header("Location: ../index.php");
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        header("Location: ../index.php");
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header("Location: ../index.php");
    // if everything is ok, try to upload file
    } 
    else {
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $name = "imgForProcessing" . '.' . "jpg";
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir .$name)) {
           header("Location: ../index.php");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
    
?>