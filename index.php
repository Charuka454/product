<?php 

include("config.php");

if( isset($_POST["submit"])){

    $fileName = $_FILES["product"]["name"];
    $fileTmpName = $_FILES["product"]["tmp_name"];
    $folder = 'img/'.$fileName;
    $query ="INSERT INTO product (file) VALUES ('$fileName')";
   $quuu = mysqli_query($con,$query);
   if(move_uploaded_file($fileTmpName,$folder)){
    echo"<h2>file uplode</h2>";
   }else{
     echo"<h2>file not uplode</h2>";
   }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="product">
        <button type="submit" name="submit" >add</button>

    </form>
    <div>
        <?php
        $rresult = mysqli_query($con,"SELECT * FROM product");

        while($row = mysqli_fetch_assoc($rresult)){
?>
<img src="img/<?php echo $row['file'];?>"> 
<?php
        }
        
        ?>
    </div>
</body>
</html>