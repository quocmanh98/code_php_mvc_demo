<?php

// Trả về true nếu đã login
function is_login()
{
    if (isset($_SESSION['is_login'])) {
        return true;
    } else {
        return false;
    }
}

// Trả về username của người login
function user_login()
{
    if (!empty($_SESSION['user_login'])) {
        return $_SESSION['user_login'];
    } else {
        return false;
    }
}

// Trả về fullname của người login
function fullname_login()
{
    if (!empty($_SESSION['fullname'])) {
        return $_SESSION['fullname'];
    } else {
        return false;
    }
}

// Thông tin của người dùng
function info_user($field = 'id')
{
    global $list_users,$item;
    $list_users = get_list_users();
    if (isset($_SESSION['is_login'])) {
        foreach ($list_users as $item) {
            if ($_SESSION['user_login'] == $item['username']) {
                if (array_key_exists($field, $item)) {
                    return $item[$field];
                }
            }
        }
    } else {
        return false;
    }
}
