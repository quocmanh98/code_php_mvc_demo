<?php get_header(); global $error,$mail,$success; ?>
<div class="container">
    <div class="row">
        <div class='col-12 '>
            <div class='reset p-5'>
                <h2 class='text-center'>Quên mật khẩu</h2>
                <form action="" method='post'>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name='email' value="<?= set_value('mail')  ?>"> <br>
                            <?php form_error('email') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary" name='btn_forgot'>Submit</button>
                        </div>
                    </div>
                </form>
                <?php form_error('account') ?>
            </div>
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