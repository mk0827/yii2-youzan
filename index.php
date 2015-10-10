<?php 
require_once __DIR__ . '/lib/KdtApiClient.php';

$appId = 'fill_app_id';
$appSecret = 'fill_app_secret';
$client = new KdtApiClient($appId, $appSecret);


$method = 'kdt.item.update';
$params = [
	'num_iid' => 78552,
	
	'title' => 'api 测试商品 编辑 __ 22',
	'desc' => 'description here',
	'post_fee' => 0.2,
];

$files = [
	[
		'url' => __DIR__ . '/file1.png',
		'field' => 'images[]',
	],
	[
		'url' => __DIR__ . '/file2.jpg',
		'field' => 'images[]',
	],
];


echo '<pre>';
var_dump( 
	$client->post($method, $params, $files)
);
echo '</pre>';
