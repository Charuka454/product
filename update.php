<?php 
include("config.php");

if( isset($_POST["submit"])){

    //for product
    $pName = $_POST['Pname'];
    $price = $_POST['Pprice'];

    $fileName = $_FILES["product"]["name"];
    $fileTmpName = $_FILES["product"]["tmp_name"];
    $folder = 'img/'.$fileName;
    $query ="UPDATE products
             SET price = '$price' , file = '$fileName'
             WHERE name='$pName';";
   $quuu = mysqli_query($con,$query);
   if(move_uploaded_file($fileTmpName,$folder)){
    
    echo"<h2>Update</h2>";
   }else{
     echo"<h2>Not Update</h2>";
    } 
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <!-- ✅ Link your external header styles -->
    <link rel="stylesheet" href="style.css">

    <style>
    /* Extra styles for this specific form */
    .form-container {
        border-radius: 8px;
        background-color:rgb(29, 25, 25);
        padding: 20px;
        width: 90%;
        max-width: 600px;
        margin: 40px auto;
    }

    input[type=text], input[type=file], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0 16px;
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
        margin-top: 8px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    a.button-link {
        display: block;
        width: fit-content;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 30px auto;
        border-radius: 4px;
        text-decoration: none;
        text-align: center;
    }

    a.button-link:hover {
        background-color: #45a049;
    }
    </style>
</head>
<body>

    <!-- ✅ Include your styled header -->
    <?php include("header.php"); ?>

    <div class="form-container">
        <form method="POST" enctype="multipart/form-data">
            <label for="Pname">Product Name</label>
            <input type="text" id="Pname" name="Pname" placeholder="Product name..." required>

            <label for="Pprice">Product Price</label>
            <input type="text" id="Pprice" name="Pprice" placeholder="Product price..." required>

            <label for="product">Product Picture</label>
            <input type="file" id="product" name="product" required>

            <input type="submit" value="Submit" name="submit">
        </form>
    </div>

    <a href="product.php" class="button-link">View Products</a>

</body>
</html>
