<?php
/**
 * Theme functions and definitions
 *
 * @package solar_renewable_energy
 */

if ( ! function_exists( 'solar_renewable_energy_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function solar_renewable_energy_enqueue_styles() {
		wp_enqueue_style( 'organic-farm-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'solar-renewable-energy-style', get_stylesheet_directory_uri() . '/style.css', array( 'organic-farm-style-parent' ), '1.0.0' );
		// Theme Customize CSS.
		require get_parent_theme_file_path( 'inc/extra_customization.php' );
		wp_add_inline_style( 'solar-renewable-energy-style',$organic_farm_custom_style );
	}
endif;
add_action( 'wp_enqueue_scripts', 'solar_renewable_energy_enqueue_styles', 99 );

function solar_renewable_energy_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'solar-renewable-energy-featured-image', 2000, 1200, true );
	add_image_size( 'solar-renewable-energy-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'solar-renewable-energy' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, and column width.
	*/
	add_editor_style( array( 'assets/css/editor-style.css', organic_farm_fonts_url() ) );
}
add_action( 'after_setup_theme', 'solar_renewable_energy_setup' );

function solar_renewable_energy_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'solar-renewable-energy' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'solar-renewable-energy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'solar-renewable-energy' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'solar-renewable-energy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'solar-renewable-energy' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'solar-renewable-energy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'solar-renewable-energy' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'solar-renewable-energy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'solar-renewable-energy' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'solar-renewable-energy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'solar-renewable-energy' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'solar-renewable-energy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Product Category Dropdown', 'solar-renewable-energy' ),
		'id'            => 'product-cat',
		'description'   => __( 'Add widgets here to appear in your header.', 'solar-renewable-energy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'solar_renewable_energy_widgets_init' );

function solar_renewable_energy_customize_register() {
  	global $wp_customize;
	$wp_customize->remove_section( 'organic_farm_pro' );
	$wp_customize->remove_section( 'organic_farm_product_box_section' );
}
add_action( 'customize_register', 'solar_renewable_energy_customize_register', 11 );


function solar_renewable_energy_customize( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_stylesheet_directory_uri() ). '/assets/css/customizer.css');

	$wp_customize->add_section('solar_renewable_energy_pro', array(
		'title'    => __('UPGRADE SOLAR ENERGY PREMIUM', 'solar-renewable-energy'),
		'priority' => 1,
	));

	$wp_customize->add_setting('solar_renewable_energy_pro', array(
		'default'           => null,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control(new Solar_Renewable_Energy_Pro_Control($wp_customize, 'solar_renewable_energy_pro', array(
		'label'    => __('SOLAR ENERGY PREMIUM', 'solar-renewable-energy'),
		'section'  => 'solar_renewable_energy_pro',
		'settings' => 'solar_renewable_energy_pro',
		'priority' => 1,
	)));

	//Category Section
	$wp_customize->add_section('solar_renewable_energy_category_section',array(
		'title'	=> __('Category Section','solar-renewable-energy'),
		'description'=> __('This section will appear below the category.','solar-renewable-energy'),
	));

    $wp_customize->add_setting('solar_renewable_energy_grocery_cate_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('solar_renewable_energy_grocery_cate_title',array(
		'label'	=> __('Section Title','solar-renewable-energy'),
		'section' => 'solar_renewable_energy_category_section',
		'type' => 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('solar_renewable_energy_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'organic_farm_sanitize_choices',
	));
	$wp_customize->add_control('solar_renewable_energy_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','solar-renewable-energy'),
		'section' => 'solar_renewable_energy_category_section',
	));
}
add_action( 'customize_register', 'solar_renewable_energy_customize' );

function solar_renewable_energy_enqueue_comments_reply() {
  if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
    // Load comment-reply.js (into footer)
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
  }
}
add_action(  'wp_enqueue_scripts', 'solar_renewable_energy_enqueue_comments_reply' );

if ( ! defined( 'ORGANIC_FARM_PRO_LINK' ) ) {
	define('ORGANIC_FARM_PRO_LINK',__('https://www.ovationthemes.com/wordpress/solar-wordpress-theme/','solar-renewable-energy'));
}
if ( ! defined( 'ORGANIC_FARM_SUPPORT' ) ) {
	define('ORGANIC_FARM_SUPPORT',__('https://wordpress.org/support/theme/solar-renewable-energy','solar-renewable-energy'));
}
if ( ! defined( 'ORGANIC_FARM_REVIEW' ) ) {
	define('ORGANIC_FARM_REVIEW',__('https://wordpress.org/support/theme/solar-renewable-energy/reviews/#new-post','solar-renewable-energy'));
}
if ( ! defined( 'ORGANIC_FARM_LIVE_DEMO' ) ) {
define('ORGANIC_FARM_LIVE_DEMO',__('https://www.ovationthemes.com/demos/solar-renewable-energy/','solar-renewable-energy'));
}
if ( ! defined( 'ORGANIC_FARM_BUY_PRO' ) ) {
define('ORGANIC_FARM_BUY_PRO',__('https://www.ovationthemes.com/wordpress/solar-wordpress-theme/','solar-renewable-energy'));
}
if ( ! defined( 'ORGANIC_FARM_PRO_DOC' ) ) {
define('ORGANIC_FARM_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-solar-renewable-energy-pro-doc/','solar-renewable-energy'));
}
if ( ! defined( 'ORGANIC_FARM_THEME_NAME' ) ) {
define('ORGANIC_FARM_THEME_NAME',__('Premium Solar Theme','solar-renewable-energy'));
}

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Solar_Renewable_Energy_Pro_Control')):
    class Solar_Renewable_Energy_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
            <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( ORGANIC_FARM_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE SOLAR ENERGY PREMIUM','solar-renewable-energy');?> </a>
            </div>
            <div class="col-md">
                <img class="solar_renewable_energy_img_responsive " src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
            </div>
            <div class="col-md">
                <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('SOLAR ENERGY PREMIUM - Features', 'solar-renewable-energy'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'solar-renewable-energy');?> </li>
                    <li class="upsell-solar_renewable_energy"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'solar-renewable-energy');?> </li>
                </ul>
            </div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( ORGANIC_FARM_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE SOLAR ENERGY PREMIUM','solar-renewable-energy');?> </a>
            </div>
        </label>
    <?php } }
endif;
