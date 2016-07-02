<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */


class CartCategory extends Eloquent {

    public function subscategories()
    {
        return $this->hasMany('CartCategory', "parent_id", "id");
    }

    public function parent()
    {
        return $this->hasOne('CartCategory', "id", "parent_id");
    }

    public function products()
    {
        return $this->hasMany('CartProduct',"category_id");
    }

    public function rposts() {
        return $this->belongsToMany('CartProduct','cart_category_product','category_id','product_id');
    }
    
}