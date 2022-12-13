<?php get_header(); ?>
<?php 
$author_id = get_the_author_meta('ID');
$author_name = get_the_author_meta('display_name',$author_id);
$author_description = get_the_author_meta('description',$author_id);
$author_image = carbon_get_user_meta( $author_id, 'mos_profile_image' );
$author_designation = carbon_get_user_meta( $author_id, 'mos_profile_designation' );
$author_linkedin = carbon_get_user_meta( $author_id, 'mos_profile_linkedin' );
?>
<section class="mos-author-banner mos-author-banner-padding">
    <div class="container">
        <div class="row align-items-center">
            <?php if ($author_image): ?>
            <div class="col-lg-4">
                <img class="img-responsive img-fluid w-100 rounded-circle" src="<?php echo aq_resize($author_image, 354, 354, true) ?>" alt="<?php echo $author_name ?> - <?php echo $author_designation ?>" width="354" height="354">
            </div>
            <?php endif?>
            <div class="col-lg-8">
                <h3 class="author-banner-title">
                    <?php echo $author_name ?>
                    <?php if ($author_designation) :?>
                     - <small><?php echo $author_designation ?></small>
                    <?php endif?>
                </h3>
                <div class="author-banner-intro">
                    <?php echo $author_description?>
                    <?php if ($author_linkedin) : ?>
                    <a href="<?php echo $author_linkedin?>" class="text-white fw-bold text-link" target="_blank">LinkedIn.</a>
                    <?php endif?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog-main -->
<main class="blog-main py-5">
    <div class="container">
        <!-- blogs-post  -->
        <div class="blogs-post section-padding">
            <div class="blog-post-inner">
                <?php if ( have_posts() ) :?>
                <?php $n = 1?>
                <div class="row">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php
                    $post_id = get_the_ID();
                    $post_badge = carbon_get_post_meta( $post_id, 'mos_post_badge' );
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                    
//                    $author_id = get_post_field( 'post_author', $post_id );
//                    $author_name = get_the_author_meta('display_name',$author_id);
//                    $author_description = get_the_author_meta('description',$author_id);
//                    $author_image = carbon_get_user_meta( $author_id, 'mos_profile_image' );
//                    $author_designation = carbon_get_user_meta( $author_id, 'mos_profile_designation' );
//                    $author_linkedin = carbon_get_user_meta( $author_id, 'mos_profile_linkedin' );
                    if ($n==2) $animationClass = 'delay-xl-250ms';
                    else if ($n==3) $animationClass = 'delay-xl-500ms';
                    else $animationClass = '';
                    
                    ?>
                    <div class="col-xl-4 col-sm-6 mb-4 wow fadeInLeft delay-0ms <?php echo $animationClass ?>">
                        <div class="single-blog blog-info bg-white radius-12 overflow-hidden">
                            <?php if (has_post_thumbnail()) : ?>
                            <div class="blog-img overflow-hidden radius-12">
                                <a href="<?php echo get_the_permalink() ?>" class="d-block">
                                    <img src="<?php echo aq_resize($featured_img_url, 354, 190, true)?>" alt="Featured Image" class="img-fluid w-100">
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
                                    <div class="author-img">
                                        <img src="<?php echo $author_image?aq_resize($author_image, 50,50,true):get_template_directory_uri().'/assets/img/author-img.png' ?>" alt="<?php echo $author_name ?>" class="img-fluid w-auto rounded-circle" width="50" height="50" loading="lazy">
                                    </div>
                                    <div class="author-info d-block text-decoration-none">
                                        <p class="mb-0 text-gray_1 fs-6">Written By <b><?php echo $author_name ?></b>
                                        </p>
                                        <p class="mb-0 fs-14 fw-normal text-gray_3"><?php echo get_post_time('F j, Y') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $n = ($n==3)?0:$n; $n++?>
                    <?php endwhile;?>
                </div>
                <div class="pagination-wrapper d-flex justify-content-center">
                <?php
                    the_posts_pagination( array(
                        'show_all' => false,
                        'screen_reader_text' => " ",
                        'prev_text'          => 'Prev',
                        'next_text'          => 'Next',
                    ) );
                ?>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
        <!--/ blogs-post  -->


    </div>
</main>
<!--/ blog-main -->
<?php get_footer() ?>
