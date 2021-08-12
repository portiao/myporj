<?php

include __DIR__ . './partials/init.php';
$title = "藥局";

// 如果沒有啟用 session, 就啟用
if(! isset($_SESSION)) {
    session_start();
}
?>
<style>
    button>a{
        text-decoration:none;
        color:white;

    }
</style>
<?php include __DIR__ . './partials/html-head.php'; ?>
<?php include __DIR__ . './partials/navnar.php'; ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <h2>藥局門市資訊</h2>

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
                $result = mysqli_query($conn, $sql)
                ?>
                <?php
                //--顯示資料--//
                // 測試一次
                // var_dump($result-> fetch_assoc());
                while ($row = $result->fetch_assoc()) {
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
                                <!-- <i class="fas fa-minus-circle"></i> -->
                            </a>
                        </td>
                        <td>
                            <!-- 編輯 -->
                            <a href="edit.php?id=<?php echo $row['sId'] ?>">
                                <img src="./image/edit.png" alt="">
                                <!-- <i class="fas fa-edit"></i> -->
                            </a>
                        </td>

                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>

    </div>
    <div">
    
        <button type="button" class="btn btn-secondary">
            <a href="add.php">新增藥局資訊</a>   
        </button>
    </div>
</div>
<?php include __DIR__ . './partials/scripts.php'; ?>
<?php include __DIR__ . './partials/html-foot.php'; ?>