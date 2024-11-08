<?php
// Include the database connection file
include 'db_connection.php';

// Connect to the SQLite database
$db = connectDatabase();

// Fetch all products from the database
$query = "SELECT * FROM products";
$result = $db->query($query);

if (!$result) {
    die("Error fetching students: " . $db->lastErrorMsg());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Products</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
<div style="display: flex; align-items: center; justify-content: space-between">
    <h1>Product List</h1>
    <a href="add_product_form.php">
        Add Product
    </a>
</div>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($result): ?>
        <?php while ($product = $result->fetchArray(SQLITE3_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['id']); ?></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['description']); ?></td>
                <td><?php echo htmlspecialchars($product['price']); ?></td>
                <td>
                    <form action="delete_product.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                    <form action="update_product_form.php" method="get" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">No products found.</td>
        </tr>
        <?php  while ($product = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr><td>{$product['id']}</td><td>{$product['name']}</td>...</tr>";
        }
    endif; ?>
    </tbody>
</table>
</body>
</html>
