<?php
include 'db.php';
include 'auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $cost = $_POST['cost'];
    $quantity = $_POST['quantity'];
    $expiry_date = $_POST['expiry_date'];

    $sql = "INSERT INTO medicines (name, brand, price, cost, quantity, expiry_date) 
            VALUES ('$name', '$brand', '$price', '$cost', '$quantity', '$expiry_date')";
    
    if ($conn->query($sql)) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Medicine - JojoMeds</title></head>
<body>
  <h2>Add New Medicine</h2>
  <form action="add.php" method="POST">
    Name: <input type="text" name="name" required><br><br>
    Brand: <input type="text" name="brand" required><br><br>
    Price (KES): <input type="number" name="price" step="0.01" required><br><br>
    Cost (KES): <input type="number" name="cost" step="0.01" required><br><br>
    Quantity: <input type="number" name="quantity" required><br><br>
    Expiry Date: <input type="date" name="expiry_date" required><br><br>
    <button type="submit">Add Medicine</button>
  </form>
</body>
</html>


