
<!DOCTYPE html>
<html>
   
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
   

<?php
error_reporting(0);
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['upload'])) {
 
    echo "Image uploading . Your image<p/> ";
    
    $file = $_FILES["uploadfile"]["tmp_name"];   

    if(!isset($file) || $file == ""){
        echo "Veuilllez choisir une image";
    }
    else
    {     
        $image_size = getimagesize($_FILES['uploadfile']['tmp_name']);

        if($image_size==FALSE)
            echo "That's not an image.";
        else
        {
            $image_name = addslashes($_FILES['uploadfile']['name']);
            $image = file_get_contents($_FILES['uploadfile']['tmp_name']);

            echo "<br/>Image uploading depuis: ".$_FILES['uploadfile']['tmp_name'];
            echo "<br/>Image uploading depuis Name: ".$image_name;
            

            $db = mysqli_connect("localhost", "root", "", "project");
            $query  = "INSERT INTO tmp_photos (email, PHOTO) VALUES (100, ?)";
            
                $stmt = $db->prepare($query);

                $stmt->bind_param('s', $image);
                $stmt->execute();

                $lastid = $stmt->insert_id;
            // $lastid = mysql_insert_id();
            echo "<br/>Image uploaded. <p /> Your image ID : $lastid<p/> ";
            
        }
    }

}
?>

<body>
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
    
    <div id="display-image">
    <?php
        $db = mysqli_connect("localhost","root","","project"); 
        $query = "SELECT * FROM tmp_photos WHERE 1;";
        // $result = mysqli_query($db, $query);
        $result = $db->query($query);
        // $stmt = $db->prepare($query);
        // $stmt->bind_param('s', $id);
        // $stmt->execute();
        // $result = $stmt->get_result();
        // $row = $result->fetch_array();

        // while ($data = mysqli_fetch_assoc($result)) {
        // echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['PHOTO'] ).'"/>';
        // }
        while ( $row = $result->fetch_array()) {
            echo '<img src="data:image/bitmap;base64,'.base64_encode($row['PHOTO']).'"/>';   }
    ?>
    </div>
</body>
 
</html>
