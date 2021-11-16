<?php
if(isset($_POST['btn_update'])){
    foreach ($_POST['qty'] as $id => $newqty) {
        $_SESSION['cart']['buy'][$id]['qty'] = $newqty;
        $_SESSION['cart']['buy'][$id]['sub_total'] = $newqty *  $_SESSION['cart']['buy'][$id]['promotional_price'];
    }
    update_info_cart();
}
redirect_to("?mod=cart&controller=index&action=show");

?>