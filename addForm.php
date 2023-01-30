<?php
    $title="แบบฟอร์มบันทึกข้อมูล";
    require_once "layout/header.php";
    require_once "db/connect.php";
    require_once "layout/check_admin.php";
    $result=$controller->getDivisions();

    if(isset($_POST["submit"])){
         $tel_id=$_POST["tel_id"];
         $division_id=$_POST["division_id"];
         $position=$_POST["position"];
         $rack=$_POST["rack"];
         $port=$_POST["port"];
         $status=$controller->insert($tel_id,$division_id,$position,$rack,$port);
         if($status){
            require_once "layout/success_message.php";
         }else{
            require_once "layout/success_message.php";
         }
    }
?>
<h1 class="text-center"><?php echo "แบบฟอร์มบันทึกข้อมูล";?></h1>
    <form method="POST" action="addForm.php">
            <div class="form-group my-3">
                <label for="tel_id">เบอร์โทรศัพท์</label>
                <input type="text" name="tel_id" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="division_id">เลือกสถานที่</label>
                <select name="division_id" class="form-control">
                    <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
                    <option value="<?php echo $row["division_id"];?>"><?php echo $row["division_name"]; ?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="form-group my-3">
                <label for="position">ตำแหน่ง Port</label>
                <input type="text" name="position" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="rack">เลือกตำแหน่งตู้ Rack</label>
                <input type="text" name="rack" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="port">หมายเลข Port</label>
                <input type="text" name="port" class="form-control">
            </div>
            <input type="submit" name="submit" value="บันทึก" class="btn btn-primary my-3">
    </form>
</div>
</body>
</html>