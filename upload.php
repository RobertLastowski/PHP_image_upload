<?php

include 'dbConfig.php';

$statusMsg = "";

// Directory for uploaded files
$targetDir = "images/";

if (isset($_POST["submit"])){
    if(!empty($_FILES["file"]["name"])){
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir.$fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        // ALLOW ONLY IMAGES
        $allowTypes = array("jpg","png","jpeg","gif","pdf");
        if(in_array($fileType,$allowTypes)){
            //uploading file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                //inserting file name to database
                $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES('$fileName',NOW()) ");
                if($insert){
                    $statusMsg = "The file ".$fileName." has been upoaded successfully.";
                }
                else{
                    $statusMsg = "Upload failed";
                }
            }
            else{
                $statusMsg = "Upload failed";
            }
        }
        else{
            $statusMsg = "Sorry, not allowed format, choose file with jpg,png,jpeg,gif or pdf";
        }
    }
    else{
        $statusMsg = "Please select a file to upload";
    }
}



?>