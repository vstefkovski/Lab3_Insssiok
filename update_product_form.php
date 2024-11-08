<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $db = connectDatabase();

    // Fetch the current details of the student
    $stmt = $db->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $product = $result->fetchArray(SQLITE3_ASSOC);

    $db->close();
} else {
    die("Invalid product ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
</head>
<body>
<h1>Update Product</h1>

<?php if ($product): ?>
    <form action="update_product.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4" cols="50" required><?php echo htmlspecialchars($product['description']); ?></textarea><br><br>
        <label for="age">Age:</label>
        <input type="number" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required><br><br>
        <button type="submit">Update Product</button>
    </form>
<?php else: ?>
    <p>Product not found.</p>
<?php endif; ?>
</body>
</html>
