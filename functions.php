<?php 

/** This is main PHP Control file */
/** where we need to set up all */
/** initialization settings */
function overwrite_jquery() // Overwrite wp jQuery
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js' );
}

function load_assets() // Load Assets like CSS/HTML
{
    // Load Bootstrap
    wp_enqueue_style( 'bootstrap-reboot', get_template_directory_uri() . '/css/bootstrap-reboot.min.css' );
    wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/css/bootstrap-grid.min.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );

    // Load Responsive
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' );

    // Load Important Bootstrap JS
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js' );

    // Load Custom CSS
    wp_enqueue_style( 'my_script', get_template_directory_uri() . '/css/my_script.css' );

    // Load Custom JS
    wp_enqueue_script( 'my_script', get_template_directory_uri() . '/js/my_script.js' );

}

/** REGISTER MENUS **/
register_nav_menus([
    "primary_menu" => __( "Primary Menu", 'theme' )
]);

/** REGISTER SIDEBAR */
function all_sidebars() // Call all sidebars
{
    register_sidebar([
        'name' => 'CiteSidebar',
        'id'   => 'citsidebar',
        'class'=> 'citesidebar',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
        'before_widget' => '<div>',
        'after_widget' => '</div>'
    ]);
    register_sidebar([
        'name' => 'BioSidebar',
        'id'   => 'biosidebar',
        'class'=> 'biosidebar',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
        'before_widget' => '<div>',
        'after_widget' => '</div>'
    ]);
}

/** RANDOM COLOR GENERATOR */
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}


/** SET THEME ADD ACTION */
add_action( 'wp_enqueue_scripts', 'overwrite_jquery' );
add_action( 'wp_enqueue_scripts', 'load_assets' );
add_action( 'widgets_init', 'all_sidebars' );

/** SET THEME SUPPORT */
add_theme_support("menus");
add_theme_support("post-thumbnails");