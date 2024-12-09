<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // ตรวจสอบว่าชื่อผู้ใช้ซ้ำในฐานข้อมูลหรือไม่
    $sql_check = "SELECT * FROM users WHERE username = ?";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([$username]);
    $existingUser = $stmt_check->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        $message = "Username already taken. Please choose a different username.";
        $alertClass = "alert-danger"; // ใช้สีแดงสำหรับข้อผิดพลาด
    } else {
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$username, $password])) {
            $message = "Registration successful! Welcome, $username.";
            $alertClass = "alert-success"; // ใช้สีเขียวสำหรับข้อความสำเร็จ
        } else {
            $message = "Error: " . $stmt->errorInfo();
            $alertClass = "alert-danger"; // ใช้สีแดงสำหรับข้อผิดพลาด
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="register-form bg-white p-5 shadow rounded" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Register</h2>

        <?php if (isset($message)) : ?>
            <div class="alert <?php echo $alertClass; ?> text-center" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" required>
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <p class="mt-3 text-center">Already have an account? <a href="login.php">Login here</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
