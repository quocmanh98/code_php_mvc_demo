<?php

function get_product($id_category){
    $sql = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = '$id_category' ORDER BY `id` ASC");
    return $sql;
}

function get_category(){
    $sql = db_fetch_array("SELECT * FROM `tbl_category` ORDER BY `id` ASC");
    return $sql;
}

function get_product_top_new(){
    $sql = db_fetch_array("SELECT * FROM `tbl_product` ORDER BY `create_date` ASC LIMIT 0,10");
    return $sql;
}

function get_product_top_view(){
    $sql = db_fetch_array("SELECT * FROM `tbl_product` ORDER BY `view` ASC LIMIT 0,10");
    return $sql;
}

function get_product_top_price_high(){
    $sql = db_fetch_array("SELECT * FROM `tbl_product` ORDER BY `price` DESC LIMIT 0,10");
    return $sql;
}

?>