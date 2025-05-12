<?php
include 'db.php';
include 'auth.php';

if ($_SESSION['role'] != 'admin') {
    echo "Access Denied!";
    exit();
}

// Fetch users
$result = $conn->query("SELECT * FROM users");

?>

<!DOCTYPE html>
<html>
<head><title>User Management - JojoMeds</title></head>
<body>
  <h2>Manage Users</h2>
  <a href="add_user.php">Add New User</a><br><br>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Role</th>
      <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['username'] ?></td>
      <td><?= ucfirst($row['role']) ?></td>
      <td>
        <a href="edit_user.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete_user.php?id=<?= $row['id'] ?>">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
