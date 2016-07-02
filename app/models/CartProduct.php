<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

class CartProduct extends Eloquent {

	/**
	 * Deletes a news post and all the associated comments.
	 *
	 * @return bool
	 */
	public function delete()
	{
		// Delete the comments
		$this->comments()->delete();

		// Delete the news post
		return parent::delete();
	}

	/**
	 * Returns a formatted post content entry, this ensures that
	 * line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		return $this->content;
	}

	/**
	 * Return how many comments this post has.
	 *
	 * @return array
	 */
	public function comments()
	{
		return $this->hasMany('Comment', 'post_id')->where('comment_type', 'product');
	}

	// Relationships 
	public function reviews()
	{
	    return $this->hasMany('CartReview', 'product_id');
	}

    public function recalculateRating($rating)
    {
    	$reviews = $this->reviews()->notSpam()->approved();
	    $avgRating = $reviews->avg('rating');
		$this->review_cache = round($avgRating,1);
		$this->review_count = $reviews->count();
    	$this->save();
    }
	/**
	 * Return the URL to the post.
	 *
	 * @return string
	 */
	public function url()
	{
		return URL::route('shop-product', $this->slug);
	}

	/**
	 * Return the post thumbnail image url.
	 *
	 * @return string
	 */
	public function thumbnail()
	{
		# you should save the image url on the database
		# and return that url here.

		return $this->belongsTo('Media', 'media_id');
	}

	public function category() {
		return $this->belongsTo('CartCategory','category_id');
		// return $this->hasMany('CategoryPost','id');
	}

	public function categories() {
		return $this->belongsToMany('CartCategory','cart_category_product','product_id','category_id');
	}

	public function categoryproducts() {
		return $this->hasMany('CartCategoryProduct','product_id');
	}	

	public function removeCate() {
		$this->categoryproducts()->delete();
	}

	public function attributes() {
		return $this->belongsToMany('CartAttribute','cart_product_attribute','product_id','attribute_id');
	}

	public function attributeproducts() {
		return $this->hasMany('CartProductAttribute','product_id');
	}	

	public function removeAttr() {
		$this->attributeproducts()->delete();
	}

	public function productmedias() {
		return $this->belongsToMany('Media','cart_product_media','product_id','media_id');
	}

	// Tags
	public function tags() {
		return $this->belongsToMany('Tag','cart_product_tag','product_id','tag_id')->where('type', 'tag');
		// return $this->hasMany('CategoryPost','id');
	}

	public function posttags() {
		return $this->hasMany('CartProductTag', 'product_id');
	}

	public function removeTag() {
		$this->posttags()->delete();
	}

	public function insertTags($tagIds) {
		$tags = explode(",", $tagIds);
		foreach ($tags as $tagId) {
			# code...
			$posttag = new CartProductTag;
			$posttag->product_id = $this->id;
			$posttag->tag_id = $tagId;
			$posttag->save();
		}
	}
}
