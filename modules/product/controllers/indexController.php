<?php

function construct()
{
    load_model('index');
    load('lib', 'validation');
}

function indexAction()
{
    global $num_per_page, $start, $num_page, $page;
    $num_per_page = 8;
    $total_row = total_row();
    $num_page = ceil($total_row / $num_per_page);

    if (isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    $start = ($page - 1) * $num_per_page;

    load_view('index');
}

function detailAction()
{
    load_view('detail');
}

function product_filter_priceAction()
{
    global $product_filter_price,$error;
    if (isset($_POST['btn_filter'])) {

        $error = array();
        if(!empty($_POST['r-cate'])){
            $cat_id = $_POST['r-cate'];
        }else{
            $error['cat_id'] ='Qúy khách cần chọn loại sản phẩm';
        }

        if(!empty($_POST['r-brand'])){
            $id_brand = $_POST['r-brand'];
        }else{
            $error['brand_id'] ='Qúy khách cần chọn hãng';
        }

        if(!empty($_POST['r-price'])){
            $price = $_POST['r-price'];
        }else{
            $error['price'] ='Qúy khách cần chọn giá';
        }

        if(empty($error)){
            $product_filter_price = product_filter_price_all($cat_id, $id_brand, $price);
        }else{
            $error['filter'] = "Qúy khách cần chọn loại sản phẩm, hãng, giá" ;
        };
    }
    load_view('product_filter_price_all');
}

function searchAction()
{
    global $search_product;
    $name = htmlspecialchars($_POST['search']);
    if(!empty($name)){
        $search_product = search_product($name);
    }else{
        redirect_to("?");
    }
    
    load_view('search');
}

function filter_productAction(){
    global $product_filter,$error;

    $error = array();
    if (isset($_POST['btn_filter'])) {
        if(!empty($_POST['r-cate'])){
            $cat_id = $_POST['r-cate'];
        }else{
            $error['cat_id'] ='Qúy khách cần chọn loại sản phẩm';
        }

        if(!empty($_POST['r-price'])){
            $price = $_POST['r-price'];
        }else{
            $error['price'] ='Qúy khách cần chọn giá';
        }

        if(empty($error)){
            $product_filter =  product_filter($cat_id,$price);
        }else{
            $error['filter'] = "Qúy khách cần chọn loại sản phẩm, giá" ;
        };

    }
    load_view('filter_product');
}
