<?php get_header();
get_menu();
?>
<?php
if(!isset($_SESSION['user_login'])){
redirect_to("?mod=cart&controller=index&action=checkout");
}
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Chi tiết đơn hàng</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div id="order_review">

                <table class="table table-bordered">
                    <h3>Chi tiết đơn hàng: <?= info_user('fullname') ?> </h3>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $order_id = (int) $_GET['id'];
                        $get_order_detail = get_order_detail($order_id);
                        if (!empty($get_order_detail)) {
                            $i = 0;
                            foreach ($get_order_detail as $item) {
                                $i++; ?>
                                <tr>
                                    <td scope="col"><?= $i  ?></td>
                                    <td scope="col"><img class='img-fluid recent-thumb' src="<?= $item['image'] ?>" alt=""></td>
                                    <td scope="col"><?= $item['name'] ?></td>
                                    <td scope="col"><?= currency_format($item['promotional_price'],'đ') ?></td>
                                    <td scope="col"><?= $item['count'] ?></td>
                                    <td scope="col"><?= currency_format($item['price_detail'],'đ') ?></td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Không có đơn hàng chi tiết !
                            </div>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php get_footer() ?>