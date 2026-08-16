<?php
$users = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $users[] = [
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "role" => $role
    ];
}
function getRoleName($role)
{
    if ($role == "admin") {
        return "Quản trị viên";
    } else {
        return "Người dùng";
    }
}
function getStatus($email)
{
    if (!empty($email)) {
        return "Hoạt động";
    } else {
        return "Chưa hoạt động";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 30px;
        }
        .container {
            width: 900px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }
        h1, h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #007bff;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>QUẢN LÝ NGƯỜI DÙNG</h1>
    <form method="POST">
        <div class="form-group">
            <label>Họ tên</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" required>
        </div>
        <div class="form-group">
            <label>Vai trò</label>
            <select name="role">
                <option value="user">Người dùng</option>
                <option value="admin">Quản trị viên</option>
            </select>
        </div>
        <button type="submit">Thêm người dùng</button>
    </form>
    <h2>DANH SÁCH NGƯỜI DÙNG</h2>
    <table>
        <tr>
            <th>STT</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Vai trò</th>
            <th>Trạng thái</th>
        </tr>
        <?php if (count($users) > 0): ?>
            <?php foreach ($users as $index => $user): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td>
                        <?php echo $user["name"]; ?>
                    </td>
                    <td>
                        <?php echo $user["email"]; ?>
                    </td>
                    <td>
                        <?php echo getRoleName($user["role"]); ?>
                    </td>
                    <td>
                        <?php echo getStatus($user["email"]); ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        <?php else: ?>
            <tr>
                <td colspan="5">
                    Chưa có người dùng
                </td>
            </tr>
        <?php endif; ?>
    </table>
</div>
</body>
</html>
