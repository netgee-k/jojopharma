<?php
include 'db.php';
include 'auth.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM medicines WHERE id=$id");
$medicine = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $cost = $_POST['cost'];
    $quantity = $_POST['quantity'];
    $expiry_date = $_POST['expiry_date'];

    $sql = "UPDATE medicines 
            SET name='$name', brand='$brand', price='$price', cost='$cost', quantity='$quantity', expiry_date='$expiry_date' 
            WHERE id=$id";
    
    if ($conn->query($sql)) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Medicine - JojoMeds</title></head>
<body>
  <h2>Edit Medicine</h2>
  <form action="edit.php?id=<?= $id ?>" method="POST">
    Name: <input type="text" name="name" value="<?= $medicine['name'] ?>" required><br><br>
    Brand: <input type="text" name="brand" value="<?= $medicine['brand'] ?>" required><br><br>
    Price (KES): <input type="number" name="price" value="<?= $medicine['price'] ?>" step="0.01" required><br><br>
    Cost (KES): <input type="number" name="cost" value="<?= $medicine['cost'] ?>" step="0.01" required><br><br>
    Quantity: <input type="number" name="quantity" value="<?= $medicine['quantity'] ?>" required><br><br>
    Expiry Date: <input type="date" name="expiry_date" value="<?= $medicine['expiry_date'] ?>" required><br><br>
    <button type="submit">Update Medicine</button>
  </form>
</body>
</html>

