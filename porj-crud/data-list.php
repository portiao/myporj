<?php

require __DIR__. './partials/db-connect.php';
$title = "薬局";

// 如果沒有啟用 session, 就啟用
if(! isset($_SESSION)) {
    session_start();
}


// //固定一頁有幾筆資訊
// $perPage = 6;

// //用戶決定查看幾頁，預設為1
// $page = isset($_GET['page']) ? intval($_GET['page']) : 1 ;


//總共有幾筆
// $totalRows = $conn->query("SELECT count(1) FROM stores_list")->fetch(PDO::FETCH_NUM)[0];
// echo $totalRows; exit;

//總共有幾頁

// SELECT * FROM `stores_list` ORDER BY `sId` ASC
//資料列表
// $rows = $conn->query("SELECT * FROM stores_list ORDER BY sid ASC LIMIT 10")->fetchAll();

?>
<style>
    button>a{
        text-decoration:none;
        color:white;
    }
    .pd-word{
        margin: 0;
        padding: 20px 0;
    }
    
    
</style>
<?php include __DIR__ . './partials/html-head.php'; ?>
<?php include __DIR__ . './partials/navnar.php'; ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <h2 class="pd-word">藥局門市資訊</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">藥局名稱</th>
                    <th scope="col">地址</th>
                    <th scope="col">電話</th>
                    <th scope="col">營業時間</th>
                    <th scope="col">刪除</th>
                    <th scope="col">編輯</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //取得資料
                $sql = "SELECT * FROM `stores_list`";
                $result = $PDO->query($sql);
                ?>
                <?php
                //--顯示資料--//
                //取得單筆資料
                //fetch_assoc()：將讀出的資料Key值設定為該欄位的欄位名稱。
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    //var_dump($row);  
                ?>
                    <tr>
                        <td> <?php echo $row["sName"]; ?> </td>
                        <td> <?php echo $row["s_address"]; ?> </td>
                        <td> <?php echo $row["sLocal_phone"]; ?> </td>
                        <td> <?php echo $row["s_time"]; ?> </td>
                        <td>
                            <!-- 刪除 -->
                            <!-- del.php透過這個$_GET來取得編號的數字 -->
                            <a href="del.php?id=<?php echo $row['sId'] ?>">
                                <img src="./image/delete.png" alt="">
                            </a>
                        </td>
                        <td>
                            <!-- 編輯 -->
                            <a href="edit.php?id=<?php echo $row['sId'] ?>">
                                <img src="./image/edit.png" alt="">
                            </a>
                        </td>

                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

    </div>
    <div>
    
        <button type="submit" class="btn btn-secondary">
            <a href="add.php">新增藥局資訊</a>   
        </button>
    </div>
</div>

<?php include __DIR__ . './partials/scripts.php'; ?>
<?php include __DIR__ . './partials/html-foot.php'; ?>
