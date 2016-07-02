<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

class Category extends Eloquent {

    public function subscategories()
    {
        return $this->hasMany('Category', "parent_id", "id");
    }

    public function parent()
    {
        return $this->hasOne('Category', "id", "parent_id");
    }

    public function posts()
    {
        return $this->hasMany('Post',"category_id");
    }

	public function rposts() {
		return $this->belongsToMany('Post','category_post','category_id','post_id');
	}
}