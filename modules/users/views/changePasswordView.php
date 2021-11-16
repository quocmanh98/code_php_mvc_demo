<?php get_header() ?>
<?php
global $error, $list_users, $item,$success;
if (!is_login()) {
    redirect_to("?mod=users&controller=index&action=login");
}

?>
<div class="container">
    <div class="row">
        <div class='col-12'>
            <h2 class='text-center'>Đổi mật khẩu</h2>
            <form action="" method='post'>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name='email' disabled value="<?= $item['mail']  ?>"> <br>
                        <?php form_error('email') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="passwordold" class="col-sm-2 col-form-label">Mật khẩu cũ</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="passwordold" name="password">
                        <br>
                        <?php form_error('password') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="passwordnew" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="passwordnew" name="passwordnew">
                        <br>
                        <?php form_error('passwordnew') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirmpasswordnew" class="col-sm-2 col-form-label">Nhập lại mật khẩu mới</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="confirmpasswordnew" name="confirmpasswordnew">
                        <br>
                        <?php form_error('confirmpasswordnew') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name='btn_change'>Submit</button>
                    </div>
                </div>
                <?php form_error('account') ?>
            </form>
            <?php
            if (!empty($success['account'])) {
            ?>
                <div class="alert alert-success m-5" role="alert">
                    <?= $success['account']; ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php get_footer() ?>