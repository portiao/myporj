<?php
// 定義資料庫資訊
$db_host = 'localhost';  // 主機名稱
$db_name = 'stores';  // 資料庫名稱
$db_user = 'root';// 資料庫管理帳號
$db_pass = '';// 資料庫管理密碼


// 連接 MySQL 資料庫伺服器
$conn = mysqli_connect($db_host, $db_user, $db_pass,$db_name);
if (empty($conn)) {
    print mysqli_error($conn);
    die("資料庫連接失敗！");
    exit;
}

// //選取資料庫--測試用
// if (!mysqli_select_db($conn, $db_name)) {
//     die("選取資料庫失敗！");
// } else {
//     echo "連接 " . $db_name . " 資料庫成功！<br>";
// }

// 設定連線編碼
mysqli_query($conn, "SET NAMES 'UTF-8'");



