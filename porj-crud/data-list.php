<?php

require __DIR__. './partials/init.php';
$title = "薬局";

//如果沒有啟用 session, 就啟用
// if(! isset($_SESSION)) {
//     session_start();
// }

//建立一個$page幾頁的變數
$perPage = 7; //固定一頁最多有幾筆資訊

//用戶決定查看幾頁，預設為 1
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;


//總共有幾筆； 
//取得單筆資料用 fetch(PDO::FETCH_ASSOC)，取得多筆資料用fetchAll(PDO::FETCH_ASSOC)
//這裡用FETCH_NUM (是不需要欄位名稱)，後面使用索引是陣列，因為是一筆資料，陣列為0
$totalRows = $PDO->query("SELECT count(1) FROM stores_list")->fetch(PDO::FETCH_NUM)[0];
// echo $totalRows; exit;  //到這邊還是正常的

//總共有幾頁，才能產生分頁按鈕
//總頁數 = 總比數 / 每頁幾筆
$totalPages = ceil($totalRows / $perPage); // ceil 正數，無條件進位
// echo "$totalRows, $totalPages"; exit; //查看狀態是否正確


//SELECT * FROM stores_list ORDER BY sid DESC LIMIT 0, 7
$sql = sprintf("SELECT * FROM stores_list ORDER BY sid DESC LIMIT %s, %s",
        ($page-1)*$perPage, $perPage);

$rows = $PDO->query($sql)
            ->fetchAll();

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
                //取得資料--(全部)
                // $sql = "SELECT * FROM `stores_list`";
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
<script>
    //設定頁面的回應及提醒方式
    //先預設為通過，只要一個不通過，就是錯誤。
    //先建立一個變數為true,再看底下條件，其中一個條件成立那就把isPass = false (不通過)
    function sendForm(){
        let isPass = true;
        document.form1.pName.nextElementSibling.style.display = 'none';
        document.form1.pAddress.nextElementSibling.style.display = 'none';
        document.form1.pPhone.nextElementSibling.style.display = 'none';
        document.form1.pTime.nextElementSibling.style.display = 'none';

        if( ! document.form1.pName.value){
            document.form1.pName.nextElementSibling.style.display = 'block';
            isPass = false;
        }
        if( ! document.form1.pAddress.value){
            document.form1.pAddress.nextElementSibling.style.display = 'block';
            isPass = false;
        }
        if( ! document.form1.pPhone.value){
            document.form1.pPhone.nextElementSibling.style.display = 'block';
            isPass = false;
        }
        if( ! document.form1.pTime.value){
            document.form1.pTime.nextElementSibling.style.display = 'block';
            isPass = false;
        }

        if (isPass){
            //fd=form data
            const fd = new FormData(document.form1);

            fetche('add-list.php',{
                method:'POST',
                body:fd,
            })
            // .then(r=>.text())
            // .then(txt=>{
            //     console.log('result:',txt);
            // })
        }
    }
</script>
<?php include __DIR__ . './partials/html-foot.php'; ?>
