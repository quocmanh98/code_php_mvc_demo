<?php

function get_product_by_id($id){
    $sql = db_fetch_row("SELECT * FROM `tbl_product` WHERE `id` = '$id' ORDER BY `id` ASC");
    return $sql;
}

function get_product_top_new(){
    $sql = db_fetch_array("SELECT * FROM `tbl_product` ORDER BY `create_date` ASC LIMIT 0,5");
    return $sql;
}

function get_product(){
    $sql = db_fetch_array("SELECT * FROM `tbl_product` ORDER BY RAND() ASC LIMIT 0,8");
    return $sql;
}

function get_order_time($time){
    $sql = db_fetch_row("SELECT * FROM `tbl_order` WHERE `time` = '$time'");
    return $sql;
}

function get_list_users()
{
    global $list_users;
    $list_users = db_fetch_array("SELECT * FROM `tbl_customer`");
    return $list_users;
}

function add_order($data)
{
    $sql = db_insert("tbl_order", $data);
    return $sql;
}

function add_order_detail($order_detail_data)
{
    $sql = db_insert("tbl_order_detail", $order_detail_data);
    return $sql;
}

function get_order_by_username($username){
    $sql = db_fetch_array("SELECT * FROM `tbl_order` WHERE `username` = '$username'");
    return $sql;
}

function get_order_detail($order_id){
    $sql = db_fetch_array("SELECT * FROM `tbl_order_detail` as A INNER JOIN `tbl_product` as B ON A.`id_product` = B.`id` WHERE `order_id` = '$order_id'");
    return $sql;
}

function delete_order_detail($order_id){
    $sql = db_delete("tbl_order_detail", "`order_id` = '$order_id'");
    return $sql;
}

function delete_order($order_id){
    $sql = db_delete("tbl_order", "`order_id` = '$order_id'");
    return $sql;
}
?>