<?php
include 'db.php';
include 'auth.php';

// Total medicines
$total = $conn->query("SELECT COUNT(*) AS total FROM medicines")->fetch_assoc()['total'];

// Expiring soon
$expiring = $conn->query("SELECT COUNT(*) AS soon FROM medicines WHERE expiry_date <= CURDATE() + INTERVAL 30 DAY")->fetch_assoc()['soon'];

// Profit calculation (Sum of (price - cost) * qty)
$profit = $conn->query("SELECT SUM((price - cost) * quantity) AS profit FROM medicines")->fetch_assoc()['profit'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - JojoMeds</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <h2>Welcome <?= $_SESSION['username']; ?> (<?= $_SESSION['role']; ?>)</h2>
  <a href="add.php">Add Medicine</a> | 
  <a href="logout.php">Logout</a>

  <h3>Stats</h3>
  <ul>
    <li>Total Medicines: <?= $total ?></li>
    <li>Expiring Soon: <?= $expiring ?></li>
    <li>Estimated Profit: KES <?= number_format($profit, 2) ?></li>
  </ul>

  <canvas id="medChart" width="400" height="200"></canvas>

  <script>
  const ctx = document.getElementById('medChart').getContext('2d');
  const medChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Total Medicines', 'Expiring Soon', 'Profit (K)'],
      datasets: [{
        label: 'JojoMeds Stats',
        data: [<?= $total ?>, <?= $expiring ?>, <?= round($profit / 1000, 2) ?>],
        backgroundColor: ['blue', 'orange', 'green']
      }]
    }
  });
  </script>
</body>
</html>


