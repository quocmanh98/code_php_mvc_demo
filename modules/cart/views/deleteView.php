
<?php

$id = $_GET['id'];
$item = get_product_by_id($id);

if($id <> null & $id == $item['id']){
    delete_cart($id);
    redirect_to("?mod=cart&controller=index&action=show");
}else{
    redirect_to("?");
}



?>