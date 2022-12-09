<?php

function dartera_enqueue_scripts() {
    if (carbon_get_theme_option( 'mos_plugin_jquery' ) == 'on') {
	   wp_enqueue_script('jquery');	
    }
    
    if (carbon_get_theme_option( 'mos_plugin_fontawesome' ) == 'on') {
        wp_register_style('font-awesome.min', get_template_directory_uri() . '/fonts/font-awesome-4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('font-awesome.min');
    }
    
    if (carbon_get_theme_option( 'mos_plugin_bootstrap' ) == 'bootstrap-reboot') {
        wp_register_style( 'bootstrap-reboot.min', get_template_directory_uri() .  '/plugins/bootstrap-5.2.3/css/bootstrap-reboot.min.css' );
        wp_enqueue_style( 'bootstrap-reboot.min' ); 
    } else if (carbon_get_theme_option( 'mos_plugin_bootstrap' ) == 'bootstrap-utilities') {
        wp_register_style( 'bootstrap-utilities.min', get_template_directory_uri() .  '/plugins/bootstrap-5.2.3/css/bootstrap-utilities.min.css' );
        wp_enqueue_style( 'bootstrap-utilities.min' ); 
    } else if (carbon_get_theme_option( 'mos_plugin_bootstrap' ) == 'bootstrap-grid') {
        wp_register_style( 'bootstrap-grid.min', get_template_directory_uri() .  '/plugins/bootstrap-5.2.3/css/bootstrap-grid.min.css' );
        wp_enqueue_style( 'bootstrap-reboot.min' ); 
    } else if (carbon_get_theme_option( 'mos_plugin_bootstrap' ) == 'bootstrap-reboot-utilities') {
        wp_register_style( 'bootstrap-reboot.min', get_template_directory_uri() .  '/plugins/bootstrap-5.2.3/css/bootstrap-reboot.min.css' );
        wp_enqueue_style( 'bootstrap-reboot.min' ); 
        wp_register_style( 'bootstrap-utilities.min', get_template_directory_uri() .  '/plugins/bootstrap-5.2.3/css/bootstrap-utilities.min.css' );
        wp_enqueue_style( 'bootstrap-utilities.min' ); 
        
    } else if(carbon_get_theme_option( 'mos_plugin_bootstrap' ) == 'bootstrap-bundle') {
        wp_register_style( 'bootstrap.min', get_template_directory_uri() .  '/css/bootstrap.min.css' );
        wp_enqueue_style( 'bootstrap.min' );        
    }
    if (carbon_get_theme_option( 'mos_plugin_bootstrap' ) != 'off') {
        wp_register_script('bootstrap.min', get_template_directory_uri() .  '/js/bootstrap.bundle.min.js', 'jquery');
        wp_enqueue_script( 'bootstrap.min' );        
    }
    
    if (carbon_get_theme_option( 'mos_plugin_fancybox' ) == 'on') {
        wp_register_style('jquery.fancybox.min', get_template_directory_uri() . '/plugins/fancybox/fancyapps/fancybox.css');
        wp_enqueue_style('jquery.fancybox.min');
        wp_register_script('jquery.fancybox.min', get_template_directory_uri() . '/plugins/fancybox/fancyapps/fancybox.umd.js', 'jquery');
        wp_enqueue_script('jquery.fancybox.min');    
    }
    if (carbon_get_theme_option( 'mos_plugin_jpages' ) == 'on') {
        wp_register_script('jPages.min', get_template_directory_uri() . '/plugins/jPages/jPages.min.js', 'jquery');
        wp_enqueue_script('jPages.min');
    }
    if (carbon_get_theme_option( 'mos_plugin_lazyload' ) == 'on') {
        wp_register_script('jquery.lazy.min', get_template_directory_uri() . '/plugins/jquery.lazy-master/jquery.lazy.min.js', 'jquery');
        wp_enqueue_script('jquery.lazy.min');
    }
    if (carbon_get_theme_option( 'mos_plugin_table_shrinker' ) == 'on') {
        wp_register_style('jquery.table-shrinker', get_template_directory_uri() . '/plugins/jquery.table-shrinker/jquery.table-shrinker.css');
        wp_enqueue_style('jquery.table-shrinker'); 
        wp_register_script('jquery.table-shrinker', get_template_directory_uri() . '/plugins/jquery.table-shrinker/jquery.table-shrinker.js', 'jquery');
        wp_enqueue_script( 'jquery.table-shrinker' );
    }
    if (carbon_get_theme_option( 'mos_plugin_owlcarousel' ) == 'on') {
        wp_register_style('owl.carousel.min', get_template_directory_uri() . '/plugins/owlcarousel/owl.carousel.min.css');
        wp_enqueue_style('owl.carousel.min'); 
        wp_register_style('owl.theme.default.min', get_template_directory_uri() . '/plugins/owlcarousel/owl.theme.default.min.css');
        wp_enqueue_style('owl.theme.default.min');       
        wp_register_script('owl.carousel.min', get_template_directory_uri() . '/plugins/owlcarousel/owl.carousel.min.js', 'jquery');
        wp_enqueue_script('owl.carousel.min');
    }
    if (carbon_get_theme_option( 'mos_plugin_slick' ) == 'on') {    
        wp_register_style( 'slick', get_template_directory_uri() . '/plugins/slick/slick.css' );		
        wp_enqueue_style( 'slick' );
        wp_register_style( 'slick-theme', get_template_directory_uri() . '/plugins/slick/slick-theme.css' );
        wp_enqueue_style( 'slick-theme' );	
        wp_register_script('slick', get_template_directory_uri() . '/plugins/slick/slick.js', 'jquery');
        wp_enqueue_script( 'slick' );
    }
    if (carbon_get_theme_option( 'mos_plugin_wow' ) == 'on') {
        wp_register_script('wow.min', get_template_directory_uri() . '/plugins/wow/wow.min.js', 'jquery');
        wp_enqueue_script('wow.min');
    }
    if (carbon_get_theme_option( 'mos_plugin_animate' ) == 'on') {
        wp_register_style('animate', get_template_directory_uri() . '/assets/css/animate.css');	
        wp_enqueue_style('animate');	
    }
    $additionals = carbon_get_theme_option( 'mos_plugin_additional' );
    if ($additionals && sizeof($additionals)) {
        $n = 1;
        foreach($additionals as $additional) {
            $prefix = '';
            $id = 'additional-file-'.$additional['type'].'-'.$n;
            if ($additional['from'] == 'parent') $prefix = get_template_directory_uri();
            elseif ($additional['from'] == 'child') $prefix = get_stylesheet_directory_uri();
            else $prefix = '';
            
            if ($additional['type'] == 'style') {
                wp_register_style( $id, $prefix . $additional['source'], '', '1.0.0' );
                wp_enqueue_style( $id );
            } else {
                wp_register_script($id, $prefix . $additional['source'], 'jquery');
                wp_enqueue_script( $id );                
            }
            $n++;
        }
    }
	wp_register_style('style', get_template_directory_uri() .  '/assets/css/style.css');
	wp_enqueue_style('style');

	wp_register_style('theme-style', get_template_directory_uri() .  '/style.css');
	wp_enqueue_style('theme-style');
    
	wp_register_script('script', get_template_directory_uri() . '/assets/js/script.js', 'jquery');
	wp_enqueue_script('script');
		
	wp_register_script('main.min', get_template_directory_uri() . '/js/main.js', 'jquery', '', true);
	wp_enqueue_script('main.min');
    //wp_enqueue_script( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, bool $in_footer = false )

}
add_action('wp_enqueue_scripts', 'dartera_enqueue_scripts');
function dartera_admin_enqueue_scripts(){
	wp_register_style('font-awesome.min', get_template_directory_uri() . '/fonts/font-awesome-4.7.0/css/font-awesome.min.css');
	wp_register_style('custom-admin', get_template_directory_uri() . '/css/custom-admin.css');
	wp_enqueue_style('font-awesome.min');
	wp_enqueue_style('custom-admin');

	wp_enqueue_media();
	wp_register_script('custom-admin', get_template_directory_uri() . '/js/custom-admin.js', 'jquery');
	wp_enqueue_script('custom-admin');


}
add_action('admin_enqueue_scripts', 'dartera_admin_enqueue_scripts');
function dartera_common_enqueue_scripts(){
	wp_register_script('ajax', get_template_directory_uri() . '/js/ajax.js', 'jquery');
	wp_enqueue_script('ajax');
	wp_localize_script('ajax', 'mos_ajax_object',
		array(
			'ajaxurl' => admin_url('admin-ajax.php'),
		)
	);
}
add_action('admin_enqueue_scripts', 'dartera_common_enqueue_scripts');
add_action('wp_enqueue_scripts', 'dartera_common_enqueue_scripts');