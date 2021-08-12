<?php
$id = $_GET["id"];

require __DIR__. './partials/db-connect.php';


//刪除檔案
$sql = "DELETE FROM `stores_list` WHERE `stores_list`.`sId` = $id";

//執行
$conn->query($sql);

//回到首頁
header("Location:index_.php");


