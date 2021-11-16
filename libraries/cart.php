<?php


function add_cart($id)
{
    $item =  get_product_by_id($id);

    $qty = 1;
    if ((isset($_SESSION)) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
    }

    $_SESSION['cart']['buy'][$id] = array(
        'id' => $item['id'],
        'name' => $item['name'],
        'code' => $item['code'],
        'price' => $item['price'],
        'promotional_price' => $item['promotional_price'],
        'image' => $item['image'],
        'qty' => $qty,
        'sub_total' => $item['promotional_price'] * $qty
    );

    update_info_cart();
}


function update_info_cart()
{
    $num_order = 0;
    $total = 0;
    foreach ($_SESSION['cart']['buy'] as $item) {
        $num_order += $item['qty'];
        $total += $item['sub_total'];
    }

    $_SESSION['cart']['info'] = array(
        'num_order' => $num_order,
        'total' => $total
    );
}


function get_list_buy_cart(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart']['buy'];
    }else{
        return false;
    }
}

function get_num_order_cart(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart']['info']['num_order'];
    }else{
        return false;
    }
}

function get_total_cart(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart']['info']['total'];
    }else{
        return false;
    }
}

function delete_cart($id=''){

    if(isset($_SESSION['cart'])){
        if(!empty($id)){
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cart();
        }else{
            session_destroy();
        }
    }

}

function update_cart($qty){
    
}