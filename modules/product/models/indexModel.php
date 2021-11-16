<?php

function get_product_all($start,$num_per_page){
    $sql = db_fetch_array("SELECT * FROM `tbl_product` ORDER BY `id` ASC LIMIT $start,$num_per_page");
    return $sql;
}

function total_row(){
    $num_row = db_num_rows("SELECT * FROM `tbl_product` ORDER BY `id` ASC");
    return $num_row;
}

function get_product_by_id($id){
    $sql = db_fetch_row("SELECT A.*,B.`name_category` FROM `tbl_product` as A INNER JOIN `tbl_category` as B ON A.`id_category` = B.`id` WHERE A.`id` = '{$id}'");
    return $sql;
}

function get_product_top_new(){
    $sql = db_fetch_array("SELECT * FROM `tbl_product` ORDER BY `create_date` ASC LIMIT 0,20");
    return $sql;
}

function get_top_product(){
    $sql = db_fetch_array("SELECT * FROM `tbl_product` ORDER BY `price` ASC LIMIT 0,20");
    return $sql;
}

function get_product($id){
    $sql = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id_category` = '$id' ORDER BY RAND() ASC ");
    return $sql;
}


function product_filter_price_all($cat_id, $id_brand,$price)
{
    switch ($price) {
        case 1:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}' AND `id_brand` = '{$id_brand}' AND `price` < 500000";
            break;
        case 2:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}' AND `id_brand` = '{$id_brand}' AND `price` > 500000 AND `price` <= 1000000 ";
            break;
        case 3:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}' AND `id_brand` = '{$id_brand}' AND `price` > 1000000 AND `price` <= 5000000  ";
            break;
        case 4:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}'  AND `id_brand` = '{$id_brand}' AND `price` > 5000000 AND `price` <= 10000000  ";
            break;
        case 5:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}' AND `id_brand` = '{$id_brand}' AND `price` > 10000000 AND `price` <= 20000000 ";
            break;
        case 6:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}'  AND `id_brand` = '{$id_brand}' AND `price` > 20000000 AND `price` <= 30000000 ";
            break;
        case 7:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}' AND `id_brand` = '{$id_brand}' AND `price` > 30000000 ";
            break;
    }
    $return = db_fetch_array($sql);
    return $return;
}

function product_filter($cat_id,$price)
{
    switch ($price) {
        case 1:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}' AND `price` < 500000";
            break;
        case 2:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}'  AND `price` > 500000 AND `price` <= 1000000 ";
            break;
        case 3:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}'  AND `price` > 1000000 AND `price` <= 5000000  ";
            break;
        case 4:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}'   AND `price` > 5000000 AND `price` <= 10000000  ";
            break;
        case 5:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}'  AND `price` > 10000000 AND `price` <= 20000000 ";
            break;
        case 6:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}'   AND `price` > 20000000 AND `price` <= 30000000 ";
            break;
        case 7:
            $sql = "SELECT * FROM tbl_product WHERE `id_category` = '{$cat_id}'  AND `price` > 30000000 ";
            break;
    }
    $return = db_fetch_array($sql);
    return $return;
}

function search_product($name){
    $sql = db_fetch_array("SELECT * FROM `tbl_product` WHERE `name` LIKE '%$name%' ORDER BY RAND() ASC ");
    return $sql;
}
?>