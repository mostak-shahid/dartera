<?php
/* AJAX action callback */
add_action( 'wp_ajax_reset_prl', 'reset_prl_ajax_callback' );
add_action( 'wp_ajax_nopriv_reset_prl', 'reset_prl_ajax_callback' );
/* Ajax Callback */
function reset_prl_ajax_callback () {
    $post_id = $_GET['post_id'];
    delete_post_meta($post_id, '_dartera_page_section_layout');
    //http://tippproperty.belocal.today/wp-admin/post.php?post=16&action=edit
    $location = admin_url('/') . 'post.php?post=' . $post_id . '&action=edit';
    wp_redirect( $location, $status = 302 );
    exit; // required. to end AJAX request.
}
/* AJAX action callback */
add_action( 'wp_ajax_dummy', 'dummy_ajax_callback' );
add_action( 'wp_ajax_nopriv_dummy', 'dummy_ajax_callback' );
/* Ajax Callback */
function dummy_ajax_callback () {
    $post_id = $_POST['product'];
    $output = array();
	echo json_encode($output);
    exit; // required. to end AJAX request.
}

/* AJAX action callback */
add_action( 'wp_ajax_load_more_posts', 'load_more_posts_ajax_callback' );
add_action( 'wp_ajax_nopriv_load_more_posts', 'load_more_posts_ajax_callback' );
/* Ajax Callback */
function load_more_posts_ajax_callback () {
    $output = array();
    $args = array( 
		'post_type' 		=> $_POST['data']['post_type'],
	);
    $args['posts_per_page'] = $_POST['data']['count'];
    $args['offset'] = $_POST['loaded'];
    if ($_POST['data']['term_id'] && $_POST['data']['tax']){
        $args[$_POST['data']['tax']] = $_POST['data']['term_id']; //tax
        
    }
    ob_start(); 
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : 
        $n = 1;
        while ( $query->have_posts() ) : $query->the_post();?>
            <?php
            $post_id = get_the_ID();
            $post_badge = carbon_get_post_meta($post_id, 'mos_post_badge'); 
            $featured_img_url = get_the_post_thumbnail_url($post_id,'full');
            $author_id = get_post_field('post_author', $post_id);
            $author_name = get_the_author_meta('display_name',$author_id);
            $author_description = get_the_author_meta('description',$author_id);
            $author_image = carbon_get_user_meta($author_id, 'mos_profile_image');
            $author_designation = carbon_get_user_meta($author_id, 'mos_profile_designation');
            $author_linkedin = carbon_get_user_meta($author_id, 'mos_profile_linkedin');
            if ($n==2) $animationClass = 'delay-xl-250ms';
            else if ($n==3) $animationClass = 'delay-xl-500ms';
            else $animationClass = '';
            ?>
            <div class="col-xl-4 col-sm-6 mb-4 wow fadeInLeft delay-0ms <?php echo $animationClass ?>">
                <div class="single-blog blog-info bg-white radius-12 overflow-hidden">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="blog-img overflow-hidden radius-12">
                        <a href="<?php echo get_the_permalink() ?>" class="d-block">
                            <img src="<?php echo aq_resize($featured_img_url, 354, 190, true)?>" alt="<?php echo get_the_title() ?>" class="img-fluid w-100">
                        </a>
                    </div>
                    <?php endif?>
                    <div class="blog-intro p-4">
                        <?php if ($post_badge) :?>
                        <h6 class="sub-title fs-14 fw-semi-bold text-lapis_lazuli bg-lapis_lazuli_light radius-4 d-inline-block mb-3"><?php echo $post_badge ?></h6>
                        <?php endif?>
                        <h3 class="mb-4">
                            <a href="<?php echo get_the_permalink() ?>" class="blog-title text-gray_1 fs-5 fw-medium text-decoration-none lh-26"><?php echo get_the_title() ?></a>
                        </h3>

                        <div class="author d-flex gap-3 align-items-center">
                            <?php if ($author_image) :?>
                            <div class="author-img">
                                <img src="<?php echo $author_image?aq_resize($author_image, 50,50,true):get_template_directory_uri().'/assets/img/author-img.png' ?>" alt="<?php echo $author_name ?>" class="img-fluid w-auto rounded-circle" width="50" height="50" loading="lazy">
                            </div>
                            <?php endif?>
                            <a href="<?php echo get_author_posts_url($author_id) ?>" class="author-info d-block text-decoration-none">
                                <span class="mb-0 text-gray_1 fs-6">Written By <b><?php echo $author_name ?></b>
                                </span>
                                <span class="mb-0 fs-14 fw-normal text-gray_3"><?php echo get_post_time('F j, Y') ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php $n = ($n==3)?0:$n; $n++?>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;
    $html = ob_get_clean();
    //return $html;
	echo json_encode($html);
	//echo $html;
    exit; // required. to end AJAX request.
    
}
