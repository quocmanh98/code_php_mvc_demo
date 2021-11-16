<?php get_header();
get_menu();
global $error, $fullname, $mail, $phone, $address, $payment, $success;
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Thanh Toán</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="#" method="post">
                    <h3 style='color:red'>Thông tin khách hàng</h3>
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fullname" name='fullname' value="<?= info_user('fullname') ?>"> <br>
                            <?php form_error('fullname') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name='email' value="<?= info_user('mail') ?>"> <br>
                            <?php form_error('email') ?>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="phone" name="phone" value="<?= info_user('phone') ?>"> <br>
                            <?php form_error('phone') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea name="address" id="address" cols="60" rows="4" value="<?= info_user('address') ?>"><?= info_user('address') ?></textarea> <br> <br>
                            <?php form_error('address') ?>
                        </div>
                    </div>

                    <div id="form-group row">
                        <input checked="" type="radio" id="direct-payment" name="payment" value="direct-payment">
                        <label for="direct-payment">Thanh toán tại cửa hàng</label> <br>
                        <input type="radio" id="payment-home" name="payment" value="payment-home">
                        <label for="payment-home">Thanh toán tại nhà</label> <br>
                        <?php
                        if (isset($_SESSION['cart'])) {
                        ?>
                            <?php
                            if (!isset($_SESSION['user_login'])) {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <b> Bạn cần đăng nhập trước khi thanh toán !</b>
                                </div>
                            <?php
                            } else {
                            ?>
                                <input type="submit" name="btn_checkout" id="checkout" class='btn' value="Thanh Toán" style="margin:10px">
                            <?php
                            }
                            ?>
                        <?php
                        } else {
                        ?>
                            <input type="submit" name="btn_checkout" id="checkout" class='btn' value="Thanh Toán" disabled style="margin:10px">
                        <?php
                        }
                        ?>
                        <?php
                        if (!empty($success)) {
                        ?>
                        <br>
                            <div class="alert alert-success" role="alert">
                                <?= $success['gmail'] ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <h3>Thông tin đơn hàng</h3>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">SẢN PHẨM</th>
                            <th scope="col">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $list_buy = get_list_buy_cart();
                        if (!empty($list_buy)) {
                            $i = 0;
                            foreach ($list_buy as $item) {
                                $i++; ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $item['name'] ?> x <?= $item['qty'] ?></td>
                                    <td><?= currency_format($item['sub_total'], 'đ') ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td scope="row"></td>
                                <td><b>Tổng đơn hàng: <?= currency_format(get_total_cart(), 'đ') ?></b></td>
                                <td></td>
                            </tr>
                        <?php
                        } else {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Không có sản phẩm nào trong đơn hàng !
                            </div>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="?mod=cart&controller=index&action=historyorder" role="button">Lịch sủ đơn hàng</a>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <?php form_error('account') ?>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php get_footer() ?>