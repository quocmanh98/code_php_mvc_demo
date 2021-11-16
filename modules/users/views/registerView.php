<?php get_header();
global $error, $username, $fullname, $mail, $confirmpassword, $password, $address, $gender, $birthday, $phone; ?>
<div class="container">
    <div class="row">
        <div class='col-12'>
            <h2 class='text-center'>Đăng ký thành viên</h2>
            <form action="" method="post">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name='username' value="<?php set_value('username')?>"> <br>
                        <?php form_error('username') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fullname" name='fullname' value="<?php set_value('fullname')?>"> <br>
                        <?php form_error('fullname') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name='email' value="<?php set_value('mail')?>"> <br>
                        <?php form_error('email') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="password" name="password" > <br>
                        <?php form_error('password') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirmpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword""> <br>
                        <?php form_error('confirmpassword') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="phone" name="phone" value="<?php set_value('phone')?>"> <br>
                        <?php form_error('phone') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <textarea name="address" id="address" cols="120" rows="10"><?php  set_value('address') ?></textarea> <br>
                        <?php form_error('address') ?>
                    </div>
                </div>
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-left pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <select name='gender' class="form-control">
                                <option value="">--Chọn--</option>
                                <option value="male" <?php if (!empty($gender) && $gender == 'male') {
                                                            echo "selected='selected'";
                                                        } ?>>Nam</option>
                                <option value="female" <?php if (!empty($gender) && $gender == 'female') {
                                                            echo "selected='selected'";
                                                        } ?>>Nữ</option>
                                <?= $gender ?>
                            </select>
                        </div> <br>
                        <?php form_error('gender') ?>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label for="brithday" class="col-sm-2 col-form-label">Brithday</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="brithday" name="birthday" value="<?php set_value('birthday') ?>"> <br>
                        <?php form_error('birthday') ?>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" style="margin-left:100%" value="Submit" class="btn btn-primary" name='btn_reg'> <br>
                        <?php form_error('account') ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>