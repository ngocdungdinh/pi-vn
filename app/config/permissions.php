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

	'Truy cập quản trị' => array(
		array(
			'permission' => 'admin',
			'label'      => 'Truy cập quản trị',
		),
	),
	'Người dùng' => array(
		array(
			'permission' => 'user.full',
			'label'      => 'Toàn quyền',
		),
		array(
			'permission' => 'user.create',
			'label'      => 'Tạo người dùng',
		),
		array(
			'permission' => 'user.edit',
			'label'      => 'Sửa người dùng',
		),
		array(
			'permission' => 'user.detele',
			'label'      => 'Xóa người dùng',
		)
	),
	'Nhóm người dùng' => array(
		array(
			'permission' => 'group.full',
			'label'      => 'Toàn quyền',
		),
		array(
			'permission' => 'group.create',
			'label'      => 'Tạo nhóm người dùng',
		),
		array(
			'permission' => 'group.edit',
			'label'      => 'Sửa nhóm người dùng',
		),
		array(
			'permission' => 'group.detele',
			'label'      => 'Xóa nhóm người dùng',
		)
	),
	'Tin tức' => array(
		array(
			'permission' => 'news.full',
			'label'      => 'Toàn quyền',
		),
		array(
			'permission' => 'news.create',
			'label'      => 'Tạo tin',
		),
		array(
			'permission' => 'news.edit',
			'label'      => 'Sửa tin',
		),
		array(
			'permission' => 'news.editpublish',
			'label'      => 'Sửa tin đã xuất bản',
		),
		array(
			'permission' => 'news.editowner',
			'label'      => 'Chỉ sửa tin tự đăng',
		),
		array(
			'permission' => 'news.delete',
			'label'      => 'Xóa tin',
		),
		array(
			'permission' => 'news.review',
			'label'      => 'Xét duyệt tin',
		),
		array(
			'permission' => 'news.publish',
			'label'      => 'Xuất bản tin',
		),
		array(
			'permission' => 'news.createcategory',
			'label'      => 'Tạo chuyên mục',
		),
		array(
			'permission' => 'news.editcategory',
			'label'      => 'Sửa chuyên mục',
		),
		array(
			'permission' => 'news.deletecategory',
			'label'      => 'Xóa chuyên mục',
		),
		array(
			'permission' => 'news.editcomment',
			'label'      => 'Sửa phản hồi',
		),
		array(
			'permission' => 'news.deletecomment',
			'label'      => 'Xóa phản hồi',
		),
		array(
			'permission' => 'news.createtag',
			'label'      => 'Tạo chủ đề',
		),
		array(
			'permission' => 'news.edittag',
			'label'      => 'Sửa chủ đề',
		),
		array(
			'permission' => 'news.deletetag',
			'label'      => 'Xóa chủ đề',
		),
	),
	'Nhuận bút' => array(
		array(
			'permission' => 'royalty.full',
			'label'      => 'Toàn quyền',
		),
		array(
			'permission' => 'royalty.view',
			'label'      => 'Xem',
		),
		array(
			'permission' => 'royalty.ownerview',
			'label'      => 'Chỉ xem được bài tự đăng',
		),
		array(
			'permission' => 'royalty.set',
			'label'      => 'Chấm nhuận bút',
		),
	),
	'Trang thông tin' => array(
		array(
			'permission' => 'pages.full',
			'label'      => 'Toàn quyền',
		),
		array(
			'permission' => 'pages.create',
			'label'      => 'Tạo trang',
		),
		array(
			'permission' => 'pages.edit',
			'label'      => 'Sửa trang',
		),
		array(
			'permission' => 'pages.delete',
			'label'      => 'Xóa trang',
		),
	),
	'Thư viện' => array(
		array(
			'permission' => 'medias.full',
			'label'      => 'Toàn quyền',
		),
		array(
			'permission' => 'medias.upload',
			'label'      => 'Tải tệp tin',
		),
		array(
			'permission' => 'medias.edit',
			'label'      => 'Sửa tệp tin',
		),
		array(
			'permission' => 'medias.delete',
			'label'      => 'Xóa tệp tin',
		),
	),
	'Gian hàng' => array(
		array(
			'permission' => 'cart.createproduct',
			'label'      => 'Tạo sản phẩm',
		),
		array(
			'permission' => 'cart.editproduct',
			'label'      => 'Sửa sản phẩm',
		),
		array(
			'permission' => 'cart.deleteproduct',
			'label'      => 'Xóa sản phẩm',
		),
		array(
			'permission' => 'cart.createcategory',
			'label'      => 'Tạo danh mục',
		),
		array(
			'permission' => 'cart.editcategory',
			'label'      => 'Sửa danh mục',
		),
		array(
			'permission' => 'cart.editorder',
			'label'      => 'Sửa hóa đơn',
		),
		array(
			'permission' => 'cart.deleteorder',
			'label'      => 'Xóa hóa đơn',
		),
		array(
			'permission' => 'cart.checkout',
			'label'      => 'Mua hàng',
		),
	),
	'Menu' => array(
		array(
			'permission' => 'menus.full',
			'label'      => 'Toàn quyền',
		),
		array(
			'permission' => 'menus.create',
			'label'      => 'Tạo menu',
		),
		array(
			'permission' => 'menus.edit',
			'label'      => 'Sửa menu',
		),
		array(
			'permission' => 'menus.delete',
			'label'      => 'Xóa menu',
		),
	),
	'Thiết lập' => array(
		array(
			'permission' => 'settings.config',
			'label'      => 'Cấu hình',
		),
	),
);
