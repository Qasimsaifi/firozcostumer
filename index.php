<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=width="", initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DK</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head> 

<body>
    <navbar class="nav">
        <ul>
            <h1>DK</h1>
            <li class="navlist one">HOME</li>
            <li class="navlist">GALLERY</li>
            <li class="navlist"><a href="upload.php">UPLOAD</a></li>
        </ul>
    </navbar>
  <?php
  
  include 'connection.php';
  
  
  $selectquery = "SELECT * FROM gallery";
  $query = mysqli_query($conn,$selectquery);
  $nums = mysqli_num_rows($query);
  
  
  while($res = mysqli_fetch_array($query)){
      ?>
    

    <div class="img-cont">
        <img src="img/<?php echo $res['image']?>" alt="" class="img">
        <a class="d-btn" href="img/<?php echo $res['image']?>" download><i class="fa-solid fa-download"></i></a>
        <a class="m-btn" href="img/<?php echo $res['image']?>"><i class="fa-solid fa-maximize"></i></a>
    </div>
    <?php
  }
  
  
  ?>
</body>

</html>
