<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review your basket.</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #1a1a1a;
      color: #ffffff;
    }

    #navbar {
      background-color: #660066;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    #navbar img {
      width: 40px;
      height: 40px;
    }

    #search-bar {
      flex: 1;
      margin: 0 20px;
    }

    #search-bar input {
      width: 60%;
      padding: 8px;
      border: none;
      border-radius: 5px;
    }

    #home-bar{
      display: flex;
      align-items: center;
    }

    #home-bar img{
      width: 30px;
      height: 30px;
      border-radius: 50%;
      margin-right: 10px;
    }

    #profile-bar {
      display: flex;
      align-items: center;
    }

    #profile-bar img {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      margin-right: 10px;
    }

    #basket-icon{
      display: flex;
      align-items: center;
    }

    #basket-icon img{
      width: 30px;
      height: 30px;
      border-radius: 50%;
      margin-right: 10px;
    }

    #cart-container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #1a1a1a;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center; /* Center the content */
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      color: #ffffff;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #660066;
    }

    .product-image {
      width: 200px; /* Set the desired width */
      height: auto; /* Let the height adjust automatically to maintain aspect ratio */
    }

    button {
      padding: 10px;
      background-color: #660066;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #4d004d;
    }

    .remove-button {
      background-color: #4d004d;
      color: #fff;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
    }

    .remove-button:hover {
      background-color: #4d004d;
    }
  </style>
</head>
<body>

  <nav>
    <div id="navbar">
      <img src="images/logo.png" alt="Icon">
      <div id="search-bar">
        <input type="text" placeholder="Search...">
      </div>
    </div>
  </nav>

  <div id="cart-container">
    <h2>Products</h2>
    <table border='1'>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
      </tr>
      <?php
      $host = 'localhost';
      $username = 'root';
      $password = '';
      $database = 'novadb';

      // Creating a new mysqli connection
      $conn = new mysqli($host, $username, $password, $database);

      // Checking if the connection was successful
      if ($conn->connect_error) {
          die("Communication failed:" . $conn->connect_error);
      }

      // Fetching products from the database
      $sql = "SELECT * FROM orders";
      $result = $conn->query($sql);

      // Checking if the query was successful
      if (!$result) {
          die("SQL Failed:" . $conn->error);
      }

      // Displaying products
      while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['description'] . "</td>";
          echo "<td>" . $row['price'] . "</td>";
          echo "</tr>";
      }

      // Free result set
      $result->free();

      // Close connection
      $conn->close();
      ?>
    </table>
  </div>

</body>
</html>
