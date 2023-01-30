<?php
    $title="แบบฟอร์มแก้ไขข้อมูล";
    require_once "layout/header.php";  
    require_once "db/connect.php";
    require_once "layout/check_admin.php";

if(!isset($_GET["id"])){
    header("Location:index.php");
}else{
    $id=$_GET["id"];
    $tel=$controller->getTelephoneDetail($id);
    
}
    $result=$controller->getDivisions();
?>

<h1 class="text-center"><?php echo "แบบฟอร์มแก้ไขข้อมูล";?></h1>
    <form method="POST" action="updateTelephone.php">
        <input type="hidden" name="tels_id" value="<?php echo $tel["tel_id"]?>"/>
            <div class="form-group my-3">
                <label for="tel_id">เบอร์โทรศัพท์</label>
                <input type="text" name="tel_id" class="form-control" value="<?php echo $tel["tel_id"] ?>">
            </div>
            <div class="form-group my-3">
                <label for="division_id">เลือกสถานที่</label>
                <select name="division_id" class="form-control" value="<?php echo $tel["division_id"] ?>">
                    <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
                    <option 
                    <?php if($row["division_id"] == $tel["division_id"]) echo "selected"?>
                    value="<?php echo $row["division_id"];?>"><?php echo $row["division_name"]; ?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="form-group my-3">
                <label for="position">ตำแหน่ง Port</label>
                <input type="text" name="position" class="form-control" value="<?php echo $tel["position"] ?>">
            </div>
            <div class="form-group my-3">
                <label for="rack">เลือกตำแหน่งตู้ Rack</label>
                <input type="text" name="rack" class="form-control" value="<?php echo $tel["rack"] ?>">
            </div>
            <div class="form-group my-3">
                <label for="port">หมายเลข Port</label>
                <input type="text" name="port" class="form-control" value="<?php echo $tel["port"] ?>">
            </div>
            <input type="submit" name="submit" value="อัพเดทข้อมูล" class="btn btn-outline-info">
    </form>
</div>
</body>
</html>