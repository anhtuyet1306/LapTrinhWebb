<?php
$posts = [
    [
        "title" => "Học PHP cơ bản",
        "author" => "Nguyễn An",
        "category" => "Lập trình"
    ],
    [
        "title" => "HTML và CSS",
        "author" => "Trần Bình",
        "category" => "Web"
    ],
    [
        "title" => "Tìm hiểu JavaScript",
        "author" => "Lê Anh",
        "category" => "Lập trình"
    ]
];
function searchPost($posts, $keyword)
{
    $result = [];
    foreach ($posts as $post) {
        if (stripos($post["title"], $keyword) !== false) {
            $result[] = $post;
        }
    }
    return $result;
}
$keyword = "";
$error = "";
$result = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = trim($_POST["keyword"]);
    if ($keyword == "") {
        $error = "Vui lòng nhập từ khóa.";
    }
    elseif (mb_strlen($keyword) > 50) {
        $error = "Từ khóa không được quá 50 ký tự.";
    }
    else {
        $result = searchPost($posts, $keyword);
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tìm kiếm bài viết</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 24px;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #222;
        }
        .container {
            width: min(900px, 100%);
            margin: auto;
        }
        .box {
            background: white;
            padding: 22px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        h1 {
            margin-top: 0;
            color: #1d4ed8;
            text-align: center;
        }
        form {
            display: grid;
            gap: 10px;
        }
        label {
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            width: 120px;
            padding: 10px;
            color: white;
            background: #1d4ed8;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .error {
            color: #b91c1c;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background: #e5edff;
        }
        @media (max-width: 600px) {
            body {
                padding: 12px;
            }
            .box {
                padding: 18px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <section class="box">
        <h1>TÌM KIẾM BÀI VIẾT</h1>
        <form method="POST">
            <label for="keyword">Từ khóa:</label>
            <input
                type="text"
                id="keyword"
                name="keyword"
                placeholder="Nhập tên bài viết..."
                value="<?php echo htmlspecialchars($keyword); ?>"
            >
            <?php if ($error != "") { ?>

                <div class="error">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php } ?>
            <button type="submit">
                Tìm kiếm
            </button>
        </form>
    </section>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $error == "") { ?>
        <section class="box">
            <h2>Kết quả tìm kiếm</h2>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Tác giả</th>
                    <th>Chuyên mục</th>
                </tr>
                <?php if (count($result) > 0) { ?>
                    <?php foreach ($result as $index => $post) { ?>
                        <tr>
                            <td>
                                <?php echo $index + 1; ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($post["title"]); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($post["author"]); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($post["category"]); ?>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4">
                            Không tìm thấy bài viết.
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </section>
    <?php } ?>
</div>
</body>
</html>