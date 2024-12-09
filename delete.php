<?php
include 'db.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$product_id])) {
        $alert_message = "<div class='alert alert-success' role='alert'>Product deleted successfully!</div>";
    } else {
        $alert_message = "<div class='alert alert-danger' role='alert'>Error: " . $stmt->errorInfo()[2] . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Delete Product</h2>
        
        <?php
        if (isset($alert_message)) {
            echo $alert_message;
        }
        ?>

        <a href="view.php" class="btn btn-secondary mt-3">Back to View Products</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
