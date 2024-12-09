<?php
include 'db.php';

$alert_message = "";  // กำหนดตัวแปรสำหรับเก็บข้อความ alert

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        $sql = "UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$name, $description, $price, $product_id])) {
            $alert_message = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                Product updated successfully!
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                              </div>";
        } else {
            $alert_message = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                Error: " . $stmt->errorInfo()[2] . "
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                              </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- เชื่อมโยงไปยัง Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Product</h2>

        <?php
        if ($alert_message) {
            echo $alert_message;  // แสดงข้อความแจ้งเตือน
        }
        ?>

        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control"><?php echo htmlspecialchars($product['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" class="form-control" value="<?php echo htmlspecialchars($product['price']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>

        <!-- ปุ่มกลับไปหน้า View Products -->
        <a href="view.php" class="btn btn-secondary mt-3">Back to View Products</a>
    </div>

    <!-- เชื่อมโยงไปยัง Bootstrap 5 JS และ Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
