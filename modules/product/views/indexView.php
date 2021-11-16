<?php get_header();
get_menu() ; get_promo()?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>ALL Product</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class='col-md-3'>
                <div class="card">
                    <div class="card-header" style="font-size:17px;text-align:center;font-weight:700">
                        BỘ LỌC
                    </div>

                    <div class="card-body">
                        <form method="POST" action="?mod=product&controller=index&action=product_filter_price">
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td colspan="2">Hãng</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="radio" name="r-brand" value='1'></td>
                                        <td>Samsung</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-brand" value='2'></td>
                                        <td>Apple</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-brand" value='3'></td>
                                        <td>Sony</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-brand" value='4'></td>
                                        <td>Nokia</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-brand" value='5'></td>
                                        <td>Dell</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-brand" value='6'></td>
                                        <td>HP</td>
                                    </tr>
                                </tbody>
                            </table>
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
                            <input type="submit" value="Lọc" name="btn_filter">
                        </form>
                    </div>
                </div>
            </div>
            <div class='col-md-9'>
                <div class='row'>
                    <?php
                    global $num_per_page, $start;
                    $get_producct_all = get_product_all($start, $num_per_page);
                    if (!empty($get_producct_all)) {
                        if (is_array($get_producct_all)) {
                            foreach ($get_producct_all as $item) {
                                $link_detail = "?mod=product&controller=index&action=detail&id=" . $item['id'];
                                $link_add_cart = "?mod=cart&controller=index&action=add&id=" . $item['id'];
                    ?>
                                <div class="col-md-3 col-sm-6">
                                    <div class="single-shop-product">
                                        <div class="product-upper">
                                            <img src="<?= $item['image'] ?>" alt="">
                                        </div>
                                        <h5><a href="<?= $link_detail  ?>"><?= $item['name'] ?></a></h5>
                                        <div class="product-carousel-price">
                                            <ins><?= currency_format($item['promotional_price'], 'đ') ?></ins> <del><?= currency_format($item['price'], 'đ') ?></del>
                                        </div>

                                        <div class="product-option-shop">
                                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="<?= $link_add_cart  ?>">Add to cart</a>
                                        </div>
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

        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <?php
                    global $num_page, $page;
                    get_pagging($num_page, $page, "?mod=product&controller=index&action=index");
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>