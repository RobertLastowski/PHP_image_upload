<?php
include "upload.php";
?>

<!DOCTYPE html>
<html lang = "en-US">
<head>
<meta charset="utf-8">
<title> Upload image to store it in the database</title>
</head>

<body>
    <div >
        <div >
            <?php
            if(!empty($statusMsg)){ ?>
                <p ><?php echo $statusMsg; ?></p>
            <?php } ?>


            <form action="" method="post" enctype="multipart/form-data">
                Select Image to Upload:
                <input type="file" name="file">
                <input type="submit" name="submit" value="UPLOAD">
            </form>
        </div>

        <div >
                <div >
                    <h3> Uploaded images </h2>
                    <?php
                    include "dbConfig.php";

                    //get images from data base
                    $query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

                    if($query->num_rows > 0){
                        while($row = $query->fetch_assoc()){
                            $imageURL = 'images/'.$row["file_name"];
                    ?>
                        <img src="<?php echo $imageURL; ?>" alt="" />
                    <?php
                        }
                    }else{
                    ?>
                        <p>No image found.. </p>
                        <?php
                    }
                    ?>

                </div>
        </div>

    </div>

</body>

</html>