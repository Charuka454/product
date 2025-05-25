<?php 

include("config.php");

if( isset($_POST["submit"])){

    //for product
    $pName = $_POST['Pname'];
    $price = $_POST['Pprice'];

    $fileName = $_FILES["product"]["name"];
    $fileTmpName = $_FILES["product"]["tmp_name"];
    $folder = 'img/'.$fileName;
    $query ="INSERT INTO products (name,price,file) VALUES ('$pName','$price','$fileName')";
   $quuu = mysqli_query($con,$query);
   if(move_uploaded_file($fileTmpName,$folder)){
    echo"file uplode";
   }else{
     echo"<h2>file not uplode</h2>";
   }
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form method="POST" enctype="multipart/form-data">
        <label for="Pname">Product Name</label>
        <input type="text" id="Pname" name="Pname" placeholder="Product name..">
        <label for="Pprice">Product Price</label>
        <input type="text" id="Pprice" name="Pprice" placeholder="Product price..">
        <label for="Ppicture">Product Picture</label><br>
        <input type="file" name="product">
        <input type="submit" value="Submit" name="submit">

    </form>
    </div>
    
  
   
</body>
</html>