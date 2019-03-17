<?php  

namespace models;

use PDO;
use core\classes\{Model, Cookie};

class Cart extends Model 
{
	/**
	 * @var boolean
	 */
	public $exist_cart = false;

	/**
	 * quantity of products
	 * @var integer
	 */
	public $quantity = 0;

	/**
	 * array of products ID
	 * @var array
	 */
	public $product_IDs;

	/**
	 * array of products data
	 * @var array
	 */
	public $products_list = array();

	/**
	 * [__construct description]
	 */
	public function __construct()
	{
		parent::__construct();

		if(Cookie::get('cart') !== false) {
			$this->exist_cart = true;
			$this->product_IDs = unserialize(Cookie::get('cart'));
		}
	}

	/**
	 * seralize the array
	 * @param array $array 
	 */
	public function setStringID(array $array)
	{
		return serialize($array);
	}

	/**
	 * gets all cart items
	 * @return array 
	 */
	public function getCart()
	{
		if($this->exist_cart == true) {
			$query_stmt = $this->db->prepare("
				SELECT products.*, product_sizes.*
				FROM products
				INNER JOIN product_sizes ON products.size = product_sizes.id
				WHERE products.id = :id;");
			
			foreach ($this->product_IDs as $id => $quantity) {
				$query_stmt->execute(array('id' => $id));
				$this->products_list[$id] = $query_stmt->fetch(PDO::FETCH_ASSOC);
				$this->products_list[$id]['id'] = $id;
				$this->products_list[$id]['quantity'] = $quantity;
				$this->products_list[$id]['image'] = unserialize($this->products_list[$id]['image']);
			}
			return $this->products_list;
		}
		return false;
		
	}

	/**
	 * add product to cart by ID with quantity
	 * @param string $id       product ID
	 * @param string $quantity product quantity
	 */
	public function addToCart($id, $quantity)
	{
		$quantity = intval($quantity);
		
		if($this->exist_cart) {
			if(array_key_exists($id, $this->product_IDs)) {
				$this->product_IDs[$id] = $this->product_IDs[$id] + $quantity;	
			} else {
				$this->product_IDs[$id] = $quantity;
			}
			Cookie::set('cart', $this->setStringID($this->product_IDs));
			return true;
			
		}

		if(!$this->exist_cart) {
			$this->product_IDs = $this->setStringID(array($id => $quantity));
			Cookie::set('cart', $this->product_IDs);
			return true;
		}
	}


	/**
	 * remove all items from cart
	 */
	public function clearCart()
	{
		if($this->exist_cart) {
			Cookie::delete('cart');
		}
	}

	/**
	 *  remove item from cart by ID
	 * @param  number $id 
	 */
	public function deleteCartItem($id)
	{
		if($this->exist_cart) {
			unset($this->product_IDs[$id]);
			Cookie::set('cart', $this->setStringID($this->product_IDs));
		}
	}

	/**
	 *  change quantity product in cart
	 * @param  number $id    changeable product ID
	 * @param  string $method type of action: plus or minus
	 */
	public function changeQuantity($id, $method)
	{
		switch ($method) {
			case 'plus':
				$this->product_IDs[$id] = $this->product_IDs[$id] + 1;
				Cookie::set('cart', $this->setStringID($this->product_IDs));
				break;
			
			case 'minus':
				if($this->product_IDs[$id] == 1) {
					self::deleteCartItem($id);
					break;
				}
				else {
					$this->product_IDs[$id] = $this->product_IDs[$id] - 1;
					Cookie::set('cart', $this->setStringID($this->product_IDs));
					break;
				}
		}
	}


	public function getTotal()
	{
		if($this->exist_cart) {
			$total_quantity = count($this->product_IDs);
			//??????????????????????
		}
	}
}

?>