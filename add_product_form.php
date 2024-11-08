<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
<form action="add_product.php" method="POST">
    <label for="name">Name:</label><br/>
    <input type="text" name="name" id="name" required>
    <br />
    <label for="description">Description:</label><br/>
    <textarea name="description" id="description" rows="4" cols="50" required></textarea>
    <br />
    <label for="price">Price:</label><br/>
    <input type="number" name="price" id="price" required>
    <br />
    <button type="submit">Add Product</button>
</form>
</body>
