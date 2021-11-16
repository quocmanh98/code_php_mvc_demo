<?php get_header();
get_menu();
get_promo();
get_slider() ?>

<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                global $list_category;
                foreach ($list_category as $item) {
                    $id_category = $item['id'];
                ?>
                    <div class="latest-product">
                        <h3 class="section-title" class='m-3'><?= $item['name_category'] ?></h3>
                        <div class="product-carousel">
                            <?php
                            $list_product = get_product($id_category);
                            foreach ($list_product as $item) {
                                $add_cart = "?mod=cart&controller=index&action=add&id=" . $item['id'];
                                $link_detail = "?mod=product&controller=index&action=detail&id=" . $item['id']
                            ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="<?= $item['image'] ?>" alt="">
                                        <a style='margin: 10px 10px' href="<?= $add_cart ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    </div>

                                    <h5><a href="<?= $link_detail ?>"><?= $item['name'] ?></a></h5>

                                    <div class="product-carousel-price">
                                        <ins><?= currency_format($item['promotional_price'], 'đ') ?></ins> <del><?= currency_format($item['price'], 'đ') ?></del>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div> <!-- End main content area -->

<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                        <img src="public/img/brand1.png" alt="">
                        <img src="public/img/brand2.png" alt="">
                        <img src="public/img/brand3.png" alt="">
                        <img src="public/img/brand4.png" alt="">
                        <img src="public/img/brand5.png" alt="">
                        <img src="public/img/brand6.png" alt="">
                        <img src="public/img/brand1.png" alt="">
                        <img src="public/img/brand2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End brands area -->

<div class="product-widget-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Top New</h2>
                    <?php
                    $list_product_top_new = get_product_top_new();
                    if (!empty($list_product_top_new) && is_array($list_product_top_new)) {
                        foreach ($list_product_top_new as $item) {
                            $link_detail = "?mod=product&controller=index&action=detail&id=" . $item['id']
                    ?>
                            <div class="single-wid-product">
                                <a href="<?= $link_detail ?>"><img src="<?= $item['image'] ?>" alt="" class="product-thumb"></a>
                                <h2><a href="<?= $link_detail ?>"><?= $item['name'] ?></a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                <ins><?= currency_format($item['promotional_price'], 'đ') ?></ins> <del><?= currency_format($item['price'], 'đ') ?></del>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                    <h2 class="product-wid-title">Recently Viewed</h2>
                    <?php
                    $list_product_top_new = get_product_top_view();
                    if (!empty($list_product_top_new) && is_array($list_product_top_new)) {
                        foreach ($list_product_top_new as $item) {
                            $link_detail = "?mod=product&controller=index&action=detail&id=" . $item['id']
                    ?>
                            <div class="single-wid-product">
                                <a href="<?= $link_detail ?>"><img src="<?= $item['image'] ?>" alt="" class="product-thumb"></a>
                                <h2><a href="<?= $link_detail ?>"><?= $item['name'] ?></a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                <ins><?= currency_format($item['promotional_price'], 'đ') ?></ins> <del><?= currency_format($item['price'], 'đ') ?></del>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-product-widget">
                <h2 class="product-wid-title">Top price high</h2>
                    <?php
                    $list_product_top_new = get_product_top_price_high();
                    if (!empty($list_product_top_new) && is_array($list_product_top_new)) {
                        foreach ($list_product_top_new as $item) {
                            $link_detail = "?mod=product&controller=index&action=detail&id=" . $item['id']
                    ?>
                            <div class="single-wid-product">
                                <a href="<?= $link_detail ?>"><img src="<?= $item['image'] ?>" alt="" class="product-thumb"></a>
                                <h2><a href="<?= $link_detail ?>"><?= $item['name'] ?></a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                <ins><?= currency_format($item['promotional_price'], 'đ') ?></ins> <del><?= currency_format($item['price'], 'đ') ?></del>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> <!-- End product widget area -->
<?php get_footer() ?>