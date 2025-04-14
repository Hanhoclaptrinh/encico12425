<!-- 📝 Bài 9: Form liên hệ
Tên, Email, Tiêu đề, Nội dung (textarea).

Kiểm tra các trường bắt buộc.

In nội dung ra sau khi gửi (giống như gửi mail giả lập). -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form lien he</h1> <br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="name">Name: <input type="text" name="name" required placeholder="Your name"></label> <br>
        <label for="email">Email: <input type="email" name="email" required placeholder="Your email"></label> <br>
        <label for="subject">Subject: <input type="text" name="subject" required placeholder="Subject"></label> <br>
        <label for="message">Message: <textarea name="message" id="" cols="30" rows="10" required placeholder="Enter message here"></textarea></label> <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        echo "Name: {$name} <br>";
        echo "Email: {$email} <br>";
        echo "Subject: {$subject} <br>";
        echo "Message: {$message} <br>";
    } else {
        echo "Vui long nhap day du thong tin";
    }
}