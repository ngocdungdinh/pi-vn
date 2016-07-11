<?php

/**
 * BBCMS - A PHP CMS for web newspapers
 *
 * @package  BBCMS
 * @version  1.0
 * @author   BinhBEER <binhbeer@taymay.vn>
 * @link     http://cms.binhbeer.com
 */

return array(
    'library'     => 'gd',
    'upload_dir'  => 'uploads',
    'upload_path' => public_path() . '/uploads/',
    'quality'     => 100,
    'bodysize'    => '550x500',
    'featuredsize'    => '200x200_crop',
    'dimensions' => array(
        'thumb'  => array(100, 100, true, 100),
        'thumb1'  => array(140, 80, true, 100),
        'thumb2'  => array(150, 100, true, 100),
        'thumb3'  => array(200, 200, true, 100),
        'thumb4'  => array(200, 200, false, 100),
        'thumb5'  => array(320, 210, true, 100),
        'thumb6' => array(500, 350, true, 100, true),
        'thumb7' => array(550, 500, false, 100, true),
        'thumb8'  => array(61, 61, true, 100),
        'thumb9'  => array(96, 96, true, 100),
        'thumb12'  => array(220, 81, true, 100),
        'thumb13'  => array(295, 295, true, 100),
        'thumb14' => array(530, 345, true, 100, true),
        'thumb15' => array(878, 443, true, 100, true),
        'thumb16' => array(958, 421, false, 100, true),
        'thumb17' => array(640, 295, true, 100),
    ),
    'avatar_dimensions' => array(
        'thumb'  => array(30, 30, true, 100),
        'thumb1'  => array(60, 60, true, 100),
        'thumb2'  => array(100, 100, true, 100),
        'thumb3'  => array(200, 240, true, 100)
    ),
);