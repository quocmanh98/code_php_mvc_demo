<?php get_header();
global $error, $mail, $password; ?>
<?php
if (is_login()) {
    redirect_to("?");
}
?>
<div class="container">
    <div class="row">
        <div class='col-12'>
            <h2 class='text-center'>Đăng nhập</h2>
            <form action="?mod=users&controller=index&action=login" method='post'>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name='email' value="<?php set_value('mail') ?>"> <br>
                        <?php form_error('email') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password"> <br>
                        <?php form_error('password') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary" name='btn_login'>Submit</button>
                    </div>
                </div>
            </form>
            <?php form_error('account') ?>
        </div>
        <div class="alert alert-primary" role="alert">
            email: quocmanh1998s@gmail.com <br>
            password: A12345678
        </div>
    </div>
</div>
<?php get_footer() ?>