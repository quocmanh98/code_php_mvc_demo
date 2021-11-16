<?php get_header();
get_menu();

?>
<?php
if (!isset($_SESSION['user_login'])) {
    redirect_to("?mod=cart&controller=index&action=checkout");
}
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Lịch sử đơn hàng</h2>
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
                    <h3>Lịch sử đơn hàng: <?= info_user('fullname') ?> </h3>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Họ Tên</th>
                            <th scope="col">Mã Đơn Hàng</th>
                            <th scope="col">Thời gian đặt</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Tổng giá tiền</th>
                            <th scope="col">Tổng sản phẩm</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get_order_by_username = get_order_by_username(info_user('username'));
                        if (!empty($get_order_by_username)) {
                            $i = 0;
                            foreach ($get_order_by_username as $item) {
                                $link_detail = "?mod=cart&controller=index&action=detailorder&id=" . $item['order_id'];
                                $link_delete = "?mod=cart&controller=index&action=deleteorder&id=" . $item['order_id'];
                                $i++; ?>
                                <tr>
                                    <td scope="col"><?= $i  ?></td>
                                    <td scope="col"><?= $item['fullname'] ?></td>
                                    <td scope="col"><?= $item['order_id'] ?></td>
                                    <td scope="col"><?= $item['order_date'] ?></td>
                                    <td scope="col"><?= $item['address'] ?></td>
                                    <td scope="col"><?= currency_format($item['total_money'], 'đ') ?></td>
                                    <td scope="col"><?= $item['total_num_product'] ?></td>
                                    <td scope="col"><?= $item['status'] ?></td>
                                    <td scope="col">
                                        <a href="<?= $link_detail  ?>">Chi tiết đơn hàng</a> /
                                        <a href="<?= $link_delete ?>">Hủy đơn hàng</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Không có đơn hàng !
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