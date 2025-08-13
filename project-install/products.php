<?php
// products.php
require 'config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = $_GET['search'] ?? '';
$where = '';
$params = [];
$types = '';

if (!empty($search)) {
    $where = " WHERE name LIKE ? OR description LIKE ?";
    $searchTerm = "%$search%";
    $params = [$searchTerm, $searchTerm];
    $types = 'ss';
}

$sql = "SELECT * FROM products $where ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products - <?= htmlspecialchars(APP_NAME) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 1200px; margin: 0 auto; padding: 20px; }
        .product { border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; }
        .search-box { margin: 20px 0; }
    </style>
</head>
<body>
    <h1>Our Products</h1>
    
    <div class="search-box">
        <form method="GET">
            <input type="text" name="search" placeholder="Search products..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </div>
    
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="product">
                <h2><?= htmlspecialchars($row['name']) ?></h2>
                <p><?= htmlspecialchars($row['description']) ?></p>
                <p>Price: $<?= number_format($row['price'], 2) ?></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
    
    <?php $conn->close(); ?>
</body>
</html>