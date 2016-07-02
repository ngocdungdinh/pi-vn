<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */


class CartOrder extends Eloquent {
	public function products() {
		return $this->hasMany('CartOrderProduct','order_id')->select('cart_products.*', 'medias.mpath', 'medias.mname', 'cart_order_product.discount_price', 'cart_order_product.price', 'cart_order_product.subtotal', 'cart_order_product.qty')
			->join('cart_products', 'cart_products.id', '=', 'cart_order_product.product_id')
			->leftJoin('medias', 'medias.id', '=', 'cart_products.media_id');
	}
}