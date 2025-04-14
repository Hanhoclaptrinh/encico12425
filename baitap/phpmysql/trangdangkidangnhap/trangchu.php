<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: dangnhap.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Trang chủ</h1><br>
    <h2>Xin chào: <?php echo $_SESSION['full_name']; ?></h2>
    <form action="xuly.php" method="post">
        <button type="submit" name="action" value="logout" class="btn btn-danger">Logout</button>
    </form>
</body>
</html>