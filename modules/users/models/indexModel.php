<?php

function get_list_users()
{
    global $list_users;
    $list_users = db_fetch_array("SELECT * FROM `tbl_customer`");
    return $list_users;
}

function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}


function account_exits($mail, $username)
{
    $result = db_num_rows("SELECT * FROM `tbl_customer` WHERE `mail` = '$mail' OR `username` = '$username'");
    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}


function add_cusmoter($data)
{
    $sql = db_insert("tbl_customer", $data);
    return $sql;
}

function check_login($email, $password)
{
    $result = db_num_rows("SELECT * FROM `tbl_customer` WHERE `mail` = '$email' AND `password` = '$password'");
    if ($result > 0) {
        $users = db_fetch_array("SELECT * FROM `tbl_customer` WHERE `mail` = '$email' AND `password` = '$password'");
        foreach ($users as $item) {
            $_SESSION['user_login'] = $item['username'];
            $_SESSION['fullname'] = $item['fullname'];
        }
        return true;
    } else {
        return false;
    }
}

function check_user($email, $password)
{
    $result = db_num_rows("SELECT * FROM `tbl_customer` WHERE `mail` = '$email' AND `password` = '$password'");
    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

function update_password($data,$id){
    $sql =  db_update("tbl_customer",$data,"id='{$id}'");
    return $sql;
}


function check_email($email)
{
    $result = db_num_rows("SELECT * FROM `tbl_customer` WHERE `mail` = '$email'");
    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

function update_email($data,$mail){
    $sql =  db_update("tbl_customer",$data,"mail='{$mail}'");
    return $sql;
}