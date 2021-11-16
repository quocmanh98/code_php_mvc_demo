<?php

$id = (int) $_GET['id'];
delete_order_detail($id);
delete_order($id);
redirect_to("?mod=cart&controller=index&action=historyorder");
?>