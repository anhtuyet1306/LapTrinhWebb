<?php
$posts = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $posts[] = [
        "title" => $_POST["title"],
        "author" => $_POST["author"],
        "category" => $_POST["category"]
    ];
}
function status($category)
{
    if ($category == "Thông báo") {
        return "Quan trọng";
    }
    return "Bình thường";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý bài viết</title>
</head>
<body>
<h1>Quản lý bài viết của Khoa</h1>
<form method="POST">
    Tiêu đề:
    <input type="text" name="title" required>
    <br><br>
    Tác giả:
    <input type="text" name="author" required>
    <br><br>
    Chuyên mục:
    <select name="category">
        <option>Thông báo</option>
        <option>Học tập</option>
        <option>Nghiên cứu khoa học</option>
    </select>
    <br><br>
    <button type="submit">Thêm bài viết</button>
</form>
<?php if (count($posts) > 0) { ?>
<h2>Danh sách bài viết</h2>
<table border="1">
    <tr>
        <th>STT</th>
        <th>Tiêu đề</th>
        <th>Tác giả</th>
        <th>Chuyên mục</th>
        <th>Trạng thái</th>
    </tr>
    <?php foreach ($posts as $i => $post) { ?>
    <tr>
        <td><?php echo $i + 1; ?></td>
        <td><?php echo $post["title"]; ?></td>
        <td><?php echo $post["author"]; ?></td>
        <td><?php echo $post["category"]; ?></td>
        <td><?php echo status($post["category"]); ?></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>
</body>
</html>
