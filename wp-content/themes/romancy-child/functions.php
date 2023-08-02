<?php
/**
 * Setup romancy Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function romancy_child_theme_setup() {
	load_child_theme_textdomain( 'romancy-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'romancy_child_theme_setup' );


add_action( 'wp_enqueue_scripts', 'romancy_enqueue_styles' );
function romancy_enqueue_styles() {
    $parenthandle = 'romancy-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

//REGISTERING ROOMS CUSTOM POST TYPE IN WORDPRESS
function custom_post_type_creation(){
	$args = array(
	'labels' => array(
		'name' => 'Room',
		'singular_name' => 'Room'
 	),
		'public' => true,
		'has_archive' => true,
        'menu_icon' => 'dashicons-admin-home',
        'supports' => array('thumbnail','title','editor')
	);
		register_post_type('rooms',$args);
}

add_action('init','custom_post_type_creation');


//CREATING LOOPS FOR ROOMS IN HOME PAGE
add_shortcode('rooms-loop-code','create_custom_room_loop');

function create_custom_room_loop(){
	$args = array(
    	'post_type'=>'rooms',
        'posts_per_page' => -1,
    );
    $posts = new WP_Query($args);
    if($posts -> have_posts())
    {
    ?>
    	<div class="swiper">
        	<div class="swiper-wrapper">
                	<?php
                    	while($posts -> have_posts()):$posts->the_post();
                        ?>
                        	<div class="swiper-slide custom-room-loop">
                                <img src="<?php get_the_post_thumbnail();?>" />
                                <div class="custom-room-loop-content">
                                	<h3><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                                    <p><?php the_content(); ?></p>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        // wp_reset_postdata();
                    }
                    ?>
            </div>
        </div>
    <?php
}
