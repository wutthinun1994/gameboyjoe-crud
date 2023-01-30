<?php
    $title="หน่วยบัญชาการทหารพัฒนา";
    require_once "layout/header.php";
    require_once "db/connect.php";
    require_once "layout/check_admin.php";
    $result=$controller->getTelephones();
?>
<h1 class="text-center"><?php echo 'ข้อมูลเบอร์โทรศัพท์ นทพ.';?></h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">เบอร์โทรศัพท์</th>
      <th scope="col">สถานที่</th>
      <th scope="col">ตำแหน่ง</th>
      <th scope="col">ตู้กระจายสัญญาณ</th>
      <th scope="col">หมายเลข Port</th>
      <th scope="col">การดำเนินการ</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
    <tr>
      <td scope="row"><?php echo $row["tel_id"] ?></td>
      <td scope="row"><?php echo $row["division_name"] ?></td>
      <td scope="row"><?php echo $row["position"] ?></td>
      <td scope="row"><?php echo $row["rack"] ?></td>
      <td scope="row"><?php echo $row["port"] ?></td>
      <td>
        <a onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?')"
        href="delete.php?id=<?php echo $row["tel_id"];?>" class="btn btn-danger">ลบข้อมูล</a>
        <a href="editForm.php?id=<?php echo $row["tel_id"];?>" class="btn btn-warning">แก้ไขข้อมูล</a>
      </td>
    </tr>
    <?php  }?>
  </tbody>
</table>
</div>
</body>
</html>