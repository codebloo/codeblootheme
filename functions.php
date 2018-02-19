<?php

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Global Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

add_theme_support('post-thumbnails');
add_image_size( 'slides', 940, 480, true ); // 940 pixels wide by 480 pixels tall, hard crop mode
add_post_type_support( 'page', 'excerpt' );


/*-----------------------------------------------------------------------------------*/
/* Equeue JS
/*-----------------------------------------------------------------------------------*/

function js_scripts_load_cdn()
{
	// Register the script like this for a theme:
	wp_register_script( 'slick', '//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js', array( 'jquery' ) );
	wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ) );
	// Go to FONT AWESOME.com and get a link for icons then uncommentbelow
	// wp_register_script( 'fontawesome', 'LINKHERE', array( 'jquery' ) );

	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'slick' );
	// wp_enqueue_script( 'fontawesome' );
	wp_enqueue_script( 'custom' );
}
add_action( 'wp_enqueue_scripts', 'js_scripts_load_cdn' );

/*-----------------------------------------------------------------------------------*/
/* Equeue CCS
/*-----------------------------------------------------------------------------------*/

function css_styles()
{

	// Register the style like this for a theme:
	wp_register_style( 'skeleton', get_template_directory_uri() . '/css/skeleton.css', array(), '20140104', 'all' );
	wp_register_style( 'base', get_template_directory_uri() . '/css/base.css', array(), '20140104', 'all' );
	wp_register_style( 'opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300', array(), '20160101', 'all' );
	wp_register_style( 'lato', 'https://fonts.googleapis.com/css?family=Lato', array(), '20160101', 'all' );
	wp_register_style( 'slick', '//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css', array(), '20160101', 'all' );
	wp_register_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.css', array(), '20160101', 'all' );
	wp_register_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), '20140104', 'all' );
	wp_register_style( 'wp', get_template_directory_uri() . '/css/wp.css', array(), '20160101', 'all' );

	// For either a plugin or a theme, you can then enqueue the style:
	wp_enqueue_style( 'skeleton' );
	wp_enqueue_style( 'base' );
	wp_enqueue_style( 'opensans' );
	wp_enqueue_style( 'lato' );
	wp_enqueue_style( 'slick' );
	wp_enqueue_style( 'slick-theme' );
	wp_enqueue_style( 'custom' );
	wp_enqueue_style( 'wp' );
}
add_action( 'wp_enqueue_scripts', 'css_styles' );

/*-----------------------------------------------------------------------------------*/
/* Sidebars
/*-----------------------------------------------------------------------------------*/

if ( function_exists('register_sidebar') ) {


			register_sidebar(array('name'=>'Default',
					'id'=>'Default',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h4>',
					'after_title' => '</h4>',
				));
				
			register_sidebar(array('name'=>'Footer',
					'id'=>'Footer',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h2>',
					'after_title' => '</h2>',
				));	
				
			register_sidebar(array('name'=>'Contact',
					'id'=>'Contact',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h4>',
					'after_title' => '</h4>',
				));	
				
			register_sidebar(array('name'=>'Blog',
					'id'=>'Blog',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h4>',
					'after_title' => '</h4>',
				));	

}

class ThemeSidebar {

	public function __construct() {
		add_action( 'admin_init', array($this, 'sidebarMetaBox'));
		add_action( 'save_post', array($this, 'saveSidebar'));
	}
	
	public function sidebarMetaBox() {
		add_meta_box("sidebar-meta", "Sidebar", array(&$this, 'sidebarMetaOptions'), "post", "side", "low");
		add_meta_box("sidebar-meta", "Sidebar", array(&$this, 'sidebarMetaOptions'), "page", "side", "low");
	}

	
	
	public function sidebarMetaOptions() {
		global $post;
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
		$custom = get_post_custom($post->ID);
		$sidebar = $custom["sidebar"][0];
?>
    	<label>Sidebar:</label>
    	<select name="sidebar">
    <option value="Default" selected="selected">Default</option>
	<option value="Blog"<?php if($sidebar == 'Blog'): echo ' selected="selected"'; endif;?>>Blog</option>
	<option value="Contact"<?php if($sidebar == 'Contact'): echo ' selected="selected"'; endif;?>>Contact</option>
	</select>
    <?php
	}
	
	public function saveSidebar(){
		global $post;

		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
			return $post_id;
		}else{
			update_post_meta($post->ID, 'sidebar', $_POST["sidebar"]);
		}
	}



}

$sidebar = new ThemeSidebar();


?>
