<?php require_once "inc/header.php" ?>
<?php

if (isset($_SESSION['login_user']) == false) {
    header("location: index.php?act=login");
    exit();
}
$u = $_SESSION['login_user'];
$email = $_SESSION['login_email'];
?>

<?php
if (isset($_POST['btn'])) {
    $u = $_SESSION['login_user'];
    $pass_old = md5($_POST['pass_old']);
    $pass_new1 = md5($_POST['pass_new1']); 
    $pass_new2 = md5($_POST['pass_new2']);
    $pass_new1 = trim(strip_tags($pass_new1));
    $pass_new2 = trim(strip_tags($pass_new2));
    $error = array();
    $kq = checkuser($email, $pass_old);
    if ($pass_old != $kq['mat_khau']) {
        $error['error'] = "Mật khẩu không đúng";
    } else {
        if (strlen($_POST['pass_new1']) >= 6 ) {
            if ($pass_new1 == $pass_new2) {
                update_user($pass_new1, $u);
                $noti = "Cập nhật thành công";
            }else{
                $error['error'] = " 2 Mật khẩu không khớp nhau";
            }
        }else{
            $error['error'] = "Mật khẩu mới quá ngắn";
        }
    }
}


?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
<br>
<h1 style="text-align: center;">Đổi Mật Khẩu</h1>
<form action="" method="post" id="frmlogin" class="border border-primary col-5
m-auto p-2">
    <div class="form-group">
        <label>Username</label> <input name="username" type="text" class="form-control" disabled value="<?= $u; ?>" />
    </div>
    <div class="form-group">
        <label for="mail">Gmail: </label>
        <input type="text" id="mail" name="mail"disabled value="<?= $email; ?>" > <br>
    </div>
    <div class="form-group">
        <label>Mật khẩu cũ</label> <input name="pass_old" type="password" class="form-control" />
    </div>
    <div class="form-group">
        <label>Mật khẩu mới</label> <input name="pass_new1" type="password" class="formcontrol" />
    </div>
    <div class="form-group">
        <label>Nhập lại mật khẩu mới</label> <input name="pass_new2" type="password" class="formcontrol" />
    </div>
    <div class="form-group">
        <input name="btn" type="submit" value="Cập nhật" class="btn btn-primary" />
    </div>
    <p class="error">
        <?php
        if (!empty($error['error'])) {
            echo $error['error'];
        }
        ?>
    </p>
    <p class="error">
        <?php
        if (!empty($noti)) {
            echo $noti;
        }
        ?>
    </p>
</form>
<br>
<?php require_once "inc/footer.php" ?>