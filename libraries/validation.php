<?php

function is_username($username)
{
    $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($partten, $username, $matchs)) {
        return false;
    } else {
        return true;
    }
}

function is_email($email)
{
    $partten =
        "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (!preg_match($partten, $email, $matchs)) {
        return false;
    } else {
        return true;
    }
}


function is_password($password)
{
    $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (!preg_match($partten, $password, $matchs)) {
        return false;
    } else {
        return true;
    }
}

function is_phone($phone)
{
    $partten = "/((09|03|07|08|05)+([0-9]{8})\b)/";
    if (!preg_match($partten, $phone, $matchs)) {
        return false;
    } else {
        return true;
    }
}

// is_email

function form_error($label_field)
{
    global $error;
?>
    <?php
    if (!empty($error[$label_field])) {
    ?>
        <div class="alert alert-danger m-5" role="alert">
            <?= $error[$label_field]; ?>
        </div>
    <?php
    }
    ?>
<?php
}

function set_value($label_field)
{
    // $label_field : Tên trường ví dụ username (nó đóng vai trò 1 chuỗi , k phải biến)
    // Còn đi vào biến -> tên trường phải tên $ ở trước nữa
    // $$label_filed : biến
    // $label_field = 'username' ~ username
    // $$label_filed = $username
    global $$label_field;
    if (!empty($$label_field)) {
        echo $$label_field;
    }
}
