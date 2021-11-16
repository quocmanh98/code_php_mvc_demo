<?php

function construct() {
    load_model('index');
}

function indexAction() {
    global $list_category;
    $list_category = get_category();
    $data['list_category'] = $list_category;
    load_view('index', $data);
}

function detailAction() {
    load_view('detail');
}
