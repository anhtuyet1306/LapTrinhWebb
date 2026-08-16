<?php
$posts = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $posts[] = [
        "title" => $_POST["title"],
        "author" => $_POST["author"],
        "category" => $_POST["category"]
    ];
}
function getStatus($category)
{
    if ($category == "Thông báo") {
        return "Quan trọng";
    } else {
        return "Bình thường";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý bài viết</title>
</head>
<body>
<h1>Quản lý bài viết của Khoa</h1>
<h2>Thêm bài viết</h2>
<form method="POST">
    <p>
        <label>Tiêu đề bài viết:</label><br>
        <input type="text" name="title" required>
    </p>
    <p>
        <label>Tác giả:</label><br>
        <input type="text" name="author" required>
    </p>
    <p>
        <label>Chuyên mục:</label><br>
        <select name="category">
            <option value="Thông báo">Thông báo</option>
            <option value="Hoạt động của Khoa">Hoạt động của Khoa</option>
            <option value="Học tập">Học tập</option>
            <option value="Nghiên cứu khoa học">Nghiên cứu khoa học</option>
        </select>
    </p>
    <button type="submit">Thêm bài viết</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
?>
    <h2>Danh sách bài viết</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Tác giả</th>
            <th>Chuyên mục</th>
            <th>Trạng thái</th>
        </tr>
        <?php foreach ($posts as $index => $post) { ?>
            <tr>
                <td>
                    <?php echo $index + 1; ?>
                </td>
                <td>
                    <?php echo $post["title"]; ?>
                </td>
                <td>
                    <?php echo $post["author"]; ?>
                </td>
                <td>
                    <?php echo $post["category"]; ?>
                </td>
                <td>
                    <?php echo getStatus($post["category"]); ?>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php
}
?>
</body>
</html>
