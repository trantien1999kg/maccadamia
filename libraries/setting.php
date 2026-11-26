<?php 

	#=================check per===============

	$GLOBAL_LANG=false; // website chỉ làm tiếng Việt: ẩn menu Ngôn ngữ

	$GLOBAL_PERMISSION=false;

	#=================check user===============

	$GLOBAL_USER=true;

	$GLOBAL_USER_ADMIN=true;

	$GLOBAL_USER_CLIENT=true;

	#================check member================

	$MEMBER=false;

	$CONTACT=true;

	$NEWSLETTER=false;

	$BOOKING=false; // web không có form đăng ký nhận tin / gọi lại: ẩn khỏi chuông thông báo

	/** ARTICLE SETTING*/
		
	$PUBLIC = [];

	$PRIVATE = [];

	$PHOTOS = [];

	// =======================seo page======================
	
	$setting['seopage']['page']=array(

		'gioi-thieu'=>'Giới thiệu',

		'san-pham'=>'Sản phẩm',

		'album'=>'Thư viện ảnh',

		'tin-tuc'=>'Tin tức',

		'tinh-nang'=>'Tính năng',

		'cam-ket'=>'Cam kết',

		'lien-he'=>'Liên hệ',

	);
	$setting['seopage']['mota'] = true;
	$setting['seopage']['mota-ckeditor'] = true;
	$setting['seopage']['noidung'] = true;
	$setting['seopage']['noidung-ckeditor'] = true;
	$setting['seopage']['img-width'] = 300;
	$setting['seopage']['img-height'] = 200;
	$setting['seopage']['img-ratio'] = 1;
	$setting['seopage']['img-b'] = 200;
	$setting['seopage']['thumb'] = '300x200x1';
	$setting['seopage']['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
	
	$viewArray=array('htgh','pttt');

	#===============================Tác giả==================================================

	$nametype='tac-gia';

	$GLOBAL['baiviet'][$nametype]['title_main'] = 'Tác giả';

	$GLOBAL['baiviet'][$nametype]['title'] = 'danh sách tác giả';

	$GLOBAL['baiviet'][$nametype]['full'] = false;

	$GLOBAL['baiviet'][$nametype]['check']=array(

		"hienthi"=>"Hiển thị",

		"mucluc"=>"Mục lục"

	);

	$GLOBAL['baiviet'][$nametype]['tag']=true;

	$GLOBAL['baiviet'][$nametype]['link_cano'] = true;

	$GLOBAL['baiviet'][$nametype]['schema'] = true;

	$GLOBAL['baiviet'][$nametype]['index_robots'] = true;

	$GLOBAL['baiviet'][$nametype]['img'] = true;

	$GLOBAL['baiviet'][$nametype]['img-width'] = 183;

	$GLOBAL['baiviet'][$nametype]['img-height'] = 183;

	$GLOBAL['baiviet'][$nametype]['img-ratio'] = 1;

	$GLOBAL['baiviet'][$nametype]['link_author'] = true;

	$GLOBAL['baiviet'][$nametype]['mota'] = true;

	$GLOBAL['baiviet'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['thongtin'] = false;

	$GLOBAL['baiviet'][$nametype]['thongtin-ckeditor'] = false;

	$GLOBAL['baiviet'][$nametype]['job'] = false;

	$GLOBAL['baiviet'][$nametype]['seo'] = true;

	$GLOBAL['baiviet'][$nametype]['alias'] = true;

	$GLOBAL['baiviet'][$nametype]['tag'] = false;

	$GLOBAL['baiviet'][$nametype]['top_nb'] = false;

	$GLOBAL['baiviet'][$nametype]['rating'] = false;

	$GLOBAL['baiviet'][$nametype]['daytin'] = false;

	$GLOBAL['baiviet'][$nametype]['mucluc'] = true;

	$GLOBAL['baiviet'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	$GLOBAL['baiviet'][$nametype]['file_type']='doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';


	#==================================Hình thức giao hàng====================================

	$nametype='htgh';

	$GLOBAL['baiviet'][$nametype]['title_main'] = 'phương thức giao hàng';

	$GLOBAL['baiviet'][$nametype]['title'] = 'danh sách phương thức giao hàng';

	$GLOBAL['baiviet'][$nametype]['full'] = false;

	$GLOBAL['baiviet'][$nametype]['check']=array(

		"hienthi"=>"Hiển thị"

	);

	$GLOBAL['baiviet'][$nametype]['tag']=true;

	$GLOBAL['baiviet'][$nametype]['img'] = true;

	$GLOBAL['baiviet'][$nametype]['img-width'] = 72;

	$GLOBAL['baiviet'][$nametype]['img-height'] = 72;

	$GLOBAL['baiviet'][$nametype]['img-ratio'] = 1;

	$GLOBAL['baiviet'][$nametype]['mota'] = true;

	$GLOBAL['baiviet'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung'] = false;

	$GLOBAL['baiviet'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['thongtin'] = false;

	$GLOBAL['baiviet'][$nametype]['thongtin-ckeditor'] = false;

	$GLOBAL['baiviet'][$nametype]['job'] = false;

	$GLOBAL['baiviet'][$nametype]['seo'] = false;

	$GLOBAL['baiviet'][$nametype]['alias'] = true;

	$GLOBAL['baiviet'][$nametype]['tag'] = false;

	$GLOBAL['baiviet'][$nametype]['top_nb'] = false;

	$GLOBAL['baiviet'][$nametype]['rating'] = false;

	$GLOBAL['baiviet'][$nametype]['daytin'] = false;

	$GLOBAL['baiviet'][$nametype]['mucluc'] = true;

	$GLOBAL['baiviet'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	$GLOBAL['baiviet'][$nametype]['file_type']='doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

	#========================pttt==================== 

	$nametype='pttt';

	$GLOBAL['baiviet'][$nametype]['title_main'] = 'phương thức thanh toán';

	$GLOBAL['baiviet'][$nametype]['title'] = 'danh sách phương thức thanh toán';

	$GLOBAL['baiviet'][$nametype]['full'] = false;

	$GLOBAL['baiviet'][$nametype]['check']=array(

		"mucluc"=>"Mục lục",

		"hienthi"=>"Hiển thị"

	);

	$GLOBAL['baiviet'][$nametype]['tag']=true;

	$GLOBAL['baiviet'][$nametype]['img'] = true;

	$GLOBAL['baiviet'][$nametype]['img-width'] = 285;

	$GLOBAL['baiviet'][$nametype]['img-height'] = 215;

	$GLOBAL['baiviet'][$nametype]['img-ratio'] = 1;

	$GLOBAL['baiviet'][$nametype]['mota'] = false;

	$GLOBAL['baiviet'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['thongtin'] = false;

	$GLOBAL['baiviet'][$nametype]['thongtin-ckeditor'] = false;

	$GLOBAL['baiviet'][$nametype]['job'] = false;

	$GLOBAL['baiviet'][$nametype]['seo'] = false;

	$GLOBAL['baiviet'][$nametype]['alias'] = true;

	$GLOBAL['baiviet'][$nametype]['tag'] = false;

	$GLOBAL['baiviet'][$nametype]['top_nb'] = false;

	$GLOBAL['baiviet'][$nametype]['rating'] = false;

	$GLOBAL['baiviet'][$nametype]['daytin'] = false;

	$GLOBAL['baiviet'][$nametype]['mucluc'] = true;

	$GLOBAL['baiviet'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	$GLOBAL['baiviet'][$nametype]['file_type']='doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';


	#========================Sản phẩm==================== 

	$nametype='san-pham';

	$GLOBAL['baiviet'][$nametype]['title_main'] = 'Sản phẩm';

	$GLOBAL['baiviet'][$nametype]['title'] = 'danh sách';

	$GLOBAL['baiviet'][$nametype]['full'] = false;
	
	$GLOBAL['baiviet'][$nametype]['diadiem'] = "Chọn địa điểm";

	$GLOBAL['baiviet'][$nametype]['diadiem'] = false;

	$GLOBAL['baiviet'][$nametype]['public'] = false;

	$GLOBAL['baiviet'][$nametype]['check']=array(

		"noibat"=>"Nổi bật",
		
		"hienthi"=>"Hiển thị",

		"mucluc"=>"Mục lục"

	);

	$GLOBAL['baiviet'][$nametype]['img'] = true;

	$GLOBAL['baiviet'][$nametype]['masp'] = false;

	$GLOBAL['baiviet'][$nametype]['giaban'] = false;

	$GLOBAL['baiviet'][$nametype]['link_cano'] = true;

	$GLOBAL['baiviet'][$nametype]['schema'] = true;

	$GLOBAL['baiviet'][$nametype]['giacu'] = false;

	$GLOBAL['baiviet'][$nametype]['bookroom'] = false;

	$GLOBAL['baiviet'][$nametype]['mucgia'] = true;

	$GLOBAL['baiviet'][$nametype]['songuoi'] = false;

	$GLOBAL['baiviet'][$nametype]['sogiuong'] = false;

	$GLOBAL['baiviet'][$nametype]['buaan'] = false;

	$GLOBAL['baiviet'][$nametype]['phongtam'] = false;

	$GLOBAL['baiviet'][$nametype]['phanloaidat'] = false;

	$GLOBAL['baiviet'][$nametype]['duan'] = false;

	$GLOBAL['baiviet'][$nametype]['xuatxu'] = false;

	$GLOBAL['baiviet'][$nametype]['dientich'] = false;

	$GLOBAL['baiviet'][$nametype]['huong'] = false;

	$GLOBAL['baiviet'][$nametype]['city'] = false;

	$GLOBAL['baiviet'][$nametype]['dist'] = false;

	$GLOBAL['baiviet'][$nametype]['ward'] = false;

	$GLOBAL['baiviet'][$nametype]['tukhoa']=false;

	$GLOBAL['baiviet'][$nametype]['tinhtrang'] = true;

	$GLOBAL['baiviet'][$nametype]['img-width'] = 385;

	$GLOBAL['baiviet'][$nametype]['img-height'] = 288;

	$GLOBAL['baiviet'][$nametype]['img-ratio'] = 1;

	$GLOBAL['baiviet'][$nametype]['img-b'] = false;

	$GLOBAL['baiviet'][$nametype]['img-gallery'] = true;

	$GLOBAL['baiviet'][$nametype]['multi-gallery-arr']=array

	(

		$nametype=>array

			(

            	"title_main_photo" => "Hình ảnh kèm theo",

            	"title_sub_photo" => "Hình ảnh",

            	"width_photo" => 385,

            	"height_photo" => 288,

            	"thumb_width_photo" => 385,

            	"thumb_height_photo" => 288,

            	"thumb_ratio_photo" => 1,

            	"img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp'

         	)

	);

	$GLOBAL['baiviet'][$nametype]['mota'] = true;

	$GLOBAL['baiviet'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['alias'] = true;

	$GLOBAL['baiviet'][$nametype]['title-seo']=true;

	$GLOBAL['baiviet'][$nametype]['keywords-seo']=true;

	$GLOBAL['baiviet'][$nametype]['description-seo']=true;

	$GLOBAL['baiviet'][$nametype]['iframe']=false;

	$GLOBAL['baiviet'][$nametype]['sodienthoai']=false;

	$GLOBAL['baiviet'][$nametype]['seo'] = true;

	$GLOBAL['baiviet'][$nametype]['daytin'] = false;

	$GLOBAL['baiviet'][$nametype]['mucluc'] = true;

	$GLOBAL['baiviet'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	$GLOBAL['baiviet'][$nametype]['file_type']='doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

	// danh mục cấp 1

	$GLOBAL['baiviet'][$nametype]['list'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['title'] = 'danh mục cấp 1';

		$GLOBAL_LEVEL1['baiviet'][$nametype]['full'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['check_list']=array(

			"mucluc"=> "Mục lục",

			"noibat"=>"Nổi bật",

			"hienthi"=>"Hiển thị"

		);

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-width'] = 256;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-height'] = 256;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['dm_index'] = false;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['icon'] = false;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['banner'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['link_cano'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['banner-width'] = 1200;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['banner-height'] = 510;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['banner-ratio'] = 1;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-width1'] = 32;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-height1'] = 42;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['advance'] = false;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['adv-w'] = 1200;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['adv-h'] = 310;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-ratio'] = 1;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['mota'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['mota-ckeditor'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['noidung'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['noidung-ckeditor'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['seo'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['noibat'] = false;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-qc'] = false;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-qc-width'] = 1270;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-qc-height'] = 300;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-qc-ratio'] = 1;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

		// danh mục cấp 2

	$GLOBAL['baiviet'][$nametype]['cat'] = true;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['title'] = 'Danh mục cấp 2';

	$GLOBAL_LEVEL2['baiviet'][$nametype]['full'] = true;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['check_cat']=array(

		"mucluc"=> "Mục lục",

		"hienthi"=>"Hiển thị"
		
	);

	$GLOBAL_LEVEL2['baiviet'][$nametype]['img'] = true;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['img-width'] = 87;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['img-height'] = 56;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['brand'] = true;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['link_cano'] = true;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['list'] = true;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['icon'] = false;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['img-width1'] = 87;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['img-height1'] = 56;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['img-ratio'] = 1;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['mota'] = true;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['noidung'] = true;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['seo'] = true;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['img-qc'] = false;

	$GLOBAL_LEVEL2['baiviet'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	


	
	#========================Dịch vụ==================== 

	#======================== Tính năng (trang /tinh-nang) ====================
	// "Mô tả" (soạn bằng CKEditor) hiện ở trang danh sách tính năng, "Nội dung" hiện ở trang chi tiết.
	// Hình: có ảnh đại diện thì dùng ảnh; không có thì dùng hình dựng sẵn theo ô "Mã hình minh họa".

	$nametype='tinh-nang';

	$GLOBAL['baiviet'][$nametype]['title_main'] = 'Tính năng';

	$GLOBAL['baiviet'][$nametype]['title'] = 'Danh sách tính năng';

	$GLOBAL['baiviet'][$nametype]['full'] = false;

	$GLOBAL['baiviet'][$nametype]['public'] = false;

	$GLOBAL['baiviet'][$nametype]['index_robots'] = true;

	$GLOBAL['baiviet'][$nametype]['link_cano'] = true;

	$GLOBAL['baiviet'][$nametype]['check']=array(

		"hienthi"=>"Hiển thị"

	);

	$GLOBAL['baiviet'][$nametype]['img'] = true;

	$GLOBAL['baiviet'][$nametype]['img-width'] = 1200;

	$GLOBAL['baiviet'][$nametype]['img-height'] = 800;

	$GLOBAL['baiviet'][$nametype]['img-ratio'] = 1;

	$GLOBAL['baiviet'][$nametype]['icon'] = false;

	$GLOBAL['baiviet'][$nametype]['mota'] = true;

	$GLOBAL['baiviet'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['tenrieng'] = true;

	$GLOBAL['baiviet'][$nametype]['tenrieng-label'] = 'Mã hình minh họa (kanban, danh-sach, quy-trinh, gantt, tong-quan, tro-ly-ai, khoi-luong, tu-dong-hoa, so-do)';

	$GLOBAL['baiviet'][$nametype]['job'] = false;

	$GLOBAL['baiviet'][$nametype]['seo'] = true;

	$GLOBAL['baiviet'][$nametype]['alias'] = true;

	$GLOBAL['baiviet'][$nametype]['tag'] = false;

	$GLOBAL['baiviet'][$nametype]['list'] = false;

	$GLOBAL['baiviet'][$nametype]['img_type']='.jpg|.png|.jpeg|.JPG|.PNG|.JPEG|.webp';

	#======================== Cam kết (trang /cam-ket + khối Cam kết ở trang chủ) ====================
	// Tên + Mô tả hiện ở thẻ; Nội dung hiện ở trang chi tiết; tích "Nổi bật" thì hiện ở trang chủ (tối đa 3 bài, theo STT)

	$nametype='cam-ket';

	$GLOBAL['baiviet'][$nametype]['title_main'] = 'Cam kết';

	$GLOBAL['baiviet'][$nametype]['title'] = 'Bài viết cam kết';

	$GLOBAL['baiviet'][$nametype]['full'] = false;

	$GLOBAL['baiviet'][$nametype]['public'] = false;

	$GLOBAL['baiviet'][$nametype]['index_robots'] = true;

	$GLOBAL['baiviet'][$nametype]['link_cano'] = true;

	$GLOBAL['baiviet'][$nametype]['check']=array(

		"hienthi"=>"Hiển thị",

		"noibat"=>"Nổi bật (hiện ở trang chủ)"

	);

	$GLOBAL['baiviet'][$nametype]['img'] = true;

	$GLOBAL['baiviet'][$nametype]['img-width'] = 1200;

	$GLOBAL['baiviet'][$nametype]['img-height'] = 800;

	$GLOBAL['baiviet'][$nametype]['img-ratio'] = 1;

	$GLOBAL['baiviet'][$nametype]['icon'] = false;

	$GLOBAL['baiviet'][$nametype]['mota'] = true;

	$GLOBAL['baiviet'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['tenrieng'] = false;

	$GLOBAL['baiviet'][$nametype]['job'] = false;

	$GLOBAL['baiviet'][$nametype]['seo'] = true;

	$GLOBAL['baiviet'][$nametype]['alias'] = true;

	$GLOBAL['baiviet'][$nametype]['tag'] = false;

	$GLOBAL['baiviet'][$nametype]['list'] = false;

	$GLOBAL['baiviet'][$nametype]['img_type']='.jpg|.png|.jpeg|.JPG|.PNG|.JPEG|.webp|.gif|.GIF';

	#======================== Blogs (trang /tin-tuc) ====================

	$nametype='tin-tuc';

	$GLOBAL['baiviet'][$nametype]['title_main'] = 'Blogs';

	$GLOBAL['baiviet'][$nametype]['title'] = 'Danh sách blog';

	$GLOBAL['baiviet'][$nametype]['full'] = false;

	$GLOBAL['baiviet'][$nametype]['public'] = false;

	$GLOBAL['baiviet'][$nametype]['index_robots'] = true;

	$GLOBAL['baiviet'][$nametype]['link_cano'] = true;

	$GLOBAL['baiviet'][$nametype]['tacgia'] = false; // đã bỏ mục Tác giả, bài ghi tác giả WEA Soft

	$GLOBAL['baiviet'][$nametype]['schema'] = true;

	$GLOBAL['baiviet'][$nametype]['check']=array(

		"mucluc"=>"Mục lục",

		"noibat"=>"Nổi bật",

		"hienthi"=>"Hiển thị"

	);

	$GLOBAL['baiviet'][$nametype]['tag']=true;

	$GLOBAL['baiviet'][$nametype]['tags']=false;

	$GLOBAL['baiviet'][$nametype]['img'] = true;

	$GLOBAL['baiviet'][$nametype]['img-width'] = 383;

	$GLOBAL['baiviet'][$nametype]['img-height'] = 374;

	$GLOBAL['baiviet'][$nametype]['icon'] = false;

	$GLOBAL['baiviet'][$nametype]['img-width1'] = 50;

	$GLOBAL['baiviet'][$nametype]['img-height1'] = 50;

	$GLOBAL['baiviet'][$nametype]['img-ratio'] = 1;

	$GLOBAL['baiviet'][$nametype]['mota'] = true;

	$GLOBAL['baiviet'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['job'] = false;

	$GLOBAL['baiviet'][$nametype]['seo'] = true;

	$GLOBAL['baiviet'][$nametype]['alias'] = true;

	$GLOBAL['baiviet'][$nametype]['tag'] = false;

	$GLOBAL['baiviet'][$nametype]['top_nb'] = false;

	$GLOBAL['baiviet'][$nametype]['rating'] = false;

	$GLOBAL['baiviet'][$nametype]['daytin'] = false;

	$GLOBAL['baiviet'][$nametype]['mucluc'] = true;

	$GLOBAL['baiviet'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	$GLOBAL['baiviet'][$nametype]['file_type']='doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

	// danh mục cấp 1

	$GLOBAL['baiviet'][$nametype]['list'] = false; // Blogs không chia danh mục nên tắt (đổi true để bật lại)

		$GLOBAL_LEVEL1['baiviet'][$nametype]['title'] = 'danh mục cấp 1';

		$GLOBAL_LEVEL1['baiviet'][$nametype]['full'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['check_list']=array(

			"mucluc"=> "Mục lục",

			"hienthi"=>"Hiển thị"

		);

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-width'] = 256;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-height'] = 256;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['dm_index'] = false;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['icon'] = false;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['banner'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['link_cano'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['banner-width'] = 1200;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['banner-height'] = 510;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['banner-ratio'] = 1;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-width1'] = 32;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-height1'] = 42;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['advance'] = false;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['adv-w'] = 1200;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['adv-h'] = 310;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-ratio'] = 1;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['mota'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['mota-ckeditor'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['noidung'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['noidung-ckeditor'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['seo'] = true;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['noibat'] = false;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-qc'] = false;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-qc-width'] = 1270;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-qc-height'] = 300;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img-qc-ratio'] = 1;

		$GLOBAL_LEVEL1['baiviet'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';


	#========================banner trang chủ=================================================

	$nametype='banner_index';

	$GLOBAL['baiviet'][$nametype]['title_main'] = 'banner trang chủ';

	$GLOBAL['baiviet'][$nametype]['title'] = 'danh sách';

	$GLOBAL['baiviet'][$nametype]['full'] = false;

	$GLOBAL['baiviet'][$nametype]['public'] = false;

	$GLOBAL['baiviet'][$nametype]['index_robots'] = true;

	$GLOBAL['baiviet'][$nametype]['link_cano'] = true;

	$GLOBAL['baiviet'][$nametype]['tacgia'] = true;

	$GLOBAL['baiviet'][$nametype]['schema'] = true;

	$GLOBAL['baiviet'][$nametype]['check']=array(

		"mucluc"=>"Mục lục",

		"noibat"=>"Nổi bật",

		"hienthi"=>"Hiển thị"

	);

	$GLOBAL['baiviet'][$nametype]['tag']=true;

	$GLOBAL['baiviet'][$nametype]['tags']=false;

	$GLOBAL['baiviet'][$nametype]['img'] = true;

	$GLOBAL['baiviet'][$nametype]['ten2'] = true;

	$GLOBAL['baiviet'][$nametype]['img-width'] = 383;

	$GLOBAL['baiviet'][$nametype]['img-height'] = 374;

	$GLOBAL['baiviet'][$nametype]['icon'] = false;

	$GLOBAL['baiviet'][$nametype]['img-width1'] = 50;

	$GLOBAL['baiviet'][$nametype]['img-height1'] = 50;

	$GLOBAL['baiviet'][$nametype]['img-ratio'] = 1;

	$GLOBAL['baiviet'][$nametype]['mota'] = true;

	$GLOBAL['baiviet'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['motaindex'] = false;

	$GLOBAL['baiviet'][$nametype]['motaindex-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung'] = false;

	$GLOBAL['baiviet'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['job'] = false;

	$GLOBAL['baiviet'][$nametype]['seo'] = true;

	$GLOBAL['baiviet'][$nametype]['link'] = true;

	$GLOBAL['baiviet'][$nametype]['link2'] = true;

	$GLOBAL['baiviet'][$nametype]['alias'] = false;

	$GLOBAL['baiviet'][$nametype]['tag'] = false;

	$GLOBAL['baiviet'][$nametype]['top_nb'] = false;

	$GLOBAL['baiviet'][$nametype]['rating'] = false;

	$GLOBAL['baiviet'][$nametype]['daytin'] = false;

	$GLOBAL['baiviet'][$nametype]['mucluc'] = true;

	$GLOBAL['baiviet'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	$GLOBAL['baiviet'][$nametype]['file_type']='doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';


	#========================Quy trình=================================================

	$nametype='quy-trinh';

	$GLOBAL['baiviet'][$nametype]['title_main'] = 'Quy trình';

	$GLOBAL['baiviet'][$nametype]['title'] = 'danh sách quy trình';

	$GLOBAL['baiviet'][$nametype]['full'] = false;

	$GLOBAL['baiviet'][$nametype]['public'] = false;

	$GLOBAL['baiviet'][$nametype]['index_robots'] = true;

	$GLOBAL['baiviet'][$nametype]['link_cano'] = true;

	$GLOBAL['baiviet'][$nametype]['tacgia'] = true;

	$GLOBAL['baiviet'][$nametype]['schema'] = true;

	$GLOBAL['baiviet'][$nametype]['check']=array(

		"mucluc"=>"Mục lục",

		"hienthi"=>"Hiển thị"

	);

	$GLOBAL['baiviet'][$nametype]['tag']=true;

	$GLOBAL['baiviet'][$nametype]['tags']=false;

	$GLOBAL['baiviet'][$nametype]['img'] = true;

	$GLOBAL['baiviet'][$nametype]['img-width'] = 383;

	$GLOBAL['baiviet'][$nametype]['img-height'] = 374;

	$GLOBAL['baiviet'][$nametype]['icon'] = false;

	$GLOBAL['baiviet'][$nametype]['img-width1'] = 50;

	$GLOBAL['baiviet'][$nametype]['img-height1'] = 50;

	$GLOBAL['baiviet'][$nametype]['img-ratio'] = 1;

	$GLOBAL['baiviet'][$nametype]['mota'] = false;

	$GLOBAL['baiviet'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['motaindex'] = false;

	$GLOBAL['baiviet'][$nametype]['motaindex-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung'] = false;

	$GLOBAL['baiviet'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['job'] = false;

	$GLOBAL['baiviet'][$nametype]['seo'] = true;

	$GLOBAL['baiviet'][$nametype]['link'] = false;

	$GLOBAL['baiviet'][$nametype]['link2'] = false;

	$GLOBAL['baiviet'][$nametype]['alias'] = false;

	$GLOBAL['baiviet'][$nametype]['tag'] = false;

	$GLOBAL['baiviet'][$nametype]['top_nb'] = false;

	$GLOBAL['baiviet'][$nametype]['rating'] = false;

	$GLOBAL['baiviet'][$nametype]['daytin'] = false;

	$GLOBAL['baiviet'][$nametype]['mucluc'] = true;

	$GLOBAL['baiviet'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	$GLOBAL['baiviet'][$nametype]['file_type']='doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';


	#=================================Thư Viện Ảnh========================================

	$nametype='album';

	$GLOBAL['baiviet'][$nametype]['title_main'] = 'Thư Viện Ảnh';

	$GLOBAL['baiviet'][$nametype]['title'] = 'danh sách Album ';

	$GLOBAL['baiviet'][$nametype]['full'] = false;

	$GLOBAL['baiviet'][$nametype]['public'] = false;

	$GLOBAL['baiviet'][$nametype]['index_robots'] = false;

	$GLOBAL['baiviet'][$nametype]['link_cano'] = false;

	$GLOBAL['baiviet'][$nametype]['tacgia'] = false;

	$GLOBAL['baiviet'][$nametype]['schema'] = true;

	$GLOBAL['baiviet'][$nametype]['check']=array(


		"hienthi"=>"Hiển thị",
		"noibat"=>"Nổi Bật"

	);

	$GLOBAL['baiviet'][$nametype]['tag']=true;

	$GLOBAL['baiviet'][$nametype]['tags']=false;

	$GLOBAL['baiviet'][$nametype]['img'] = true;

	$GLOBAL['baiviet'][$nametype]['img-width'] = 383;

	$GLOBAL['baiviet'][$nametype]['img-height'] = 374;

	$GLOBAL['baiviet'][$nametype]['icon'] = false;

	$GLOBAL['baiviet'][$nametype]['img-width1'] = 50;

	$GLOBAL['baiviet'][$nametype]['img-height1'] = 50;

	$GLOBAL['baiviet'][$nametype]['img-ratio'] = 1;

	$GLOBAL['baiviet'][$nametype]['mota'] = false;

	$GLOBAL['baiviet'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['motaindex'] = false;

	$GLOBAL['baiviet'][$nametype]['motaindex-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung'] = false;

	$GLOBAL['baiviet'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['job'] = false;

	$GLOBAL['baiviet'][$nametype]['seo'] = true;

	$GLOBAL['baiviet'][$nametype]['link'] = false;

	$GLOBAL['baiviet'][$nametype]['link2'] = false;

	$GLOBAL['baiviet'][$nametype]['alias'] = false;

	$GLOBAL['baiviet'][$nametype]['tag'] = false;

	$GLOBAL['baiviet'][$nametype]['top_nb'] = false;

	$GLOBAL['baiviet'][$nametype]['rating'] = false;

	$GLOBAL['baiviet'][$nametype]['daytin'] = false;

	$GLOBAL['baiviet'][$nametype]['mucluc'] = true;
	$GLOBAL['baiviet'][$nametype]['img-gallery'] = true;

	$GLOBAL['baiviet'][$nametype]['multi-gallery-arr']=array

	(

		$nametype=>array

			(

            	"title_main_photo" => "Hình ảnh kèm theo",

            	"title_sub_photo" => "Hình ảnh",

            	"width_photo" => 385,

            	"height_photo" => 288,

            	"thumb_width_photo" => 385,

            	"thumb_height_photo" => 288,

            	"thumb_ratio_photo" => 1,

            	"img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp'

         	)

	);

	$GLOBAL['baiviet'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	$GLOBAL['baiviet'][$nametype]['file_type']='doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

	#========================Chính sách==================== 

	$nametype='chinh-sach';

	$GLOBAL['baiviet'][$nametype]['title_main'] = 'Chính sách';

	$GLOBAL['baiviet'][$nametype]['title'] = 'danh sách';

	$GLOBAL['baiviet'][$nametype]['full'] = false;

	$GLOBAL['baiviet'][$nametype]['public'] = true;

	$GLOBAL['baiviet'][$nametype]['index_robots'] = true;

	$GLOBAL['baiviet'][$nametype]['link_cano'] = true;

	$GLOBAL['baiviet'][$nametype]['tacgia'] = false;

	$GLOBAL['baiviet'][$nametype]['schema'] = true;

	$GLOBAL['baiviet'][$nametype]['check']=array(

		"mucluc"=>"Mục lục tự động",

		"hienthi"=>"Hiển thị"

	);

	$GLOBAL['baiviet'][$nametype]['tag']=true;

	$GLOBAL['baiviet'][$nametype]['img'] = false;

	$GLOBAL['baiviet'][$nametype]['img-width'] = 270;

	$GLOBAL['baiviet'][$nametype]['img-height'] = 220;

	$GLOBAL['baiviet'][$nametype]['img-ratio'] = 1;

	$GLOBAL['baiviet'][$nametype]['mota'] = false;

	$GLOBAL['baiviet'][$nametype]['mota-ckeditor'] = false;

	$GLOBAL['baiviet'][$nametype]['noidung'] = true;

	$GLOBAL['baiviet'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['baiviet'][$nametype]['job'] = false;

	$GLOBAL['baiviet'][$nametype]['seo'] = true;

	$GLOBAL['baiviet'][$nametype]['alias'] = true;

	$GLOBAL['baiviet'][$nametype]['tag'] = false;

	$GLOBAL['baiviet'][$nametype]['top_nb'] = false;

	$GLOBAL['baiviet'][$nametype]['rating'] = false;

	$GLOBAL['baiviet'][$nametype]['daytin'] = false;

	$GLOBAL['baiviet'][$nametype]['mucluc'] = true;

	$GLOBAL['baiviet'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	$GLOBAL['baiviet'][$nametype]['file_type']='doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

	##===================Giới thiệu========================

	$nametype='gioi-thieu';

	$GLOBAL['info'][$nametype]['title_main'] = 'Giới thiệu';

	$GLOBAL['info'][$nametype]['title'] = 'Quản lý Giới thiệu';

	$GLOBAL['info'][$nametype]['public'] = false;

	$GLOBAL['info'][$nametype]['full'] = false;

	$GLOBAL['info'][$nametype]['img'] = true;

	$GLOBAL['info'][$nametype]['img-width'] = 487;

	$GLOBAL['info'][$nametype]['img-height'] = 340;

	$GLOBAL['info'][$nametype]['img-ratio'] = 1;

	$GLOBAL['info'][$nametype]['img-b'] = false;

	$GLOBAL['info'][$nametype]['img-gallery'] = false;

	$GLOBAL['info'][$nametype]['mota'] = true;

	$GLOBAL['info'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['info'][$nametype]['noidung'] = true;

	$GLOBAL['info'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['info'][$nametype]['link'] = false;

	$GLOBAL['info'][$nametype]['seo'] = true;

	$GLOBAL['info'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	$GLOBAL['info'][$nametype]['img-gallery'] = false;

	$GLOBAL['info'][$nametype]['multi-gallery-arr']=array

	(

		$nametype=>array

			(

            	"title_main_photo" => "Hình ảnh Sản phẩm",

            	"title_sub_photo" => "Hình ảnh",

            	"width_photo" => 500,

            	"height_photo" => 500,

            	"thumb_width_photo" => 500,

            	"thumb_height_photo" => 500,

            	"thumb_ratio_photo" => 1,

            	"img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp'

         	)

	);

	#================================================Hồ sơ năng lực==========================================

	$nametype='ho-so-nang-luc';

	$GLOBAL['info'][$nametype]['title_main'] = 'Hồ sơ năng lực';

	$GLOBAL['info'][$nametype]['title'] = 'Quản lý Hồ sơ năng lực';

	$GLOBAL['info'][$nametype]['public'] = false;

	$GLOBAL['info'][$nametype]['full'] = false;

	$GLOBAL['info'][$nametype]['img'] = true;

	$GLOBAL['info'][$nametype]['img-width'] = 487;

	$GLOBAL['info'][$nametype]['img-height'] = 340;

	$GLOBAL['info'][$nametype]['img-ratio'] = 1;

	$GLOBAL['info'][$nametype]['img-b'] = false;

	$GLOBAL['info'][$nametype]['img-gallery'] = false;

	$GLOBAL['info'][$nametype]['mota'] = true;

	$GLOBAL['info'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['info'][$nametype]['noidung'] = true;

	$GLOBAL['info'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['info'][$nametype]['link'] = false;

	$GLOBAL['info'][$nametype]['seo'] = true;

	$GLOBAL['info'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	$GLOBAL['info'][$nametype]['img-gallery'] = false;

	$GLOBAL['info'][$nametype]['multi-gallery-arr']=array

	(

		$nametype=>array

			(

            	"title_main_photo" => "Hình ảnh Sản phẩm",

            	"title_sub_photo" => "Hình ảnh",

            	"width_photo" => 500,

            	"height_photo" => 500,

            	"thumb_width_photo" => 500,

            	"thumb_height_photo" => 500,

            	"thumb_ratio_photo" => 1,

            	"img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp'

         	)

	);


	#==================== TRANG CHỦ WEA ============================
	// Các mục nội dung trang chủ (theo mẫu WEASoft.html). Đổi true/false để bật / tắt trường trong admin.

	// Chữ đầu trang: ô "Tên" là H1, phần đặt trong [ ] sẽ được tô màu. Mô tả: dòng 1 là đoạn giới thiệu, dòng 2 là ghi chú nhỏ.
	$nametype='wea-hero-text';

	$GLOBAL['info'][$nametype]['title_main'] = 'Trang chủ: Chữ đầu trang';

	$GLOBAL['info'][$nametype]['title'] = 'Chữ đầu trang (Tên = tiêu đề H1: dấu | là xuống dòng, phần trong [ ] tô màu; Mô tả = đoạn giới thiệu)';

	$GLOBAL['info'][$nametype]['full'] = false;

	$GLOBAL['info'][$nametype]['img'] = false;

	$GLOBAL['info'][$nametype]['mota'] = true;

	$GLOBAL['info'][$nametype]['mota-ckeditor'] = false;

	$GLOBAL['info'][$nametype]['noidung'] = false;

	$GLOBAL['info'][$nametype]['link'] = false;

	$GLOBAL['info'][$nametype]['seo'] = false;

	// Khối "Lý do nên chọn WEA": Tên = tiêu đề cột trái, Mô tả = câu mở đầu. Từng lý do nhập ở mục "Trang chủ: Các lý do".
	$nametype='wea-ly-do';

	$GLOBAL['info'][$nametype]['title_main'] = 'Trang chủ: Lý do chọn WEA';

	$GLOBAL['info'][$nametype]['title'] = 'Lý do chọn WEA (tiêu đề + câu mở đầu)';

	$GLOBAL['info'][$nametype]['full'] = false;

	$GLOBAL['info'][$nametype]['img'] = false;

	$GLOBAL['info'][$nametype]['mota'] = true;

	$GLOBAL['info'][$nametype]['mota-ckeditor'] = false;

	$GLOBAL['info'][$nametype]['noidung'] = false;

	$GLOBAL['info'][$nametype]['link'] = false;

	$GLOBAL['info'][$nametype]['seo'] = false;

	// Lời người sáng lập. Mô tả: dòng 1 in đậm dưới hình, dòng 2 là câu giới thiệu ngắn.
	$nametype='wea-sang-lap';

	$GLOBAL['info'][$nametype]['title_main'] = 'Trang chủ: Lời người sáng lập';

	$GLOBAL['info'][$nametype]['title'] = 'Lời người sáng lập';

	$GLOBAL['info'][$nametype]['full'] = false;

	$GLOBAL['info'][$nametype]['img'] = true;

	$GLOBAL['info'][$nametype]['img-width'] = 400;

	$GLOBAL['info'][$nametype]['img-height'] = 470;

	$GLOBAL['info'][$nametype]['img-ratio'] = 1;

	$GLOBAL['info'][$nametype]['img-b'] = false;

	$GLOBAL['info'][$nametype]['img-gallery'] = false;

	$GLOBAL['info'][$nametype]['mota'] = true;

	$GLOBAL['info'][$nametype]['mota-ckeditor'] = false;

	$GLOBAL['info'][$nametype]['noidung'] = true;

	$GLOBAL['info'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['info'][$nametype]['link'] = false;

	$GLOBAL['info'][$nametype]['seo'] = false;

	$GLOBAL['info'][$nametype]['img_type']='.jpg|.png|.jpeg|.JPG|.PNG|.JPEG|.webp';

	// Hình đầu trang: STT 1 = ảnh chính, STT 2 = ảnh nổi bên trái, STT 3 = ảnh nổi bên phải. "Tên" dùng làm chữ mô tả ảnh (alt).
	$nametype='wea-hero';

	$GLOBAL['photo'][$nametype]['title_main'] = 'Trang chủ: Hình đầu trang';

	$GLOBAL['photo'][$nametype]['title'] = 'Hình đầu trang (STT 1 ảnh chính, 2 ảnh nổi trái, 3 ảnh nổi phải)';

	$GLOBAL['photo'][$nametype]['full'] = false;

	$GLOBAL['photo'][$nametype]['img'] = true;

	$GLOBAL['photo'][$nametype]['img-width'] = 1250;

	$GLOBAL['photo'][$nametype]['img-height'] = 530;

	$GLOBAL['photo'][$nametype]['img-ratio'] = 1;

	$GLOBAL['photo'][$nametype]['options'] = false;

	$GLOBAL['photo'][$nametype]['number'] = false;

	$GLOBAL['photo'][$nametype]['link'] = false;

	$GLOBAL['photo'][$nametype]['mota'] = false;

	$GLOBAL['photo'][$nametype]['img_type']='.jpg|.png|.jpeg|.JPG|.PNG|.JPEG|.webp';

	// Hình biểu đồ: "Tên 2" là tên tab; để trống "Tên 2" thì ảnh nằm phía trên các tab.
	$nametype='wea-bieu-do';

	$GLOBAL['photo'][$nametype]['title_main'] = 'Trang chủ: Hình biểu đồ';

	$GLOBAL['photo'][$nametype]['title'] = 'Hình biểu đồ (Tên 2 = tên tab, để trống = ảnh trên cùng)';

	$GLOBAL['photo'][$nametype]['full'] = false;

	$GLOBAL['photo'][$nametype]['img'] = true;

	$GLOBAL['photo'][$nametype]['img-width'] = 620;

	$GLOBAL['photo'][$nametype]['img-height'] = 396;

	$GLOBAL['photo'][$nametype]['img-ratio'] = 1;

	$GLOBAL['photo'][$nametype]['options'] = false;

	$GLOBAL['photo'][$nametype]['number'] = false;

	$GLOBAL['photo'][$nametype]['link'] = false;

	$GLOBAL['photo'][$nametype]['ten2'] = true;

	$GLOBAL['photo'][$nametype]['mota'] = false;

	$GLOBAL['photo'][$nametype]['img_type']='.jpg|.png|.jpeg|.JPG|.PNG|.JPEG|.webp';

	// Từng lý do: "Tên" = chữ ngắn ở cột trái, "Tên 2" = tiêu đề đầy đủ, "Mô tả" = nội dung. Bấm tên nào thì hiện nội dung đó.
	$nametype='wea-ly-do-muc';

	$GLOBAL['photo'][$nametype]['title_main'] = 'Trang chủ: Các lý do';

	$GLOBAL['photo'][$nametype]['title'] = 'Các lý do chọn WEA (Tên = chữ ở cột trái, Tên 2 = tiêu đề đầy đủ)';

	$GLOBAL['photo'][$nametype]['full'] = false;

	$GLOBAL['photo'][$nametype]['img'] = false;

	$GLOBAL['photo'][$nametype]['options'] = false;

	$GLOBAL['photo'][$nametype]['number'] = false;

	$GLOBAL['photo'][$nametype]['link'] = false;

	$GLOBAL['photo'][$nametype]['ten2'] = true;

	$GLOBAL['photo'][$nametype]['mota'] = true;

	$GLOBAL['photo'][$nametype]['mota-ckeditor'] = true;

	// Ba bước: "Tên" là tiêu đề bước, "Mô tả" là câu giải thích. Biểu tượng và màu theo thứ tự STT.
	$nametype='wea-buoc';

	$GLOBAL['photo'][$nametype]['title_main'] = 'Trang chủ: Ba bước';

	$GLOBAL['photo'][$nametype]['title'] = 'Các bước bắt đầu';

	$GLOBAL['photo'][$nametype]['full'] = false;

	$GLOBAL['photo'][$nametype]['img'] = false;

	$GLOBAL['photo'][$nametype]['options'] = false;

	$GLOBAL['photo'][$nametype]['number'] = false;

	$GLOBAL['photo'][$nametype]['link'] = false;

	$GLOBAL['photo'][$nametype]['mota'] = true;

	$GLOBAL['photo'][$nametype]['mota-ckeditor'] = false;

	// Cam kết: "Tên" là tiêu đề thẻ, "Mô tả" là nội dung. Hình minh họa nhỏ theo thứ tự STT.
	$nametype='wea-cam-ket';

	$GLOBAL['photo'][$nametype]['title_main'] = 'Trang chủ: Cam kết';

	$GLOBAL['photo'][$nametype]['title'] = 'Cam kết đồng hành';

	$GLOBAL['photo'][$nametype]['full'] = false;

	$GLOBAL['photo'][$nametype]['img'] = false;

	$GLOBAL['photo'][$nametype]['options'] = false;

	$GLOBAL['photo'][$nametype]['number'] = false;

	$GLOBAL['photo'][$nametype]['link'] = false;

	$GLOBAL['photo'][$nametype]['mota'] = true;

	$GLOBAL['photo'][$nametype]['mota-ckeditor'] = false;

	// Bảng giá: "Tên" = tên gói, "Tên 2" = giá (phần sau dấu | in nhỏ, vd: 90k|/ người / tháng),
	// "Mô tả" = nội dung gói, "Link" + "Link tag" = đường dẫn và chữ trên nút, "Số" = 1 để làm gói nổi bật.
	$nametype='wea-bang-gia';

	$GLOBAL['photo'][$nametype]['title_main'] = 'Trang chủ: Bảng giá';

	$GLOBAL['photo'][$nametype]['title'] = 'Bảng giá (Tên 2 = giá, Số = 1 là gói nổi bật)';

	$GLOBAL['photo'][$nametype]['full'] = false;

	$GLOBAL['photo'][$nametype]['img'] = false;

	$GLOBAL['photo'][$nametype]['options'] = false;

	$GLOBAL['photo'][$nametype]['number'] = true;

	$GLOBAL['photo'][$nametype]['link'] = true;

	$GLOBAL['photo'][$nametype]['link_tag'] = true;

	$GLOBAL['photo'][$nametype]['ten2'] = true;

	$GLOBAL['photo'][$nametype]['mota'] = true;

	$GLOBAL['photo'][$nametype]['mota-ckeditor'] = true;

	#==================== TRANG CHỦ WEA (thiết kế 11/2026) ============================
	// Chữ trong [ ] được tô màu xanh; dấu | trong tiêu đề là xuống dòng. Icon của các thẻ đi theo thứ tự STT.

	// Các khối chữ (tiêu đề + mô tả) và ảnh lớn của từng phần trang chủ
	$weaKhoiInfo = array(
		'wea-ve-wea' => array('Trang chủ: Về WEA', 'Về WEA (Tên = tiêu đề, Mô tả dòng 1 = giới thiệu, dòng 2 = chữ trên thẻ nổi của ảnh)', true),
		'wea-lien-he-nen' => array('Liên hệ: ảnh nền đầu trang', 'Ảnh nền phía trên trang Liên hệ (chỉ dùng Hình; ảnh ngang khoảng 1920x640, sáng nhạt)', true),
		'wea-lien-he-trai' => array('Liên hệ: ảnh bên trái', 'Ảnh thẻ bên trái trang Liên hệ (chỉ dùng Hình; PNG nền trong suốt, góc dưới trái để trống cho 3 kênh liên hệ)', true),
		'wea-lien-he-phai' => array('Liên hệ: ảnh tờ thư', 'Ảnh tờ thư + phong bì bên phải trang Liên hệ, form nằm trên ảnh (chỉ dùng Hình; PNG nền trong suốt, giữ đúng tỉ lệ ảnh hiện tại)', true),
		'wea-ve-nen' => array('Trang chủ: Về WEA (ảnh nền khối)', 'Ảnh nền tràn hết khối Về WEA ở trang chủ (chỉ dùng Hình; ảnh ngang khoảng 2000x800, sáng nhạt)', true),
		'wea-van-de' => array('Trang chủ: Vấn đề đội nhóm', 'Vấn đề đội nhóm (Tên = tiêu đề, Mô tả = đoạn giải thích)', false),
		'wea-nen-tang' => array('Trang chủ: Nền tảng WEA Task', 'Một nền tảng cho cả hành trình dự án (Tên = tiêu đề, Mô tả = đoạn giải thích)', false),
		'wea-dich-vu' => array('Trang chủ: Dịch vụ website', 'Dịch vụ website (Tên = tiêu đề, Mô tả = đoạn giải thích, Hình = ảnh bên phải)', true),
		'wea-cta' => array('Trang chủ: Lời kêu gọi cuối trang', 'Dải kêu gọi cuối trang (Tên = tiêu đề, | xuống dòng; Mô tả = mỗi dòng 1 đoạn, từ 3 dòng trở lên thì dòng cuối là câu chốt in đậm; Hình = ảnh nền ngang khoảng 1920x640)', true),
		'wea-cam-ket-dau' => array('Trang chủ: Cam kết (đầu khối)', 'Đầu khối Cam kết ở trang chủ và đầu trang /cam-ket (Tên = tiêu đề, | xuống dòng; Mô tả = đoạn dẫn). Các bài cam kết nhập ở mục bài viết Cam kết', false),
		'wea-vi-sao-dau' => array('Trang chủ: Vì sao chọn WEA (đầu khối)', 'Đầu khối Vì sao chọn chúng tôi (Tên = tiêu đề, | xuống dòng; Mô tả = mỗi dòng 1 đoạn dẫn ngắn; Hình = ảnh nền banner, ảnh ngang khoảng 1920x640, chủ thể đặt bên phải)', true),
		// Trang Giải pháp WEA Task (/giai-phap-wea-task)
		'wt-dau' => array('Giải pháp WEA Task: Đầu trang', 'Đầu trang (Tên = tiêu đề, [ ] tô xanh, | xuống dòng; Mô tả dòng 1 = đoạn giới thiệu, dòng 2–4 = 3 điểm nổi bật; ảnh chạy ở mục Slide đầu trang)', false),
		'wt-nhip' => array('Giải pháp WEA Task: Khối Nhịp làm việc', 'Khối "Từ việc rời rạc..." (Tên = tiêu đề, Mô tả = đoạn giải thích; 3 thẻ nhập ở Thẻ nhịp làm việc)', false),
		'wt-ke-hoach' => array('Giải pháp WEA Task: Khối Lên kế hoạch', 'Khối "Một nơi để lên kế hoạch..." (Tên = tiêu đề, Mô tả = đoạn giải thích; các tab nhập ở Tab lên kế hoạch)', false),
		'wt-phoi-hop' => array('Giải pháp WEA Task: Khối Phối hợp', 'Khối "Cả nhóm phối hợp..." (Tên = tiêu đề, Mô tả = đoạn giải thích)', false),
		'wt-goi' => array('Giải pháp WEA Task: Khối Gói (đầu khối)', 'Đầu khối bảng gói (Tên = tiêu đề, Mô tả = đoạn nhỏ). Các gói dùng chung mục Trang chủ: Bảng giá', false),
		'wt-ext' => array('Giải pháp WEA Task: Khối Extension (đầu khối)', 'Đầu khối Extension (Tên = tiêu đề, Mô tả = đoạn nhỏ)', false),
		'wt-token' => array('Giải pháp WEA Task: Khối token AI (đầu khối)', 'Đầu khối Mua thêm token AI (Tên = tiêu đề, Mô tả = đoạn nhỏ)', false),
		'wt-combo' => array('Giải pháp WEA Task: Combo Business Suite', 'Combo (Tên = tiêu đề, Mô tả dòng 1 = giới thiệu, dòng 2 = giá combo bằng số, dòng 3 = ghi chú cuối; Hình = ảnh bên trái). Để trống giá combo thì khối không hiện', true),
		'wt-cuoi' => array('Giải pháp WEA Task: Lời kết', 'Lời kết cuối trang (Tên = tiêu đề, Mô tả = đoạn nhỏ)', false),
		// Trang Thiết kế website (/thiet-ke-website)
		'web-dau' => array('Thiết kế website: Đầu trang', 'Đầu trang (Tên = tiêu đề, [ ] tô xanh, | xuống dòng; Mô tả dòng 1 = đoạn giới thiệu, dòng 2–4 = 3 dấu tích; ảnh chạy ở mục Slide đầu trang)', false),
		'web-mo-hinh' => array('Thiết kế website: Khối Mô hình (đầu khối)', 'Đầu khối mô hình website (Tên = tiêu đề, Mô tả = đoạn nhỏ)', false),
		'web-hai-mat' => array('Thiết kế website: Khối Không chỉ những gì khách thấy', 'Tên = tiêu đề ([ ] tô xanh, | xuống dòng), Mô tả dòng 1 = đoạn giải thích, các dòng sau = dấu tích. 2 ảnh nhập ở mục Ảnh giao diện khách / quản trị', false),
		'web-quy-trinh' => array('Thiết kế website: Khối Quy trình (đầu khối)', 'Đầu khối quy trình (Tên = tiêu đề, Mô tả = đoạn nhỏ)', false),
		'web-nen-tang' => array('Thiết kế website: Khối Nền tảng (đầu khối)', 'Đầu khối nền tảng (Tên = tiêu đề, Mô tả = đoạn nhỏ)', false),
		'web-form' => array('Thiết kế website: Khối form tư vấn', 'Bên trái form (Tên = tiêu đề, | xuống dòng; Mô tả = đoạn nhỏ). Khách gửi xem ở mục Khách liên hệ', false),
		'wea-hoi-dap-dau' => array('Trang chủ: Câu hỏi thường gặp (đầu khối)', 'Đầu khối Câu hỏi thường gặp (Tên = tiêu đề; Mô tả dòng 1 = câu dẫn, dòng 2 = tiêu đề ô Còn điều muốn hỏi, dòng 3 = lời mời liên hệ; Hình = ảnh minh họa bên trái; các câu hỏi nhập ở mục Trang chủ: Câu hỏi thường gặp bên nhóm Slider)', true),
	);

	foreach($weaKhoiInfo as $nametype => $v){

		$GLOBAL['info'][$nametype]['title_main'] = $v[0];

		$GLOBAL['info'][$nametype]['title'] = $v[1];

		$GLOBAL['info'][$nametype]['full'] = false;

		$GLOBAL['info'][$nametype]['img'] = $v[2];

		$GLOBAL['info'][$nametype]['img-width'] = 1200;

		$GLOBAL['info'][$nametype]['img-height'] = 800;

		$GLOBAL['info'][$nametype]['img-ratio'] = 1;

		$GLOBAL['info'][$nametype]['img-b'] = false;

		$GLOBAL['info'][$nametype]['img-gallery'] = false;

		$GLOBAL['info'][$nametype]['mota'] = true;

		$GLOBAL['info'][$nametype]['mota-ckeditor'] = false;

		$GLOBAL['info'][$nametype]['noidung'] = false;

		$GLOBAL['info'][$nametype]['link'] = false;

		$GLOBAL['info'][$nametype]['seo'] = false;

		$GLOBAL['info'][$nametype]['img_type'] = '.jpg|.png|.jpeg|.JPG|.PNG|.JPEG|.webp';

	}

	// Các danh sách thẻ: array(tên menu, mô tả, có ảnh, có Tên 2, mô tả dùng CKEditor, có link)
	$weaKhoiThe = array(
		'wea-giai-phap' => array('Trang chủ: Hai giải pháp', 'Hai giải pháp (Tên 2 = dòng nhỏ dưới tên, Link tag = chữ của link)', true, true, false, true),
		'wea-gia-tri' => array('Về WEA: 4 điều làm nên WEA', 'Dùng chung cho trang chủ (4 ô khối Về WEA) và trang Giới thiệu. Tên = tên ô, Tên 2 = tiêu đề mục, Mô tả = nội dung ngắn ở trang chủ, Nội dung = phần dài hiện ở trang Giới thiệu (bỏ trống thì dùng Mô tả)', true, true, true, false),
		'wea-van-de-the' => array('Trang chủ: Thẻ vấn đề', '3 thẻ vấn đề đội nhóm', false, false, false, false),
		'wea-nen-tang-tab' => array('Trang chủ: Tab nền tảng', 'Tab nền tảng (Tên = tên tab, Tên 2 = tiêu đề bên phải, Mô tả = đoạn + danh sách tích, Link + Chữ link = nút chính, bỏ trống thì là Tìm hiểu WEA Task)', true, true, true, true),
		'wea-dich-vu-tab' => array('Trang chủ: Tab dịch vụ website', 'Tab dịch vụ website (Tên = tên tab ngắn, Tên 2 = tiêu đề, Mô tả = đoạn + danh sách tích, Hình = ảnh minh họa, bỏ trống thì dùng ảnh chung của khối Dịch vụ, Link = trang xem thêm; tối đa 6 tab, thứ tự icon: doanh nghiệp, bán hàng, đặt phòng, khóa học, AI Support)', true, true, true, true),
		'wea-dich-vu-o' => array('Trang chủ: Ô dịch vụ website', '6 ô dịch vụ website (chỉ hiện khi chưa có Tab dịch vụ website)', false, false, false, false),
		'wea-vi-sao' => array('Trang chủ: Vì sao chọn WEA (4 bài)', '4 bài Vì sao chọn chúng tôi (Tên = tên mục bên trái, Tên 2 = tiêu đề bài, Mô tả = nội dung bài, Hình = ảnh dọc bên phải khoảng 970x1620; đoạn nổi bật dùng khối Trích dẫn)', true, true, true, false),
		'wea-goi' => array('Trang chủ: Bảng giá', 'Bảng giá (Tên 2 = giá tháng|giá năm, vd 59000|53000; để chữ nếu không có giá. Số = 1 là gói nổi bật. Phải khớp giá trong app)', false, true, true, true),
		// Trang Giải pháp WEA Task (/giai-phap-wea-task)
		'wt-slide' => array('Giải pháp WEA Task: Slide đầu trang', 'Ảnh đầu trang, bấm tab bên dưới để đổi ảnh (Hình = ảnh, Tên = mô tả ảnh cho Google, Tên 2 = chữ trên tab, vd Công việc). Cỡ gợi ý rộng 1400px, WebP dưới 200 KB', true, true, false, false),
		'wt-nhip-the' => array('Giải pháp WEA Task: Thẻ nhịp làm việc', '3 thẻ (Tên = vấn đề, Mô tả = giải thích, Tên 2 = dòng giải pháp ở cuối thẻ)', false, true, false, false),
		'wt-ke-hoach-tab' => array('Giải pháp WEA Task: Tab lên kế hoạch', 'Tab (Tên = tên tab, Tên 2 = tiêu đề bên phải, Mô tả = đoạn + danh sách tích, Hình = ảnh bên trái)', true, true, true, false),
		'wt-phoi-hop-the' => array('Giải pháp WEA Task: Thẻ phối hợp', '4 thẻ (Tên, Mô tả, Hình = ảnh minh họa cuối thẻ)', true, false, false, false),
		'wt-ext' => array('Giải pháp WEA Task: Extension', 'Bảng Extension (Tên = tính năng, Mô tả = làm được gì, Tên 2 = giá / seat / tháng bằng số, vd 15000; chưa bán thì ghi Sắp có). Phải khớp giá trong app', false, true, false, false),
		'wt-token' => array('Giải pháp WEA Task: Gói token AI', 'Gói token (Tên = vd 1 triệu token, Tên 2 = giá bằng số, Link tag = hạn dùng vd 30 ngày, Số = 1 là gói Phổ biến). Không có gói nào thì khối không hiện', false, true, false, false),
		'wt-combo-muc' => array('Giải pháp WEA Task: Combo (từng phần)', 'Từng phần của combo (Tên, Mô tả, Tên 2 = giá mua riêng bằng số)', false, true, false, false),
		// Trang Thiết kế website (/thiet-ke-website)
		'web-slide' => array('Thiết kế website: Slide đầu trang', '4 ảnh đầu trang: STT 1 là ảnh lớn, 3 ảnh sau nằm nhỏ bên dưới, bấm vào thì đổi chỗ với ảnh lớn (Hình = ảnh, Tên = mô tả ảnh cho Google). Cỡ gợi ý rộng 1400px, WebP dưới 200 KB', true, false, false, false),
		'web-nang-luc' => array('Thiết kế website: 4 ô năng lực', '4 ô dưới đầu trang (Tên, Mô tả)', false, false, false, false),
		'web-mo-hinh-the' => array('Thiết kế website: Mô hình website', 'Thẻ mô hình (Tên, Mô tả, Tên 2 = các nhãn cách nhau dấu phẩy, Hình = ảnh mẫu bên trái, Link = trang Xem mô hình). Tên cũng là lựa chọn Loại website trong form', true, true, false, true),
		'web-hai-mat-anh' => array('Thiết kế website: Ảnh giao diện khách / quản trị', '2 ảnh (Tên = nhãn trên ảnh, vd Giao diện khách hàng; Hình = ảnh)', true, false, false, false),
		'web-quy-trinh-buoc' => array('Thiết kế website: Bước quy trình', '5 bước (Tên = tên bước, Mô tả = giải thích)', false, false, false, false),
		'web-nen-tang-o' => array('Thiết kế website: Ô nền tảng', '4 ô (Tên, Mô tả)', false, false, false, false),
		'wea-hoi-dap' => array('Trang chủ: Câu hỏi thường gặp', 'Câu hỏi thường gặp (Tên = câu hỏi, Tên 2 = nhóm, vd WEA Task / Thiết kế website / Hỗ trợ chung; Mô tả = câu trả lời, mỗi dòng là một đoạn)', false, true, false, false),
	);

	foreach($weaKhoiThe as $nametype => $v){

		$GLOBAL['photo'][$nametype]['title_main'] = $v[0];

		$GLOBAL['photo'][$nametype]['title'] = $v[1];

		$GLOBAL['photo'][$nametype]['full'] = false;

		$GLOBAL['photo'][$nametype]['img'] = $v[2];

		$GLOBAL['photo'][$nametype]['img-width'] = 1200;

		$GLOBAL['photo'][$nametype]['img-height'] = 800;

		$GLOBAL['photo'][$nametype]['img-ratio'] = 1;

		$GLOBAL['photo'][$nametype]['options'] = false;

		$GLOBAL['photo'][$nametype]['ten2'] = $v[3];

		$GLOBAL['photo'][$nametype]['mota'] = true;

		$GLOBAL['photo'][$nametype]['mota-ckeditor'] = $v[4];

		$GLOBAL['photo'][$nametype]['link'] = $v[5];

		$GLOBAL['photo'][$nametype]['link_tag'] = in_array($nametype, array('wea-giai-phap', 'wea-goi', 'wea-gia-tri', 'wt-token', 'wea-nen-tang-tab', 'wea-dich-vu-tab'));

		$GLOBAL['photo'][$nametype]['number'] = in_array($nametype, array('wea-goi', 'wt-token'));

		$GLOBAL['photo'][$nametype]['img_type'] = '.jpg|.png|.jpeg|.JPG|.PNG|.JPEG|.webp|.gif|.GIF';

	}

	// Hình 4 mục ở trang Giới thiệu: khung ngang, gợi ý cỡ 760x400 (PNG nền trong suốt hoặc WebP)
	$GLOBAL['photo']['wea-gia-tri']['img-width'] = 760;
	$GLOBAL['photo']['wea-gia-tri']['img-height'] = 400;
	// Nội dung riêng của 4 mục ở trang Giới thiệu (cần cột noidung_vi trong table_photo); Mô tả vẫn dùng cho trang chủ
	$GLOBAL['photo']['wea-gia-tri']['noidung'] = true;

	#==================== TRANG TÍNH NĂNG + BLOG WEA ============================

	// Đầu trang Tính năng: "Tên" là H1, "Mô tả" là đoạn giới thiệu
	$nametype='wea-tinh-nang';

	$GLOBAL['info'][$nametype]['title_main'] = 'Tính năng: Đầu trang';

	$GLOBAL['info'][$nametype]['title'] = 'Đầu trang Tính năng (Tên = H1, | xuống dòng; Mô tả = đoạn giới thiệu; Hình = ảnh banner ngang khoảng 1920x560, chủ thể đặt bên phải)';

	$GLOBAL['info'][$nametype]['full'] = false;

	$GLOBAL['info'][$nametype]['img'] = true;

	$GLOBAL['info'][$nametype]['img-width'] = 1920;

	$GLOBAL['info'][$nametype]['img-height'] = 560;

	$GLOBAL['info'][$nametype]['img_type'] = '.jpg|.png|.jpeg|.JPG|.PNG|.JPEG|.webp';

	$GLOBAL['info'][$nametype]['mota'] = true;

	$GLOBAL['info'][$nametype]['mota-ckeditor'] = false;

	$GLOBAL['info'][$nametype]['noidung'] = false;

	$GLOBAL['info'][$nametype]['link'] = false;

	$GLOBAL['info'][$nametype]['seo'] = false;

	// Đầu trang Blog: "Tên" là H1, "Mô tả" là đoạn giới thiệu
	$nametype='wea-blog';

	$GLOBAL['info'][$nametype]['title_main'] = 'Blog: Đầu trang';

	$GLOBAL['info'][$nametype]['title'] = 'Đầu trang Blog (Tên = H1, | xuống dòng; Mô tả = đoạn giới thiệu; Hình = ảnh banner ngang khoảng 1920x400, chủ thể đặt bên phải)';

	$GLOBAL['info'][$nametype]['full'] = false;

	$GLOBAL['info'][$nametype]['img'] = true;

	$GLOBAL['info'][$nametype]['img-width'] = 1920;

	$GLOBAL['info'][$nametype]['img-height'] = 560;

	$GLOBAL['info'][$nametype]['img_type'] = '.jpg|.png|.jpeg|.JPG|.PNG|.JPEG|.webp';

	$GLOBAL['info'][$nametype]['mota'] = true;

	$GLOBAL['info'][$nametype]['mota-ckeditor'] = false;

	$GLOBAL['info'][$nametype]['noidung'] = false;

	$GLOBAL['info'][$nametype]['link'] = false;

	$GLOBAL['info'][$nametype]['seo'] = false;

	// Ảnh nền khối "Khám phá bên trong WEA"
	$nametype='wea-kham-pha';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'Trang chủ: Hình khám phá';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Ảnh nền khối "Khám phá bên trong WEA" (Tên = chữ mô tả ảnh)';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['ten'] = true;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 1250;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 530;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.jpg|.png|.jpeg|.JPG|.PNG|.JPEG|.webp';


	#====================Slider============================

	$nametype='slider';
	
	$GLOBAL['photo'][$nametype]['title_main'] = 'Slider';

	$GLOBAL['photo'][$nametype]['title'] = 'Quản lý slider';

	$GLOBAL['photo'][$nametype]['full'] = false;

	$GLOBAL['photo'][$nametype]['img'] = true;

	$GLOBAL['photo'][$nametype]['img-width'] = 1440;

	$GLOBAL['photo'][$nametype]['img-height'] = 701;

	$GLOBAL['photo'][$nametype]['img-ratio'] = 1;

	$GLOBAL['photo'][$nametype]['options'] = false;

	$GLOBAL['photo'][$nametype]['link'] = true;

	$GLOBAL['photo'][$nametype]['link_tag'] = true;

	$GLOBAL['photo'][$nametype]['ten2'] = true;

	$GLOBAL['photo'][$nametype]['mota'] = true;

	$GLOBAL['photo'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['photo'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	

	#====================Slider============================

	$nametype='introTop';
	
	$GLOBAL['photo'][$nametype]['title_main'] = 'Thông số giới thiệu';

	$GLOBAL['photo'][$nametype]['title'] = 'Thông số giới thiệu';

	$GLOBAL['photo'][$nametype]['full'] = false;

	$GLOBAL['photo'][$nametype]['img'] = true;

	$GLOBAL['photo'][$nametype]['img-width'] = 85;

	$GLOBAL['photo'][$nametype]['img-height'] = 58;

	$GLOBAL['photo'][$nametype]['img-ratio'] = 1;

	$GLOBAL['photo'][$nametype]['options'] = false;

	$GLOBAL['photo'][$nametype]['number'] = false;

	$GLOBAL['photo'][$nametype]['link'] = false;

	$GLOBAL['photo'][$nametype]['mota'] = false;

	$GLOBAL['photo'][$nametype]['mota-ckeditor'] = true;

	$GLOBAL['photo'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';


	#====================mạng xã hội footer============================

	$nametype='mxh-support';

	$GLOBAL['photo'][$nametype]['title_main'] = 'Mạng xã hội';

	$GLOBAL['photo'][$nametype]['title'] = 'Danh sách';

	$GLOBAL['photo'][$nametype]['full'] = false;

	$GLOBAL['photo'][$nametype]['img'] = true;

	$GLOBAL['photo'][$nametype]['img-width'] = 40;

	$GLOBAL['photo'][$nametype]['img-height'] = 40;

	$GLOBAL['photo'][$nametype]['img-ratio'] = 1;

	$GLOBAL['photo'][$nametype]['link'] = true;

	$GLOBAL['photo'][$nametype]['mota'] = false;

	$GLOBAL['photo'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';


	#====================Về chúng tôi footer============================

	$nametype='about_footer';

	$GLOBAL['photo'][$nametype]['title_main'] = 'Về chúng tôi FOOTER';

	$GLOBAL['photo'][$nametype]['title'] = 'Danh sách';

	$GLOBAL['photo'][$nametype]['full'] = false;

	$GLOBAL['photo'][$nametype]['img'] = false;

	$GLOBAL['photo'][$nametype]['img-width'] = 40;

	$GLOBAL['photo'][$nametype]['img-height'] = 40;

	$GLOBAL['photo'][$nametype]['img-ratio'] = 1;

	$GLOBAL['photo'][$nametype]['link'] = true;

	$GLOBAL['photo'][$nametype]['mota'] = false;

	$GLOBAL['photo'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================Sản phẩm FOOTER============================

	$nametype='produce_footer';

	$GLOBAL['photo'][$nametype]['title_main'] = 'Sản phẩm FOOTER';

	$GLOBAL['photo'][$nametype]['title'] = 'Danh sách';

	$GLOBAL['photo'][$nametype]['full'] = false;

	$GLOBAL['photo'][$nametype]['img'] = false;

	$GLOBAL['photo'][$nametype]['img-width'] = 40;

	$GLOBAL['photo'][$nametype]['img-height'] = 40;

	$GLOBAL['photo'][$nametype]['img-ratio'] = 1;

	$GLOBAL['photo'][$nametype]['link'] = true;

	$GLOBAL['photo'][$nametype]['mota'] = false;

	$GLOBAL['photo'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';


	#====================logo============================

	$nametype='logo';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'logo';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý logo';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 107;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 97;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================logo footer============================

	$nametype='logofooter';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'logo footer';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý logo footer';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 107;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 97;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================logo============================

	$nametype='logo-mobile';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'logo mobile';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý logo mobile';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 70;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 40;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================Background thông số============================

	$nametype='bg_intro';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'Background thông số';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý Background thông số';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 1440;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 500;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================Background Blog Tin tức============================

	$nametype='bg_tintuc';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'Background Blog Tin tức';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý Background Blog Tin tức';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 1440;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 500;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================Background sản phẩm============================

	$nametype='bg_sanpham';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'Background sản phẩm';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý Background sản phẩm';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 1440;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 500;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================Background giới thiệu============================

	$nametype='bg_gt';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'Background giới thiệu';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý Background giới thiệu';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 1440;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 500;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================Background Footer============================

	$nametype='bg-footer';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'Background Footer';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý Background Footer';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 1440;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 500;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	
#====================Background quy trình============================

$nametype='bg_quytrinh';

$GLOBAL['bannerqc'][$nametype]['title_main'] = 'Background quy trình';

$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý Background quy trình';

$GLOBAL['bannerqc'][$nametype]['full'] = false;

$GLOBAL['bannerqc'][$nametype]['img'] = true;

$GLOBAL['bannerqc'][$nametype]['img-width'] = 1440;

$GLOBAL['bannerqc'][$nametype]['img-height'] = 500;

$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

$GLOBAL['bannerqc'][$nametype]['link'] = false;

$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================Background Video============================

	$nametype='bg_video';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'Background Video';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý Background Video';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 1440;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 500;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================Background Video============================

	$nametype='bg_album';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'hình ảnh album';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý hình ảnh album';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 1440;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 500;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';
		
	#====================Background breadcrumb============================

	$nametype='bg_breadcrumb';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'background breadcrumb';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý background breadcrumb';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 1440;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 500;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================popup============================

	$nametype='popup';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'popup';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý popup';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['count'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 1440;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 500;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = true;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';
		

	#====================Background footer============================

	$nametype='bg-tintuc';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'Background tin tức';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý Background tin tức';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 1440;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 500;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================hình hạt cà phê============================

	$nametype='ha_slider';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'hình slider';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý hình slider';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 1440;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 500;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	

	#====================bg footer============================

	$nametype='ha-lienhe';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'Hình ảnh liên hệ';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý Hình ảnh liên hệ';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 570;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 300;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================hình đại diện============================

	$nametype='hinhdaidien';

	$GLOBAL['bannerqc'][$nametype]['title_main'] = 'Hình ảnh share link';

	$GLOBAL['bannerqc'][$nametype]['title'] = 'Quản lý Hình ảnh share link';

	$GLOBAL['bannerqc'][$nametype]['full'] = false;

	$GLOBAL['bannerqc'][$nametype]['img'] = true;

	$GLOBAL['bannerqc'][$nametype]['img-width'] = 200;

	$GLOBAL['bannerqc'][$nametype]['img-height'] = 200;

	$GLOBAL['bannerqc'][$nametype]['img-ratio'] = 1;

	$GLOBAL['bannerqc'][$nametype]['link'] = false;

	$GLOBAL['bannerqc'][$nametype]['img_type']='.swf|.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================HotLine============================

	// $nametype = "hotline";
	// $GLOBAL['map'][$nametype]['title_main'] = 'Chi nhánh';
	// $GLOBAL['map'][$nametype]['title'] = 'Quản lý hotline';
	// $GLOBAL['map'][$nametype]['phone'] = true;
	
	
	#====================booking============================

	$nametype='dat-lich';

	$GLOBAL['booking'][$nametype]['title_main'] = 'Đăng ký báo giá';

	$GLOBAL['booking'][$nametype]['title'] = 'Đăng ký báo giá';

	$GLOBAL['booking'][$nametype]['full'] = false;

	$GLOBAL['booking'][$nametype]['img'] = true;

	$GLOBAL['booking'][$nametype]['img-width'] = 380;

	$GLOBAL['booking'][$nametype]['img-height'] = 260;

	$GLOBAL['booking'][$nametype]['img-ratio'] = 1;

	$GLOBAL['booking'][$nametype]['phone'] = true;

	$GLOBAL['booking'][$nametype]['email'] = false;

	$GLOBAL['booking'][$nametype]['dichvu'] = false;

	$GLOBAL['booking'][$nametype]['diachi'] = false;

	$GLOBAL['booking'][$nametype]['noidung'] = false;

	$GLOBAL['booking'][$nametype]['seo'] = false;

	$GLOBAL['booking'][$nametype]['img_type']='.doc|.docx|.pdf|.rar|.zip|.ppt|.pptx|.DOC|.DOCX|.PDF|.RAR|.ZIP|.PPT|.PPTX|.xls|.jpg|.png|.gif|.JPG|.PNG|.GIF';

	#====================booking============================

	$nametype='client';

	$GLOBAL['booking'][$nametype]['title_main'] = 'Đăng ký nhận tin';

	$GLOBAL['booking'][$nametype]['title'] = 'Đăng ký nhận tin';

	$GLOBAL['booking'][$nametype]['full'] = false;

	$GLOBAL['booking'][$nametype]['img'] = true;

	$GLOBAL['booking'][$nametype]['img-width'] = 380;

	$GLOBAL['booking'][$nametype]['img-height'] = 260;

	$GLOBAL['booking'][$nametype]['img-ratio'] = 1;

	$GLOBAL['booking'][$nametype]['phone'] = false;

	$GLOBAL['booking'][$nametype]['email'] = true;

	$GLOBAL['booking'][$nametype]['dichvu'] = false;

	$GLOBAL['booking'][$nametype]['diachi'] = false;

	$GLOBAL['booking'][$nametype]['noidung'] = false;

	$GLOBAL['booking'][$nametype]['seo'] = false;

	$GLOBAL['booking'][$nametype]['img_type']='.doc|.docx|.pdf|.rar|.zip|.ppt|.pptx|.DOC|.DOCX|.PDF|.RAR|.ZIP|.PPT|.PPTX|.xls|.jpg|.png|.gif|.JPG|.PNG|.GIF';

	#====================booking============================

	$nametype='goi-lai';

	$GLOBAL['booking'][$nametype]['title_main'] = 'Yêu cầu gọi lại';

	$GLOBAL['booking'][$nametype]['title'] = 'Yêu cầu gọi lại';

	$GLOBAL['booking'][$nametype]['full'] = false;

	$GLOBAL['booking'][$nametype]['img'] = true;

	$GLOBAL['booking'][$nametype]['img-width'] = 380;

	$GLOBAL['booking'][$nametype]['img-height'] = 260;

	$GLOBAL['booking'][$nametype]['img-ratio'] = 1;

	$GLOBAL['booking'][$nametype]['phone'] = true;

	$GLOBAL['booking'][$nametype]['email'] = false;

	$GLOBAL['booking'][$nametype]['dichvu'] = false;

	$GLOBAL['booking'][$nametype]['diachi'] = false;

	$GLOBAL['booking'][$nametype]['noidung'] = false;

	$GLOBAL['booking'][$nametype]['seo'] = false;

	$GLOBAL['booking'][$nametype]['img_type']='.doc|.docx|.pdf|.rar|.zip|.ppt|.pptx|.DOC|.DOCX|.PDF|.RAR|.ZIP|.PPT|.PPTX|.xls|.jpg|.png|.gif|.JPG|.PNG|.GIF';

	#====================footer============================

	$nametype='footer';

	$GLOBAL['company'][$nametype]['title_main'] = 'footer';

	$GLOBAL['company'][$nametype]['title'] = 'Quản lý footer';

	$GLOBAL['company'][$nametype]['full'] = false;

	$GLOBAL['company'][$nametype]['upload'] = false;

	$GLOBAL['company'][$nametype]['img'] = false;

	$GLOBAL['company'][$nametype]['img-width'] = 380;

	$GLOBAL['company'][$nametype]['img-height'] = 260;

	$GLOBAL['company'][$nametype]['img-ratio'] = 1;

	$GLOBAL['company'][$nametype]['link'] = true;

	$GLOBAL['company'][$nametype]['mota'] = true;

	$GLOBAL['company'][$nametype]['mota-ckeditor'] = true;	

	$GLOBAL['company'][$nametype]['noidung'] = false;

	$GLOBAL['company'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['company'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';


	#====================footer============================

	$nametype='video';

	$GLOBAL['video'][$nametype]['title_main'] = 'video';

	$GLOBAL['video'][$nametype]['title'] = 'Quản lý video';

	$GLOBAL['video'][$nametype]['full'] = false;

	$GLOBAL['video'][$nametype]['upload'] = false;

	$GLOBAL['video'][$nametype]['img'] = false;

	$GLOBAL['video'][$nametype]['img-width'] = 380;

	$GLOBAL['video'][$nametype]['img-height'] = 260;

	$GLOBAL['video'][$nametype]['img-ratio'] = 1;

	$GLOBAL['video'][$nametype]['ten2'] = true;

	$GLOBAL['video'][$nametype]['link'] = true;

	$GLOBAL['video'][$nametype]['link1'] = true;

	$GLOBAL['video'][$nametype]['link2'] = true;

	$GLOBAL['video'][$nametype]['mota'] = true;

	$GLOBAL['video'][$nametype]['mota-ckeditor'] = true;	

	$GLOBAL['video'][$nametype]['upload'] = true;

	$GLOBAL['video'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================footer============================

	$nametype='support';

	$GLOBAL['company'][$nametype]['title_main'] = 'Hỗ trợ';

	$GLOBAL['company'][$nametype]['title'] = 'Quản lý Hỗ trợ';

	$GLOBAL['company'][$nametype]['full'] = false;

	$GLOBAL['company'][$nametype]['upload'] = false;

	$GLOBAL['company'][$nametype]['img'] = false;

	$GLOBAL['company'][$nametype]['img-width'] = 380;

	$GLOBAL['company'][$nametype]['img-height'] = 260;

	$GLOBAL['company'][$nametype]['img-ratio'] = 1;

	$GLOBAL['company'][$nametype]['link'] = true;

	$GLOBAL['company'][$nametype]['mota'] = true;

	$GLOBAL['company'][$nametype]['mota-ckeditor'] = true;	

	$GLOBAL['company'][$nametype]['noidung'] = false;

	$GLOBAL['company'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['company'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	

	#====================company============================

	$nametype='lien-he';

	$GLOBAL['company'][$nametype]['title_main'] = 'liên hệ';

	$GLOBAL['company'][$nametype]['title'] = 'Quản lý liên hệ';

	$GLOBAL['company'][$nametype]['full'] = false;

	$GLOBAL['company'][$nametype]['upload'] = false;

	$GLOBAL['company'][$nametype]['img'] = true;

	$GLOBAL['company'][$nametype]['img-width'] = 380;

	$GLOBAL['company'][$nametype]['img-height'] = 260;

	$GLOBAL['company'][$nametype]['img-ratio'] = 1;

	$GLOBAL['company'][$nametype]['link'] = true;

	$GLOBAL['company'][$nametype]['mota'] = false;

	$GLOBAL['company'][$nametype]['mota-ckeditor'] = true;	

	$GLOBAL['company'][$nametype]['noidung'] = true;

	$GLOBAL['company'][$nametype]['noidung-ckeditor'] = true;

	$GLOBAL['company'][$nametype]['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';

	#====================setting============================

	$GLOBAL['setting']['tieude']=true;

	$GLOBAL['setting']['diachi']=true;

	$GLOBAL['setting']['chaychu1']=false;

	$GLOBAL['setting']['chaychu2']=false;

	$GLOBAL['setting']['slogan']=false;

	$GLOBAL['setting']['mota']=false;

	$GLOBAL['setting']['mota-ckeditor']=false;

	$GLOBAL['setting']['timework']=false;

	$GLOBAL['setting']['time']=false;

	$GLOBAL['setting']['email']=true;

	$GLOBAL['setting']['hotline_advance']=true;

	$GLOBAL['setting']['hotline']=true;

	$GLOBAL['setting']['dienthoai']=true;

	$GLOBAL['setting']['page_in']=false;

	$GLOBAL['setting']['page_ne']=true;

	$GLOBAL['setting']['page_sp']=true;

	$GLOBAL['setting']['page_baogia']=false;

	$GLOBAL['setting']['page_dichvu']=false;

	$GLOBAL['setting']['page_bookroom']=false;

	$GLOBAL['setting']['page_album']=false;

	$GLOBAL['setting']['postalcode']=true;

	$GLOBAL['setting']['tax_code']=false;

	$GLOBAL['setting']['blank']=false;

	$GLOBAL['setting']['denominator']=false;

	$GLOBAL['setting']['symbol']=false;

	$GLOBAL['setting']['code']=false;

	$GLOBAL['setting']['city']=true;

	$GLOBAL['setting']['district']=true;

	$GLOBAL['setting']['message']=true;

	$GLOBAL['setting']['counter']=false;

	$GLOBAL['setting']['zalo']=true;

	$GLOBAL['setting']['website']=true;

	$GLOBAL['setting']['laisuat']=false;

	$GLOBAL['setting']['phivanchuyen']=false;

	$GLOBAL['setting']['toado']=true;

	$GLOBAL['setting']['seo']=true;

	$GLOBAL['setting']['iframe']=true;

	$GLOBAL['setting']['iframe1']=true;

	$GLOBAL['setting']['fanpage']=true;

	$GLOBAL['setting']['copyright']=false;

	$GLOBAL['setting']['faceid']=true;

	$GLOBAL['setting']['toc']=true;

	$GLOBAL['setting']['block']=false;

	$GLOBAL['setting']['slider']=true;

	$GLOBAL['setting']['checkvideo']=true;

	$GLOBAL['setting']['videofile']=true;

	$GLOBAL['setting']['youtube']=false;

	$GLOBAL['setting']['instagram']=false;

	$GLOBAL['setting']['pinterest']=false;

	$GLOBAL['setting']['slide']=true;

	$GLOBAL['setting']['nonecopy']=true;

	$GLOBAL['setting']['background']=true;

	$GLOBAL['setting']['tag']=false;

	$GLOBAL['setting']['watermark']=true;

	$GLOBAL['setting']['changedola']=true;

	$GLOBAL['setting']['slider_video']=false;

	$GLOBAL['setting']['img_type']='.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF|.webp';


	#==================== ẨN MỤC KHÔNG DÙNG TRONG ADMIN ============================
	// Web WEA không bán hàng, chỉ có Trang chủ / Tin tức / Giới thiệu nên ẩn bớt cho gọn.
	// Chỉ ẩn khỏi admin, không xóa code hay dữ liệu. Muốn hiện lại: xóa tên mục khỏi danh sách dưới.

	// Bật lại khối "Quản lý đặt hàng" (đơn hàng, giao hàng, thanh toán) thì đổi thành true
	$GLOBAL_BANHANG = false;

	// Bật lại mục "Đăng ký nhận tin" thì đổi thành true
	$GLOBAL_NHANTIN = false;

	$anKhoiAdmin = array(

		'baiviet' => array('htgh','pttt','san-pham','banner_index','quy-trinh','album','tac-gia'),

		'info' => array('ho-so-nang-luc','wea-ly-do','wea-sang-lap'), // wea-*: khối của thiết kế trang chủ cũ

		'photo' => array('slider','introTop','mxh-support','about_footer','produce_footer','wea-bieu-do','wea-buoc','wea-cam-ket','wea-bang-gia','wea-ly-do-muc','wea-dich-vu-o'), // wea-dich-vu-o: đã thay bằng Tab dịch vụ website

		'bannerqc' => array('logofooter','logo-mobile','bg_intro','bg_tintuc','bg_sanpham','bg_gt','bg-footer','bg_quytrinh','bg_video','bg_album','popup','bg-tintuc','ha_slider','ha-lienhe','wea-kham-pha'),

		'booking' => array('dat-lich','client','goi-lai'),

		'company' => array('footer','support'),

		'video' => array('video'),

		'seopage' => array('san-pham','album'),

	);

	foreach ($anKhoiAdmin as $nhom => $dsLoai) {
		foreach ($dsLoai as $loai) {
			if($nhom == 'seopage') unset($setting['seopage']['page'][$loai]);
			else unset($GLOBAL[$nhom][$loai]);
		}
	}

	foreach ($GLOBAL['baiviet'] as $key => $value) {
		if($value['public']){
			array_push($PUBLIC,$key);
		}else{
			array_push($PRIVATE,$key);
		}
	}
?>
