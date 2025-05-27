<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Modern Product Grid</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color:rgb(185, 177, 177);
      padding: 20px;
    }

    .products-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 24px;
    }

    .card {
      display: flex;
      flex-direction: column;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
    }

    .card img {
      padding: 10px;
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-content {
      padding: 16px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    .card-content h1 {
      font-size: 18px;
      color: #333;
      margin-bottom: 8px;
      line-height: 1.2;
    }

    .price {
      font-size: 20px;
      color: #666;
      margin-bottom: 16px;
    }

    .card button {
      margin-top: auto;
      padding: 12px;
      border: none;
      background-color: #45a049;
      color: white;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .card button:hover {
      background-color:rgb(250, 9, 89);
    }
  

    @media (max-width: 600px) {
      .card img {
        height: 150px;
      }
    }
  </style>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php include "header.php"; ?>
<br><br>

<div  class="products-container">
  <?php

   
    // Handle delete request
    if (isset($_POST["delete"]) && isset($_POST["product_id"])) {
      $id = intval($_POST["product_id"]);
      $dqur = "DELETE FROM products WHERE id = $id";
      mysqli_query($con, $dqur);
    }

    // Fetch updated product list
    $query = "SELECT * FROM products";
    $quuu = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($quuu)) {
  ?>
    <div  class="card">
      <img src="img/<?php echo $row["file"]; ?>" alt="Product Image">
      <div class="card-content">
        <h1><?php echo $row["name"]; ?></h1>
        <p class="price">=<?php echo $row["price"]; ?>-rs</p>
        <form method="post">
          <input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>">
          <button type="submit" name="delete">Delete Item</button>
        
        </form>
      </div>
    </div>
  <?php } ?>
</div>
</body>
</html>
