<?php get_header();
get_menu();

?>
<div class="product-big-title-area">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Sản phẩm chi tiết</h2>
                </div>
            </div>
        </div>
    </div>
</div>


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

                <div class="single-sidebar">
                    <h2 class="sidebar-title">TOP NEW</h2>
                    <?php $get_product_top_new = get_product_top_new();
                    if ((!empty($get_product_top_new))) {
                        if (is_array($get_product_top_new)) {
                            foreach ($get_product_top_new as $item) {
                                $link_detail = "?mod=product&controller=index&action=detail&id=" . $item['id'];
                    ?>
                                <div class="thubmnail-recent">
                                    <img src="<?= $item['image'] ?>" class="recent-thumb" alt="">
                                    <h2><a href=""><?= $item['name'] ?></a></h2>
                                    <div class="product-sidebar-price">
                                        <ins><?= currency_format($item['promotional_price'], 'đ') ?></ins> <del><?= currency_format($item['price'], 'đ') ?></del>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Product</h2>
                    <ul>
                        <?php $get_top_product = get_top_product();
                        if ((!empty($get_top_product))) {
                            if (is_array($get_top_product)) {
                                foreach ($get_top_product as $item) {
                                    $link_detail = "?mod=product&controller=index&action=detail&id=" . $item['id'];
                        ?>
                                    <li><a href="<?= $link_detail ?>"><?= $item['name'] ?></a></li>
                        <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <?php
            $id_product = (int) $_GET['id'];
            $get_product_by_id = get_product_by_id($id_product);
            extract($get_product_by_id);
            if ($id_product <> null && $id_product == $id) {
            ?>
                <div class="col-md-8">
                    <?php

                    $link_add_cart = "?mod=cart&controller=index&action=add&id=" . $id;
                    ?>
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href=""><?= $name_category ?></a>
                            <a href=""><?= $name ?></a>
                        </div>

                        <div class="row">
                            <!-- <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="public/img/product-2.jpg" alt="">
                                </div>

                                <div class="product-gallery">
                                    <img src="public/img/product-thumb-1.jpg" alt="">
                                    <img src="public/img/product-thumb-2.jpg" alt="">
                                    <img src="public/img/product-thumb-3.jpg" alt="">
                                </div>
                                <h3 id="comment">Bình Luận:</h3>
                                <?php
                                if (!isset($_SESSION['login_user'])) {
                                    echo "<div style='font-size: 19px;color:red'>Xin mời đăng nhập để tiếp tục bình luận !</div> ";
                                } else {
                                ?>
                                    <iframe src="view/modules/comment/commentform.php?idpro=<?= $id ?>" scrolling="yes" width="100%" height="100%"></iframe> <br>
                                <?php
                                }
                                ?>
                                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                                    <input type="hidden" name="idpro" value="<?= $idpro ?>">
                                    <textarea row="50" cols="120" name="comment" id="comment" class="form-control" required="required"></textarea> <br> <br>
                                    <button type="submit" name="btn_comment" class="btn btn-danger">Bình luận</button>
                                </form>
                            </div>
                        </div> -->

                            <div class="col-sm-12">
                                <div class="product-inner">
                                    <div class='row'>
                                        <div class='col-6'>
                                            <h2 class="product-name"><?= $name ?></h2>
                                            <img class='recent-thumb ' src="<?= $image ?>" alt="">
                                            <div class="product-inner-price">
                                                Giá mới: <ins><?= currency_format($promotional_price, 'đ') ?></ins> Giá cũ: <del><?= currency_format($price, 'đ') ?></del>
                                            </div>
                                            <div class='info' style='margin:10px'>
                                                <button type="button" class="btn btn-primary">Số lượng: <?= $quantity ?></button>
                                                <button type="button" class="btn btn-primary">Status: <?= $status ?></button>
                                                <button type="button" class="btn btn-primary">View: <?= $view ?></button>
                                                <button type="button" class="btn btn-primary">Level: <?= $level ?></button> <br> <br>
                                                <span><b>Ram:</b> <?= $ram ?></span> -
                                                <span><b>CPU:</b> <?= $cpu ?></span>
                                            </div>
                                        </div>
                                        <div class='col-6'>
                                            <form action="" class="cart">
                                                <div class="quantity">
                                                    <input type="number" value='1' min='1' max='1' name='qty'>
                                                </div>
                                                <a href="<?= $link_add_cart ?> " class='btn btn-primary'>Add to cart</a>
                                            </form>
                                        </div>
                                    </div>
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <p><?= $description ?></p>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">PRODUCT BY CATEGORY</h2>
                            <div class="related-products-carousel">
                                <?php
                                $get_product = get_product($id_category);
                                if (!(empty($get_product))) {
                                    if (is_array($get_product)) {
                                        foreach ($get_product as $item) {
                                            extract($item);
                                            $link_add = "?mod=cart&controller=index&action=add&id=" . $id;
                                            $link_detail = "?mod=product&controller=index&action=detail&id=" . $id;
                                ?>
                                            <div class="single-product">
                                                <div class="product-f-image">
                                                    <img class='recent-thumb img-fluid' style="width=300;height:200px" src="<?= $image ?>" alt="">
                                                    <a style="margin: 10px 10px" href="<?= $link_add ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                </div>

                                                <h2><a href=""><?= $name ?></a></h2>

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
            <?php
            } else {
                redirect_to("?");
            }
            ?>

        </div>
    </div>
</div>
<?php get_footer(); ?>