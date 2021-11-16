<?php get_header();
get_menu() ?>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="?mod=product&controller=index&action=search" method='post'>
                        <input type="text" placeholder="Search products..." name='search'>
                        <input type="submit" name="btn_search" value="Search">
                    </form>
                </div>
                <!-- <div class="single-sidebar">
                    <h2 class="sidebar-title">TOP NEW</h2>
                    <?php $get_product_top_new = get_product_top_new();
                    if ((!empty($get_product_top_new))) {
                        if (is_array($get_product_top_new)) {
                            foreach ($get_product_top_new as $item) {
                                $link_detail = "?mod=product&controller=index&action=detail&id=" . $item['id'];
                    ?>
                                <div class="thubmnail-recent">
                                    <img src="<?= $item['image'] ?>" class="recent-thumb" alt="">
                                    <h2><a href="<?=    $link_detail  ?>"><?= $item['name'] ?></a></h2>
                                    <div class="product-sidebar-price">
                                        <ins><?= currency_format($item['promotional_price'], 'đ') ?></ins> <del><?= currency_format($item['price'], 'đ') ?></del>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                </div> -->
                <div class="card">
                    <div class="card-header" style="font-size:17px;text-align:center;font-weight:700">
                        BỘ LỌC
                    </div>

                    <div class="card-body">
                        <form method="POST" action="?mod=product&controller=index&action=filter_product">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="2">Giá</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="radio" name="r-price" value='1'></td>
                                        <td>Dưới 500.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-price" value='2'></td>
                                        <td>500.000đ - 1.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-price" value='3'></td>
                                        <td>1.000.000đ - 5.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-price" value='4'></td>
                                        <td>5.000.000đ - 10.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-price" value='5'></td>
                                        <td>10.000.000đ - 20.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-price" value='6'></td>
                                        <td>20.000.000đ - 30.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-price" value='7'></td>
                                        <td>Trên 30.000.000đ</td>
                                    </tr>

                                </tbody>
                            </table>
                            <?= form_error('price') ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="2">Loại</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="radio" name="r-cate" value='12'></td>
                                        <td>Laptop</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-cate" value='13'></td>
                                        <td>Điện thoại</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-cate" value='14'></td>
                                        <td>Máy tính bảng</td>
                                    </tr>
                                </tbody>
                            </table>
                            <?= form_error('cat_id') ?>
                            <input type="submit" value="Lọc" name="btn_filter">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="?mod=cart&controller=index&action=update">
                            <h1 class='text-center'>Giỏ Hàng</h1>
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">DELETE</th>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $list_buy = get_list_buy_cart();
                                    if (!(empty($list_buy)) && is_array($list_buy)) {
                                        foreach ($list_buy as $item) {
                                            $link_delete = "?mod=cart&controller=index&action=delete&id=" . $item['id'];
                                            $link_detail = "?mod=product&controller=index&action=detail&id=" . $item['id'];
                                    ?>
                                            <tr class="cart_item">
                                                <td class="product-remove">
                                                    <a title="Remove this item" class="remove" href="<?= $link_delete ?>">×</a>
                                                </td>

                                                <td class="product-thumbnail">
                                                    <a href="<?= $link_detail ?>"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?= $item['image']  ?>"></a>
                                                </td>

                                                <td class="product-name">
                                                    <a href="<?= $link_detail ?>">
                                                        <h5><?= $item['name'] ?></h5>
                                                    </a>
                                                </td>

                                                <td class="product-price">
                                                    <span class="amount"><?= currency_format($item['promotional_price']) ?></span>
                                                </td>

                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <input type="number" size="4" class="input-text qty text" name="qty[<?= $item['id'] ?>]" value="<?= $item['qty'] ?>" min="0" step="1">
                                                    </div>
                                                </td>

                                                <td class="product-subtotal">
                                                    <span class="amount"><?= currency_format($item['sub_total']) ?></span>

                                                </td> <br>

                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            Không có sản phẩm nào trong giỏ hàng
                                        </div>
                                    <?php
                                    }

                                    ?>
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-success" role="alert">
                                                Tổng giá: <?= currency_format(get_total_cart(), "đ") ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="actions" colspan="6">
                                            <input type="submit" class='btn btn-primary' name="btn_update" value="Update cart">
                                            <a href="?mod=cart&controller=index&action=checkout" class="btn btn-primary" style="padding:10px">Thanh Toán</a>
                                            <a href="?mod=cart&controller=index&action=delete_all" class="btn btn-primary" style="padding:10px">Xóa giỏ hàng</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </form>

                        <div class="related-products-wrapper">
                        <h2 class="related-products-title">LIST PRODUCT</h2>
                        <div class="related-products-carousel">
                            <?php
                            $get_product = get_product();
                            if (!(empty($get_product))) {
                                if (is_array($get_product)) {
                                    foreach ($get_product as $item) {
                                        extract($item);
                                        $link_add = "?mod=cart&controller=index&action=add&id=".$id;
                                        $link_detail = "?mod=product&controller=index&action=detail&id=".$id;
                            ?>
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                <img class='recent-thumb img-fluid' style="width=300;height:200px" src="<?= $image ?>" alt="">
                                                <a style="margin: 10px 10px" href="<?= $link_add ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            </div>
                                            <h2><a href="<?= $link_detail  ?>"><?= $name ?></a></h2>
                                            <div class="product-carousel-price">
                                            <ins><?= currency_format($promotional_price, 'đ') ?></ins> <del><?= currency_format($price, 'đ') ?></del>
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>