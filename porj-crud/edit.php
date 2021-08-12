<?php

$id = $_GET["id"];

require __DIR__. './partials/db-connect.php';

//依據id 來找到目前的位置
$sql = "SELECT * FROM `stores_list` WHERE `sId` = $id ORDER BY `sId` DESC";

//查詢資料
$result = $conn->query($sql);

// //得到一條row陣列資料
$res = $result->fetch_assoc();

?>

<?php include __DIR__ . './partials/html-head.php'; ?>
<?php include __DIR__ . './partials/navnar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">編輯門市資訊</h5>
                    <form name="form1" action="./edit-list.php">
                        <!-- 項次因為不用顯示所以hidden隱藏 -->
                        <input hidden name="eid" value="<?php echo $res['sId'];?>" type="text">
                        <div class="form-group">
                            <label for="name">藥局名稱</label>
                            <input type="text" class="form-control" name="pName" 
                            value="<?php echo $res['sName']; ?>">
                           
                        </div>
                        <div class="form-group">
                            <label for="text">地址</label>
                            <input type="text" class="form-control" name="pAddress" value="<?php echo $res['s_address']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">電話</label>
                            <input type="text" class="form-control" name="pPhone" value="<?php echo $res['sLocal_phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="time">營業時間</label>
                            <input type="text" class="form-control" name="pTime" value="<?php echo $res['s_time']; ?>">
                        </div>

                        <button type="submit" class="btn btn-primary"> 更新 </button>
                    </form>
                </div>
            </div>

        </div>
    </div>


<?php include __DIR__ . './partials/scripts.php'; ?>
<?php include __DIR__ . './partials/html-foot.php'; ?>