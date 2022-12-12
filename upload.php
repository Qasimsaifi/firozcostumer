<?php
require('connection.php');
if (isset($_POST["submit"])) {
    $about = $_POST["about"];
    $date = $_POST["date"];
    if ($_FILES["image"]["error"]=== 4) {
        echo "<script>alert('image not exits');</script>";
        
        
         }
    else{
      $fileName = $_FILES["image"]["name"];
      $fileSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];
  
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $fileName);
      $imageExtension = strtolower(end($imageExtension));
      if ( !in_array($imageExtension, $validImageExtension) ){
        echo
        "
        <script>
          alert('Invalid Image Extension');
        </script>
        ";
      }
      else if($fileSize > 100000000000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
        </script>
        ";
      }
      
      else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
  
        move_uploaded_file($tmpName, 'img/' . $newImageName);
        $query = "INSERT INTO `gallery`(`about`, `date`, `image`) VALUES ('$about','$date','$newImageName')";
        mysqli_query($conn, $query);
        echo
        "
        <script>
          document.location.href = 'index.php';
        </script>
        ";
      }
    }

}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="upload.css">
    <link rel="stylesheet" href="style.css">

    
</head>

<body>
        
<div class="login-box">
    <h2>UPLOAD YOUR PHOTO</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="user-box">
            <input type="text" name="about" id="about" required="">
            <label>About this image</label>
        </div>
        <div class="user-box">
            <input type="date" name="date" id="date" required="">
            <label>Date</label>
        </div>
         <div class="user-box">
             <input type="file" name="image" id="image" required="">
         </div>
             <input style="width:80%;background: #2BC6D2;
                 width: 90%;" class="btn" type="submit" name="submit" id="submit" required="">
                 
    </form>
    <a style="color:white;" href="index.php">BACK TO HOME</a>
</div>
</body>

</html>
