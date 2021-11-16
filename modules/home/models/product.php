<?php

// function new_products()
// {
//     $sql = "SELECT * FROM hang_hoa WHERE 1 ORDER BY ngay_nhap ASC LIMIT 0,6";
//     $listproduct = pdo_query($sql);
//     return $listproduct;
// }

// function loadall_product_top3()
// {
//     $sql = "SELECT * FROM hang_hoa WHERE 1 ORDER BY so_luot_xem DESC LIMIT 0,3";
//     $listproduct = pdo_query($sql);
//     return $listproduct;
// }

// function loadone_sanpham($ma_hh)
// {
//     $sql = "SELECT * FROM hang_hoa WHERE ma_hh=" . $ma_hh;
//     $sp = pdo_query_one($sql);
//     return $sp;
// }

// function load_sanpham_by_order_id($ma_loai)
// {
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=" . $ma_loai;
//     $sp = pdo_query($sql);
//     return $sp;
// }

// function update_view($ma_hh)
// {
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh= $ma_hh";
//     pdo_execute($sql);
// }

// function search($key)
// {
//     $sql = "SELECT * FROM hang_hoa WHERE ten_hh LIKE '%$key%' ORDER BY ma_hh DESC";
//     $search = pdo_query($sql);
//     return $search;
// }

// function showallproduct()
// {
//     $sql = "SELECT * FROM hang_hoa";
//     $sp = pdo_query($sql);
//     return $sp;
// }

// function show_order($email)
// {
//     $sql = "SELECT * FROM `order` WHERE `email` = '$email' ORDER BY `status` DESC";
//     $sp = pdo_query($sql);
//     return $sp;
// }

// function show_order_id($id,$email){
//     $sql = "SELECT * FROM `order` WHERE `order_id`= $id  AND `email` =  '$email'";
//     $sp = pdo_query($sql);
//     return $sp;
// }

// function data_order($time){
// 	$sql = "SELECT * FROM `order` WHERE `time` = '$time'";
//     $sp = db_fetch_row($sql);
//     return $sp;
// }

// function inserOderDetail($id_order , $id_product , $qty, $sub_total_price){
//     $sql = "INSERT INTO order_detail(`order_id`,`ma_hh`,`count`,`price`) VALUES('$id_order','$id_product','$qty','$sub_total_price')";
//     pdo_execute($sql);
// }

// function get_order($order_id){
//     $sql = "SELECT A.`id`, A.`count`,A.`price`, B.`ten_hh`,B.`don_gia`,B.`hinh` FROM `order_detail` A INNER JOIN `hang_hoa` B ON B.`ma_hh` = A.`ma_hh` WHERE A.`order_id`= '$order_id'";
//     $sp = pdo_query($sql);
//     return $sp;
// }

// function delete_order($order_id){ 
//     $sql = "DELETE FROM `order` WHERE `order_id` ='$order_id'";
//     pdo_execute($sql);
// }

// function delete_order_detail($order_id){ 
//     $sql = "DELETE FROM `order_detail` WHERE `order_id` ='$order_id'";
//     pdo_execute($sql);
// }