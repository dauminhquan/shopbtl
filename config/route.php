<?php
$route = [
	'/' => 'Controller\IndexController@index',
	'san-pham/{id}/' => 'Controller\IndexController@sanpham',
	'loai-san-pham/{tenloai}/' => 'Controller\IndexController@loaisanpham',
	'thanh-toan/' => 'Controller\IndexController@thanhtoan',
	'check-out/' => 'Controller\IndexController@checkout',
    'admin/' => 'Controller\Admin\IndexController@index',
    'admin/danh-sach-san-pham' => 'Controller\Admin\IndexController@danhsachsanpham',
    'admin/san-pham/{id}' => 'Controller\Admin\IndexController@sanpham',
    'admin/them-san-pham' => 'Controller\Admin\IndexController@themsanpham',
    'api/admin/xoa-anh' => 'Controller\Admin\ApiController@xoaanh'
];

