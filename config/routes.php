<?php 

return array(
	'cart$' => 'cart/index',
	'cart/order' => 'cart/order',
	'catalog$' => 'catalog/index',

	'auth$' => 'user/login',
	'logout$' => 'user/logout',
	'registration$' => 'user/registration',

	'admin/users/page-([0-9]+)' => 'admin/users/$1',
	'admin/users$' => 'admin/users',
	'admin/user/([0-9]+)' => 'admin/user/$1',
	'admin/product/([0-9]+)' => 'admin/product/$1',
	'admin/catalog$' => 'admin/catalog',

	'admin$' => 'admin/index',

	'index.php' => 'main/index',
    '' => 'main/index'

)

?>