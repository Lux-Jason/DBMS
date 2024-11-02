<?php
// 检查是否有row_id被提交
if(isset($_POST['row_id'])) {
    // 获取提交的row_id值
    $row_id = $_POST['row_id'];

    // 现在可以在这里对row_id进行任何你想要的处理
    // 例如，将其用于数据库查询或其他操作

    // 示例：输出row_id的值
    echo "Received row_id: $row_id";
} else {
    // 如果没有提交row_id，则输出错误信息或执行其他操作
    echo "No row_id submitted!";
}
?>