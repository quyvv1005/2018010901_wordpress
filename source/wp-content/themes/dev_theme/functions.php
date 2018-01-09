<?php 
/**
@ Thiết lập các hằng dữ liệu quan trọng 
@ THEME_URL = get_stylesheet_directory() - đường dẫn tới thư mục theme 
@ CORE = thư mục / core của theme, chứa các file nguồn quan trọng. 
**/
define('THEME_URL', get_stylesheet_directory());
define('THEME_URI', get_template_directory_uri());
define('THEME_PATH', dirname(__FILE__));
define('CORE', THEME_URL . '/core/');
define('LIB_PATH', THEME_URL . '/libs/');
define('WIDGET_PATH', LIB_PATH . 'widgets/');

/* Load core */
require_once (CORE . 'theme_option.php');
require_once (CORE . 'assets.php');
require_once (CORE . 'shortcodes.php');
require_once (CORE . 'custom-post-type.php');

/* widgets */


/**
@ Load file /core/init.php 
@ đây là file cấu hình ban đầu của theme mà sẽ không nên được thay đổi sau này. 
**/
require_once(CORE . '/init.php');

/*
@ thiết lập $content_width để khai báo kich thước chiều rộng của nội dung 
*/
if (!isset($content_width)) {
	/*
	* Neu bien $content_width chua co du lieu thi gan gia tri cho no 
	*/
	$content_width = 620;
}

/**
@ Thiet lap cac chuc nang se duoc theme ho tro 
*/
if (! function_exists('theme_setup')) {
	function theme_setup() {
		
		/* Load language */
		$language_folder = THEME_URL . '/languages';
		load_theme_textdomain('whq', $language_folder);

		/*auto add RSS Feed link in <head> */
		add_theme_support('automatic-feed-links');

		/* add post thumbnail */
		add_theme_support('post-thumbnails');

		/* auto add title-tag to title of page */
		add_theme_support('title-tag');

		/* add post format */
		add_theme_support('post-formats', array('image', 'video', 'link'));

		/* Custom background */
		$default_background = array (
			'default-color' => '#e8e8e8',
		);
		add_theme_support('custom-background', $default_background);

		/* Menu location */
		register_nav_menu('primary-menu', __('Primary Menu', 'whq'));
	}

	add_action ('init', 'theme_setup');
}


/* create sidebar for theme */
$sidebar = array(
	'name' => __('Main Sidebar', 'whq'),
	'id' => 'main-sidebar',
	'description' => 'Main sidebar for devtheme theme',
	'class' => 'main-sidebar',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>'    
);
register_sidebar($sidebar);

/* thiet lap ham hien thi logo */
if (!function_exists('theme_logo')) {
	function theme_logo() { 
		$logo_image = of_get_option('logo_image', '');
	?>
	<div class="logo-wapper">
		<?php if(strlen($logo_image) > 0): ?>
			<a href="<?php echo get_bloginfo('url'); ?>"><img src="<?php echo $logo_image; ?>" alt="<?php echo get_bloginfo('sitename'); ?>"></a>
		<?php else: ?>
			<div class="site-name">
				<?php if (is_home()): ?>
					<?php printf('<h1><a href="%1$s" title="%2$s">%3$s</a></h1>', get_bloginfo('url'), get_bloginfo('description'), get_bloginfo('sitename')); ?>
				<?php else: ?>
					<?php printf('<p><a href="%1$s" title="%2$s">%3$s</a></p>', get_bloginfo('url'), get_bloginfo('description'), get_bloginfo('sitename')); ?>
				<?php endif; ?>
			</div>
			<div class="site-description"><?php bloginfo('description'); ?></div>
		<?php endif; ?>
	</div>
	<?php }
}

/* block  comment */
if(!function_exists('theme_toolbar')) {
	function theme_toolbar() {
		$social_fb = of_get_option('social_fb', '');
		$social_tw = of_get_option('social_tw','');
		$social_rss = of_get_option('social_rss','');

		$st_email = of_get_option('st_email','');
		$st_phone = of_get_option('st_phone', '');
		?>
		<div class="container">
			<div class="row">
				<div class="toolbar-left">
					<?php 
					if (is_active_sidebar('toolbar-left')) {
						dynamic_sidebar('toolbar-left');
					}
					?>
				</div>
				<div class="toolbar-right">
					<?php if(strlen($social_fb) > 0 || strlen($social_tw) > 0 || strlen($social_rss) > 0) : ?>
						<ul class="nav">
							<?php if (strlen($social_fb) > 0): ?>
								<li><a href="<?php echo ($social_fb); ?>" target="_blank"><i class="fa facebook" aria-hidden="true"></i></a></li>
							<?php endif; ?>
							<?php if (strlen($social_fb) > 0): ?>
								<li><a href="<?php echo ($social_tw); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<?php endif; ?>
							<?php if (strlen($social_fb) > 0): ?>
								<li><a href="<?php echo ($social_rss); ?>" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
							<?php endif; ?>
						<?php endif; ?>
						<?php if(strlen($st_email) > 0 || strlen($st_phone) > 0): ?>
							<?php if(strlen($st_email) > 0): ?>
								<li><a href="mailto:<?php echo ($st_email); ?>"><i class="fa fa-envenlope-o" aria-hidden="true"></i><span class="email-text"><?php echo ($st_email); ?></span>
								</li>
							<?php endif; ?>
							<?php if(strlen($st_phone) > 0): ?>
								<li><a href="mailto:<?php echo ($st_phone); ?>"><i class="fa fa-phone" aria-hidden="true"></i><span class="phone-number"><?php echo ($st_phone); ?></span>
								</li>
							<?php endif; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php }
}
/* thiet lap ham menu */
if(! function_exists('theme_menu')) {
	function theme_menu($slug) {
		$menu = array(
			'theme_location' => $slug,
			'container' => 'nav',
			'conatiner_class' => $slug,
		);
		wp_nav_menu($menu);
	}
}

/* tao ham phan trang cho index, archive.
@ ham nay se hien thi lien ket phan trang theo dang chu:Newer Posts & Older Posts
@ theme_pagination()
*/
if(!function_exists('theme_pagination')) {
	function theme_pagination() {
		/* khong hien thi phan trang neu trang do co it hon 2 trang */
		if($GLOBALS['wp_query']->max_num_pages < 2) {
			return '';
		}
		?>
		<nav class="pagination" role="navigation">
			<?php if (get_next_post_link()): ?>
				<div class="prev"><?php next_posts_link(__('Older Posts', 'whq')); ?></div>
			<?php endif; ?>
			<?php if(get_preview_post_link()): ?>
				<div class="next"><?php previous_post_link(__('Newer Posts', 'whq')); ?></div>
			<?php endif; ?>
			</nav> <?php 
		}
	}

/* ham hien thi anh thumbnail cua post 
@ anh thumbnail se khong duoc hien thi trong trang single
@ nhung se hien thi trong single neu post do co format la image
@ theme_thumbnail($size)
*/
if(!function_exists('theme_thumbnail')) {
	function theme_thumbnail($size) {
		//chi hien thi thumbnail voi post khong co mat khau
		if (! is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')): ?>
		<figure class="post-thumbnails">
			<?php the_post_thumbnail($size); ?>
			</figure> <?php
		endif;
	}
}

/* 
Ham hien thi tieu de cua post trong .entry-header
@Tieu de cua post se la nam trong the <h1> o trang single
@ con o trang chu va trang luu tru, no se la the <h2>
@ theme_entry_header()
*/
if (!function_exists('theme_entry_header')) {
	function theme_entry_header() {
		if(is_single()): ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h1>
	<?php else: ?>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h2><?php
		endif;
	}
}

/* ham hien thi thong tin cua post */
if(!function_exists('theme_entry_meta')) {
	function theme_entry_meta() {
		if(! is_page()) :
			echo '<div class="entry-meta">';
				//Hien thi ten tac gia, ten category and ngay thang dang bai
				printf(__('<span class="autor">Posted by %1$s</span>','whq'), get_the_author());
				//printf(__('<span class="date-published"> at %1$s</span>','whq'), get_the_date());
				printf(__('<span class="category"> in %1$s</span>','whq'), get_the_category_list(','));

				//Hien thi so dem luot binh luan
				if(comments_open()):
					echo '<span class="meta-reply">';
						comments_popup_link(
							__('Leave a comment', 'whq'),
							__('One comment', 'whq'),
							__('% comments','whq'),
							__('Read all comments', 'whq')
						);
					echo "</span>";
				endif;
			echo '</div>';
		endif;
	}
}

/*
change the length of the excerpt */
function new_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

/* them chu read more vao excerpt */
function theme_readmore() {
	//return '...<a class="read-more" href="'. get_permalink(get_the_ID()) .'">' .__('Read More', 'whq').'</a>';
	return '...';
}
add_filter('excerpt_more', 'theme_readmore');

/* ham hien thi noi dung cua post type 
@ ham nay se hien thi doanj= rut gon cua post ngoai trang chu (the_excerpt)
@ Nhung no se hien thi toan bo noi dung cua post o trang single (the_content)
@ theme_entry_content()
*/
if (!function_exists('theme_entry_content')) {
	function theme_entry_content() {
		if(!is_single()):
			the_excerpt();
		else:
			the_content();
			/* code hien thi phan trang trong post type */
			$link_pages = array(
				'before' => __('<p>Page:', 'whq'),
				'after' => '</p>',
				'nextpagelink' => __('Next page', 'whq'),
				'previouspagelink' => __('Previous page', 'whq') 
			);
			wp_link_pages($link_pages);
		endif;
	}
}

/* ham hien thi tag cua post */
if(!function_exists('theme_entry_tag')) {
	function theme_entry_tag() {
		if(has_tag()) :
			echo '<div class="entry-tag">';
			printf(__('Tagged in %1$s', 'whq'), get_the_tag_list('',','));
			echo '</div>';
		endif;
	}
}

/* check if woocommerce plugin is activeted */
if (!function_exists('is_woocommerce_activated')) {
	function is_woocommerce_activated() {
		if(class_exists('woocommerce')) {
			return true;
		} else {
			return false;
		}
	}
}

/* Get banner for shop page (the shop index page)
@ return image url
*/
function get_shop_banner_top() {
	return of_get_option('shop_baaner_top',"");
}

/*
Re-oder for the comment form
default order: comment, name, email, website
re-order:name, email, websige, comment 
*/
function theme_move_comment_field_to_bottom($fields) {
	$comment_field = $field['comment'];
	unset($fields['comment']);
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter('comment_form_field', 'alvatheme_move_comment_field_to_bottom');


/* force sub-categories to use the parent category template
return Array Template information
*/
function new_subcategory_hierachy() {
	$category = get_queried_object();
	$parent_id = $category-> category_parent;
	$templates = array();

	if($parent_id == 0) {
		//use default values from get_category_template()
		$templates[] = "category-{$category->slug}.php";
		$templates[] = "category-{$category->term_id}.php";
		$templates[] = 'category.php';
	} else {
		//Create replacement $templates array
		$parent = get_category($parent_id);

		//current first 
		$templates[] = "category-{$category->slug}.php";
		$templates[] = "category-{$category->term_id}.php";

		//parent second
		$templates[] = "category-{$parent->slug}.php";
		$templates[] = "category-{$parent->term_id}.php";
		$templates[] = 'category.php';
	}
	return locate_template($templates);
}
add_filter('category_template', 'new_subcategory_hierachy');
/*
@ chen Css va Javascript vao theme
@ su dung hook wp_enqueue_scripts() de hien thi no ra ngoai front-end
*/
function theme_styles() {
	/*
	Ham get_stylesheet_uri() se tra ve gia tri dan den file style.css cua theme
	Neu su dung child theme, thi file style.css nay van load ra the theme me
	*/
	wp_register_style('main-style', get_template_directory_uri() . '/style.css', 'all');
	wp_enqueue_style('main-style');
}

add_action('wp_enqueue_scripts','theme_styles');
?>