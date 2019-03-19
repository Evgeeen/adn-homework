<?php 

return array(
	'cart/add' => 'cart/add',
	'cart/quantity' => 'cart/quantity',
	'cart/clear' => 'cart/clear',
	'cart/remove' => 'cart/removeItem',
	'cart$' => 'cart/index',

	'order/send' => 'order/add',	

	'catalog$' => 'catalog/index',

	'auth$' => 'user/login',
	'logout$' => 'user/logout',
	'user/activate/([A-Za-z0-9&]+)' => 'user/activate/$1',
	'user/settings' => 'user/settings',
	'registration/success' => 'user/registrationSuccess',
	'registration$' => 'user/registration',
	'admin/users/page-([0-9]+)' => 'admin/users/$1',
	'admin/users$' => 'admin/users',
	'admin/userEdit/([0-9]+)' => 'admin/userEdit/$1',
	'admin/userDelete/([0-9]+)' => 'admin/userDelete/$1',
	'admin/user/([0-9]+)' => 'admin/user/$1',
	'admin/product/([0-9]+)' => 'admin/product/$1',
	'admin/productAdd' => 'admin/productAdd',
	'admin/productEdit/([0-9]+)' => 'admin/productEdit/$1',
	'admin/catalog$' => 'admin/catalog',
	'admin$' => 'admin/index',

	'index.php' => 'main/index',
    '' => 'main/index'
);

?>