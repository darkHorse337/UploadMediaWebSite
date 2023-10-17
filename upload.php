<?php
$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$upload = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST['submit'])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false){
        echo "Image File ". $check["mime"] . ".";
        $upload = 1;
    }
    else{
        echo "Not an image";
        $upload = 0;
    }
}
if (file_exists($target_file)){
    echo "Sorry file is already uploaded ";
    $upload =0;
}
if($upload ==0){
    echo "File already exists ";
}
else{
    if (move_uploaded_file($_FILES['fileToUpload']["tmp_name"], $target_file)){
        echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). "has been uploaded";
    }
    else{
        echo "sorry";
    }
}
?>