<?php
include("config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
.card {

  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>

<?php
   $query ="SELECT * FROM products";
   $quuu = mysqli_query($con,$query);
   while($row = mysqli_fetch_assoc($quuu)){ 

?>
  <div class="card">
  <img src="img/<?php echo $row["file"];?>" alt="p photo" style="width:100%">
  <h1><?php echo $row["name"];?></h1>
  <p class="price"><?php echo $row["price"];?></p>
  <p><button>Add to Cart</button></p>
</div>    
<?php } ?>
</body>
</html>