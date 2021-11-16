<?php get_header();
global $item; ?>
<?php
if (!is_login()) {
    redirect_to("?mod=users&controller=index&action=login");
} 
?>
<div class="container">
    <div class="row">
        <div class='col-12'>
            <h2 class='text-center'>Thông tin cá nhân</h2>
            <form>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name='username' disabled value="<?= $item['username'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fullname" name='fullname' disabled value="<?= $item['fullname'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name='email' disabled value="<?= $item['mail'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="phone" name="phone" disabled value="<?= $item['phone'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <textarea name="address" id="address" cols="120" rows="10" disabled><?= $item['address'] ?></textarea>
                    </div>
                </div>
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-left pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <select name='gender' class="form-control" disabled>
                                <option value="">--Chọn--</option>
                                <option value="male" <?php if (!empty($item['gender']) && $item['gender'] == 'male') {
                                                            echo "selected='selected'";
                                                        } ?>>Nam</option>
                                <option value="female" <?php if (!empty($item['gender']) && $item['gender'] == 'female') {
                                                            echo "selected='selected'";
                                                        } ?>>Nữ</option>
                                <?= $gender ?>
                            </select>
                        </div> <br>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label for="brithday" class="col-sm-2 col-form-label">Brithday</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="brithday" name="brithday" disabled value="<?= $item['birthday'] ?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php get_footer() ?>