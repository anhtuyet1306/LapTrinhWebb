<?php
$name = "";
$email = "";
$subject = "";
$content = "";
$message = "";
$messageType = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $content = trim($_POST["content"] ?? "");
    if ($name == "" || $content == "") {
        $message = "Vui lòng nhập đầy đủ thông tin bên dưới!";
        $messageType = "error";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Email không đúng định dạng!";
        $messageType = "error";
    }
    else {
        $message = "Gửi liên hệ thành công!";
        $messageType = "success";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form liên hệ</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
        }
        .form-box {
            width: 450px;
            margin: 50px auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h2 {
            text-align: center;
            color: #000000;
        }
        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input,
        textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea {
            height: 100px;
        }
        button {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            padding: 10px;
            margin-bottom: 15px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 5px;
        }
        .success {
            padding: 10px;
            margin-bottom: 15px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="form-box">
    <h2>LIÊN HỆ</h2>
    <?php if ($message != ""): ?>
    <?php if ($messageType == "error"): ?>
        <div class="error">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php else: ?>
        <div class="success">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
    <form method="POST" enctype="multipart/form-data">
        <p>
            Họ tên:
            <input type="text"
                   name="name"
                   value="<?= htmlspecialchars($name) ?>">
        </p>
        <p>
            Email:
            <input type="text"
                   name="email"
                   value="<?= htmlspecialchars($email) ?>">
        </p>
        <p>
            Chủ đề:
            <input type="text"
                   name="subject"
                   value="<?= htmlspecialchars($subject) ?>">
        </p>
        <p>
            Nội dung:
            <textarea name="content"><?= htmlspecialchars($content) ?></textarea>
        </p>
        <p>
            Ảnh đại diện:
            <input type="file" name="avatar">
        </p>
        <button type="submit">Gửi liên hệ</button>
    </form>
</div>
</body>
</html>