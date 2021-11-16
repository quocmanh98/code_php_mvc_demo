<?php
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
/*
 * --------------------------------------------------------------------
 * app path : đường dẫn của ứng dụng
 * --------------------------------------------------------------------
 */

//  hằng số: __FILE__ và hàm dirname() : để lấy folder của file này (lấy folder của mvc)

$app_path = dirname(__FILE__);
define('APPPATH', $app_path);
/*
 * --------------------------------------------------------------------
 * core path 
 * --------------------------------------------------------------------
 */

 // core chứa những bộ lõi của hệ thống
//  khu vực core : là khu vực đầu não của hệ thống
$core_folder = 'core';
define('COREPATH', APPPATH.DIRECTORY_SEPARATOR.$core_folder);

/*
 * --------------------------------------------------------------------
 * modules path
 * --------------------------------------------------------------------
 */
$modules_folder = 'modules';
define('MODULESPATH', APPPATH.DIRECTORY_SEPARATOR.$modules_folder);


/*
 * --------------------------------------------------------------------
 * helper path
 * --------------------------------------------------------------------
 */

$helper_folder = 'helper';
define('HELPERPATH', APPPATH.DIRECTORY_SEPARATOR.$helper_folder);


/*
 * --------------------------------------------------------------------
 * library path
 * --------------------------------------------------------------------
 */
$lib_folder= 'libraries';
define('LIBPATH', APPPATH.DIRECTORY_SEPARATOR.$lib_folder);


/*
 * --------------------------------------------------------------------
 * layout path
 * --------------------------------------------------------------------
 */
$layout_folder= 'layout';
define('LAYOUTPATH', APPPATH.DIRECTORY_SEPARATOR.$layout_folder);

/*
 * --------------------------------------------------------------------
 * config path
 * --------------------------------------------------------------------
 */
$config_folder= 'config';
define('CONFIGPATH', APPPATH.DIRECTORY_SEPARATOR.$config_folder);

require COREPATH.DIRECTORY_SEPARATOR.'appload.php';

// DIRECTORY_SEPARATOR : dấu /
// khu vực config : khu vực điểu khiển 1 tòa nhà, chúng ta chỉ cần vào khu vực này để bật tắt công tác này kia như điện , nước 
