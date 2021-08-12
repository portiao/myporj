<?php include __DIR__ . './partials/init.php';?>
<?php include __DIR__ . './partials/html-head.php'; ?>
<?php include __DIR__ . './partials/navnar.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">新增門市</h5>
                    <form name="form1" action="./add-list.php">
                        <div class="form-group">
                            <label for="name">藥局名稱</label>
                            <input type="text" class="form-control" name="pName">
                           
                        </div>
                        <div class="form-group">
                            <label for="text">地址</label>
                            <input type="text" class="form-control" name="pAddress">
                        </div>
                        <div class="form-group">
                            <label for="phone">電話</label>
                            <input type="text" class="form-control" name="pPhone">
                        </div>
                        <div class="form-group">
                            <label for="time">營業時間</label>
                            <input type="text" class="form-control" name="pTime">
                        </div>

                        <button type="submit" class="btn btn-primary"> OK </button>
                    </form>
                </div>
            </div>

        </div>
    </div>


<?php include __DIR__ . './partials/scripts.php'; ?>
<?php include __DIR__ . './partials/html-foot.php'; ?>