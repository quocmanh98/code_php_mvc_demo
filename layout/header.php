<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quốc Mạnh</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/owl.carousel.css">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/css/responsive.css">
</head>

<body>

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-menu">
                        <ul>
                            <li><a href="?"><i class="fa fa-home"></i></i> Home </a></li>
                            <li><a href="?mod=product&controller=index">Shop</a></li>
                            <li><a href="?mod=cart&controller=index&action=show"><i class="fa fa-user"></i> Giỏ Hàng </a></li>
                            <li><a href="?mod=cart&controller=index&action=checkout"><i class="fa fa-user"></i> Checkout </a></li>
                            <?php
                            if (is_login()) {
                            ?>
                                <li><a href="?mod=users&controller=index&action=changePassword"><i class="fa fa-user"></i>Thay đổi mật khẩu</a></li>
                                <li><a href="?mod=users&controller=index&action=logout"><i class="fa fa-user"></i>Logout</a></li>
                                <li><a href="?mod=users&controller=index&action=info"><i class="fa fa-user"></i>My account</a></li>
                                <li> <?php
                                        if (user_login()) {
                                        ?>
                                        Xin chào: <b><?php echo fullname_login() ?></b>
                                    <?php
                                        }
                                    ?>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li><a href="?mod=users&controller=index&action=register"><i class="fa fa-user"></i>Đăng ký</a></li>
                                <li><a href="?mod=users&controller=index&action=login"><i class="fa fa-user"></i>Đăng nhập</a></li>
                                <li><a href="?mod=users&controller=index&action=reset"><i class="fa fa-user"></i>Quên mật khẩu</a></li>
                            <?php
                            }
                            ?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->



    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img style="max-width: 25%;" src="public/img/logo.png"></a></h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="?mod=cart&controller=index&action=show">Tổng: <?php $get_total_row = get_total_cart(); if(!empty($get_total_row)){ echo currency_format($get_total_row,'đ'); }else{ echo "0";} ?> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php $num_order = get_num_order_cart(); if(!empty($num_order)){ echo $num_order; }else{ echo "0";} ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->