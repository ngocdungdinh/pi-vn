<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

class CartAttribute extends Eloquent {
	
    public function subsattributes()
    {
        return $this->hasMany('CartAttribute', "parent_id", "id")->select('cart_attributes.*', 'medias.mpath', 'medias.mname')->leftJoin('medias', 'medias.id', '=', 'cart_attributes.media_id');
    }

    public function parent()
    {
        return $this->hasOne('CartAttribute', "id", "parent_id");
    }

    public function rproducts() {
        return $this->belongsToMany('CartProduct','cart_product_attribute','attribute_id','product_id');
    }
}
