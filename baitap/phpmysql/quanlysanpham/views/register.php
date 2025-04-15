<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-5">Register Form</h1>

        <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>

        <form action="../controls/process.php" method="post">
            <div class="form-group">
                <input type="text" name="fullname" placeholder="Fullname" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" name="repeat_password" placeholder="Repeat Password" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" name="action" class="btn btn-primary" value="register">Register</button>
            </div>
            <div class="form-group">
                <p>Already have an account? <a href="login.php" class="text-decoration-none">Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>