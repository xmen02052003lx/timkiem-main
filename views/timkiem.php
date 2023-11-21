<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tìm Kiếm và Phân Trang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div id="content">
        <div>
        <input type="text" id="searchKeyword" placeholder="Nhập từ khóa">
        <button onclick="search()">Search</button>
        </div>
        <div>
        <input type="text" id="newWord" placeholder="Thêm sản phẩm">
        <button onclick="addWord()">Add</button>
</div>
        <ul id="wordList"></ul>
        <div id="pagination"></div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>
