<?php

function construct()
{
    load_model('index');
    load('lib', 'validation');
}

function indexAction()
{
    load('helper', 'format');
    $list_users = get_list_users();
    //    show_array($list_users);
    $data['list_users'] = $list_users;
    load_view('index', $data);
    // Load model
    // Load view
    // Load lib
    // Load helper
}

function loginAction()
{

    global $error, $mail, $password;
    if (isset($_POST['btn_login'])) {

        $error = array();
        // Email:
        if (empty($_POST['email'])) {
            $error['email'] = "Bạn không được để trống trường email";
        } else {
            if (!(strlen($_POST['email']) >= 6) && (strlen($_POST['email']) < 32)) {
                $error['email'] = "Độ dài ký tự của email dưới 6 or trên 32";
            } else {
                if (is_email($_POST['email'])) {
                    $mail = htmlspecialchars($_POST['email']);
                } else {
                    $error['email'] = "email bạn vừa nhập không đúng định dạng ";
                }
            }
        }

        // Password: 
        if (empty($_POST['password'])) {
            $error['password'] = "Bạn không được để trống trường password";
        } else {
            if (!(strlen($_POST['password']) >= 6) && (strlen($_POST['password']) <= 32)) {
                $error['password'] = "Độ dài ký tự của password dưới 6 or trên 32";
            } else {
                $password = htmlspecialchars(md5(sha1($_POST['password'])));
            }
        }

        if (empty($error)) {
            if (check_login($mail, $password)) {
                $_SESSION['is_login'] = true;
                $_SESSION['mail'] = $mail;
                redirect_to("?");
            } else {
                $error['account'] = "Bạn nhập sai email or password !";
            }
        }
    }
    load_view("login");
}

function registerAction()
{
    global $error, $username, $fullname, $mail, $password, $confirmpassword, $phone, $address, $gender, $birthday;
    if (isset($_POST['btn_reg'])) {

        $error = array();

        // Username
        if (empty($_POST['username'])) {
            $error['username'] = "Bạn không được để trống trường username";
        } else {
            if (!(strlen($_POST['username']) > 6) && (strlen($_POST['username']) < 32)) {
                $error['username'] = "Độ dài ký tự của username dưới 6 or trên 32";
            } else {
                if (is_username($_POST['username'])) {
                    $username = htmlspecialchars($_POST['username']);
                } else {
                    $error['username'] = "Username bạn vừa nhập không đúng định dạng ";
                }
            }
        }

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

        // Password
        if (empty($_POST['password'])) {
            $error['password'] = "Bạn không được để trống trường password";
        } else {
            if (!(strlen($_POST['password']) > 6) && (strlen($_POST['password']) < 32)) {
                $error['password'] = "Độ dài ký tự của password dưới 6 or trên 32";
            } else {
                if (is_password($_POST['password'])) {
                    $password = htmlspecialchars(md5(sha1($_POST['password'])));
                } else {
                    $error['password'] = "password bạn vừa nhập không đúng định dạng ";
                }
            }
        }

        // confirmpassword
        if (empty($_POST['confirmpassword'])) {
            $error['confirmpassword'] = "Bạn không được để trống ô xác thực mật khẩu";
        } else {
            if (!(strlen($_POST['confirmpassword']) > 6) && (strlen($_POST['confirmpassword']) < 32)) {
                $error['confirmpassword'] = "Độ dài ký tự của xác thực mật khẩu dưới 6 or trên 32";
            } else {
                if (is_password($_POST['confirmpassword'])) {
                    $password = htmlspecialchars(md5(sha1($_POST['confirmpassword'])));
                } else {
                    $error['confirmpassword'] = "password bạn vừa nhập không đúng định dạng ";
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
        if (empty($_POST['gender'])) {
            $error['gender'] = "Bạn không được để trống giới tính";
        } else {
            $gender = htmlspecialchars($_POST['gender']);
        }

        // Birthday
        if (empty($_POST['birthday'])) {
            $error['birthday'] = "Bạn không được để trống ngày sinh";
        } else {
            $birthday = htmlspecialchars($_POST['birthday']);
        }

        if (!empty($error)) {
            if (!($password == $confirmpassword)) {
                $error['account'] = "2 mật khẩu nhập vào không giống nhau";
            }
        } else {
            $time =  date("d/m/Y h:m:s");
            if (!account_exits($mail, $username)) {
                $data = array(
                    'username' => $username,
                    'password' => $password,
                    'fullname' => $fullname,
                    'mail' => $mail,
                    'phone' => $phone,
                    'address' => $address,
                    'create_date' => $time,
                    'gender' => $gender,
                    'birthday' => $birthday
                );
                add_cusmoter($data);
                redirect_to("?mod=users&controller=index&action=login");
            } else {
                $error['account'] = "email or username đã tồn tại trên hệ thống";
            }
        }
    }
    // echo date("d/m/Y h:m:s");
    load_view("register");
}

function resetAction()
{
    if (isset($_POST['btn_forgot'])) {

        global $error, $mail, $success;
        $error = array();
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

        if (empty($error)) {
            if (!check_email($mail)) {
                $error['account'] = "Email không tồn tại trên tài khoản";
            } else {
                $pass_new = random_int(0, 999999);
                $pass_two = htmlspecialchars(md5(sha1($pass_new )));
                $data = array(
                    'password' => $pass_two
                );
                $return = update_email($data, $mail);
                if ($return == 1) {
                    $success['account'] = "Reset lại mật khẩu thành công";
                }
                // $send_to_email = "vyvttps14477@fpt.edu.vn";
                $send_to_email = "quocmanh1998s@gmail.com";
                $send_to_fullname = "Trần Quốc Mạnh";
                $subject = "Reset lại mật khẩu code PHP";
                $body = "Reset lại mật khẩu {$pass_new}  - {$pass_two}";
                send_mail($send_to_email, $send_to_fullname, $subject, $body);
            }
        }
    }
    load_view("reset");
}

function changePasswordAction()
{
    global $error, $password, $passwordnew, $confirmpasswordnew, $item, $success;
    info_user('username');
    $id =  $item['id'];
    $email = $item['mail'];
    if (isset($_POST['btn_change'])) {

        $error = array();
        $success = array();
        // Password cũ
        if (empty($_POST['password'])) {
            $error['password'] = "Bạn không được để trống trường password cũ";
        } else {
            if (!(strlen($_POST['password']) > 6) && (strlen($_POST['password']) < 32)) {
                $error['password'] = "Độ dài ký tự của password dưới 6 or trên 32";
            } else {
                if (is_password($_POST['password'])) {
                    $password = htmlspecialchars(md5(sha1($_POST['password'])));
                } else {
                    $error['password'] = "password bạn vừa nhập không đúng định dạng ";
                }
            }
        }
        // Password mới
        if (empty($_POST['passwordnew'])) {
            $error['passwordnew'] = "Bạn không được để trống trường password mới";
        } else {
            if (!(strlen($_POST['passwordnew']) > 6) && (strlen($_POST['passwordnew']) < 32)) {
                $error['passwordnew'] = "Độ dài ký tự của password mới dưới 6 or trên 32";
            } else {
                if (is_password($_POST['passwordnew'])) {
                    $passwordnew = htmlspecialchars(md5(sha1($_POST['passwordnew'])));
                } else {
                    $error['passwordnew'] = "password mới bạn vừa nhập không đúng định dạng ";
                }
            }
        }
        // Xác thực mật khẩu mới
        if (empty($_POST['confirmpasswordnew'])) {
            $error['confirmpasswordnew'] = "Bạn không được để trống trường xác thực password mới";
        } else {
            if (!(strlen($_POST['confirmpasswordnew']) > 6) && (strlen($_POST['confirmpasswordnew']) < 32)) {
                $error['confirmpasswordnew'] = "Độ dài ký tự của xác thực password mới dưới 6 or trên 32";
            } else {
                if (is_password($_POST['confirmpasswordnew'])) {
                    $confirmpasswordnew = htmlspecialchars(md5(sha1($_POST['confirmpasswordnew'])));
                } else {
                    $error['confirmpasswordnew'] = "Xác thực password mới bạn vừa nhập không đúng định dạng ";
                }
            }
        }

        if (empty($error)) {
            if (($passwordnew <> $confirmpasswordnew)) {
                $error['account'] = "2 mật khẩu nhập vào không giống";
            } else {
                if (check_user($email, $password)) {
                    $data = array(
                        'password' => $passwordnew
                    );
                    if (update_password($data, $id) == 1) {
                        $success['account'] = "Bạn đổi mật khẩu thành công";
                    }
                } else {
                    $error['account'] = "Bạn nhập sai mật khẩu cũ";
                }
            }
        }
    }

    load_view("changePassword");
}

function infoAction()
{
    info_user('username');
    load_view("info");
}

function logoutAction()
{
    session_destroy();
    redirect_to("?");
}
