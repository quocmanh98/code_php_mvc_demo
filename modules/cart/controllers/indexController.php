<?php

function construct()
{
    load_model('index');
    load('lib', 'validation');
}

function indexAction()
{
    load_view('index');
}

function showAction()
{
    load_view('show');
}

function checkoutAction()
{

    global $error, $fullname, $mail, $phone, $address, $payment, $success;
    if (isset($_POST['btn_checkout'])) {

        $error = array();
        $success = array();
        // Fullname
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Bạn không được để trống trường fullname";
        } else {
            if (!(strlen($_POST['fullname']) > 6) && (strlen($_POST['fullname']) < 32)) {
                $error['fullname'] = "Độ dài ký tự của fullname dưới 6 or trên 32";
            } else {
                $fullname = htmlspecialchars($_POST['fullname']);
            }
        }

        // Email:
        if (empty($_POST['email'])) {
            $error['email'] = "Bạn không được để trống trường email";
        } else {
            if (!(strlen($_POST['email']) > 6) && (strlen($_POST['email']) < 32)) {
                $error['email'] = "Độ dài ký tự của email dưới 6 or trên 32";
            } else {
                if (is_email($_POST['email'])) {
                    $mail = htmlspecialchars($_POST['email']);
                } else {
                    $error['email'] = "email bạn vừa nhập không đúng định dạng ";
                }
            }
        }


        // Phone
        if (empty($_POST['phone'])) {
            $error['phone'] = "Bạn không được để trống trường điện thoại";
        } else {
            if (!(strlen($_POST['phone']) > 6) && (strlen($_POST['phone']) < 32)) {
                $error['phone'] = "Độ dài ký tự của phone dưới 6 or trên 32";
            } else {
                if (is_phone($_POST['phone'])) {
                    $phone = htmlspecialchars($_POST['phone']);
                } else {
                    $error['phone'] = "phone bạn vừa nhập không đúng định dạng ";
                }
            }
        }

        // Address
        if (empty($_POST['address'])) {
            $error['address'] = "Bạn không được để trống trường địa chỉ";
        } else {
            if (!(strlen($_POST['address']) > 7) && (strlen($_POST['address']) < 100)) {
                $error['address'] = "Độ dài ký tự của địa chỉ dưới 7 or trên 100";
            } else {
                $address = htmlspecialchars($_POST['address']);
            }
        }

        // Gender
        if (empty($_POST['payment'])) {
            $error['payment'] = "Bạn không được để trống giới tính";
        } else {
            $payment = htmlspecialchars($_POST['payment']);
        }

        $total_money = get_total_cart();
        $total_num_product = get_num_order_cart();
        $order_date =  date("d/m/Y h:m:s");
        $time = time();
        $username = info_user('username');
        if (empty($error)) {
            $data = array(
                'order_date' => $order_date,
                'username' => $username,
                'fullname' => $fullname,
                'phone' => $phone,
                'email' => $mail,
                'address' => $address,
                'payment' => $payment,
                'status' => 'Chờ xác nhận',
                'time' => time(),
                'total_money' => $total_money,
                'total_num_product' => $total_num_product
            );
            add_order($data);
            $get_order_time = get_order_time($time);
            $order_id = $get_order_time['order_id'];
            foreach ($_SESSION['cart']['buy'] as $item) {
                $order_detail_data = array(
                    'count' => $item['qty'],
                    'price_detail' => $item['sub_total'],
                    'order_id' => $order_id,
                    'id_product' => $item['id']
                );
                add_order_detail($order_detail_data);
            }
        }

        // Nút thanh toán 
        // $send_to_email = "vyvttps14477@fpt.edu.vn";
        $send_to_email = "quocmanh1998s@gmail.com";
        $send_to_fullname = "Trần Quốc Mạnh";
        $subject = "Thử nghiệm chức năng gửi gmail sau khi nhấn nút thanh toán -  Đơn hàng của " . info_user('fullname') . "";
        $body = "<div class='container'>
    <div class='row'> <h3>Thử nghiệm với chức năng gửi gmail sau khi nhấn nút thanh toán <br> Thông tin đơn hàng  " . info_user('fullname') . " </h3> 
    <table class='table table-bordered'>
    <thead>
        <tr>
            <th scope='col'>#</th>
            <th scope='col'>SẢN PHẨM</th>
            <th scope='col'>Tổng</th>
        </tr>
    </thead>
    <tbody>";
        $list_buy = get_list_buy_cart();
        if (!empty($list_buy)) {
            $i = 0;
            foreach ($list_buy as $item) {
                $i++;
                $body .= "<tr>
            <th scope='row'>" . $i . "</th>";
                $body .= "<td>" . $item['name'] . " x " . $item['qty'] . "</td>";
                $body .= "<td>" . currency_format($item['sub_total'], 'đ') . "</td>";
                $body .= "</tr>";
            }
        }
        $body .= "<tr>
            <td scope='row'></td>
            <td><b>Tổng đơn hàng:" . currency_format(get_total_cart(), 'đ') . "</b></td>
            <td></td>
        </tr>";
        $body .= "</tbody>
    </table></div> </div>";
        $send_mail = send_mail($send_to_email, $send_to_fullname, $subject, $body);
        if ($send_mail == 1) {
            $success['gmail'] = "Đơn hàng đã được gửi tới gmail ! <br> Xin vui lòng kiểm tra trong gmail ! ";
        }
    }
    load_view('checkout');
}

function addAction()
{
    load_view('add');
}

function deleteAction()
{
    load_view('delete');
}

function delete_allAction()
{
    load_view('delete_all');
}

function updateAction()
{
    load_view('update');
}

function historyorderAction()
{
    load_view('historyorder');
}

function detailorderAction()
{
    load_view('detailorder');
}

function deleteorderAction()
{
    load_view('deleteorder');
}
