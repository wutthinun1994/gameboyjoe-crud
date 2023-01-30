<?php
    $title="แบบฟอร์มแก้ไขข้อมูล";
    require_once "layout/header.php";
    require_once "db/connect.php";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $new_password=md5($password.$username);
        $result=$user->getUser($username,$new_password);

        if(!$result){
            echo '<div class="alert alert-danger">ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง</div>';
        }else{
            $_SESSION["username"]=$username;
            $_SESSION["userid"]=$result["id"];
            header("Location:index.php");
        }

        
    } 
?>

<h1 class="text-center"><?php echo "กรุณากรอกข้อมูลเพื่อเข้าใช้งาน";?></h1>
    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
            <div class="form-group my-3">
                <label for="username">Username</label>
                <input type="text" 
                name="username" 
                value="<?php if($_SERVER["REQUEST_METHOD"]=="POST") echo $_POST["username"];?>"
                class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $tel["position"] ?>">
            </div>
            <input type="submit" name="submit" value="เข้าสู่ระบบ" class="btn btn-primary">
    </form>
</div>
</body>
</html>