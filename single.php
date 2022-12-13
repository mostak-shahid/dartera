<?php 
get_header();
$post_id = get_the_ID();
$post_badge = carbon_get_post_meta( $post_id, 'mos_post_badge' );
$author_id = get_post_field( 'post_author', $post_id );
$author_name = get_the_author_meta('display_name',$author_id);
$author_description = get_the_author_meta('description',$author_id);
$author_image = carbon_get_user_meta( $author_id, 'mos_profile_image' );
$author_designation = carbon_get_user_meta( $author_id, 'mos_profile_designation' );
$author_linkedin = carbon_get_user_meta( $author_id, 'mos_profile_linkedin' );
$postCategories = get_the_category();
$allCategories = mos_get_terms ('category');
$allTags = mos_get_terms ('post_tag');

$category_title = carbon_get_theme_option( 'mos-single-post-category-widget-title' );
$trending_title = carbon_get_theme_option( 'mos-single-post-trending-widget-title' );
$known_title = carbon_get_theme_option( 'mos-single-post-known-widget-title' );
$newsletter_title = carbon_get_theme_option( 'mos-single-post-newsletter-widget-title' );
$newsletter_shortcode = carbon_get_theme_option( 'mos-single-post-newsletter-shortcode' );
$newsletter_image = carbon_get_theme_option( 'mos-single-post-newsletter-image' );
$tag_title = carbon_get_theme_option( 'mos-single-post-tag-widget-title' );

//$audio_option = carbon_get_the_post_meta( 'mos_blog_details_audio_option' );
//var_dump($audio_option);
//$audio = carbon_get_the_post_meta( 'mos_blog_details_audio' );
//var_dump($audio);

?>
<!-- /Blog content area -/Start  -->
<section class="blog-details bg-white section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-header">
                    <?php if ($post_badge) :?>
                    <h6 class="sub-title fs-18 fw-semi-bold text-lapis_lazuli bg-lapis_lazuli_light radius-4 d-inline-block mb-3"><?php echo $post_badge ?></h6>
                    <?php endif?>
                    <h2 class="blog-title fs-48 text-gray_1 fw-bold mb-4"><?php echo get_the_title() ?></h2>
                    <div class="author d-flex gap-3 align-items-center mb-4 pb-2">
                        <div class="author-img">
                            <img src="<?php echo $author_image?aq_resize($author_image, 50,50,true):get_template_directory_uri().'/assets/img/author-img.png' ?>" alt="<?php echo $author_name ?>" class="img-fluid w-auto rounded-circle" width="50" height="50" loading="lazy">
                        </div>
                        <a href="<?php echo get_author_posts_url($author_id) ?>" class="author-info d-flex align-items-center gap-3 text-decoration-none">
                            <p class="mb-0 text-gray_1 fs-6">Written By <b><?php echo $author_name ?></b></p>
                            <div class="author-separator rounded-pill"></div>
                            <p class="mb-0 fs-14 fw-normal text-gray_1"><?php echo get_post_time('F j, Y') ?></p>
                        </a>
                    </div>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                <div class="featured-img radius-12 overflow-hidden mb-4 pb-2">
                    <?php the_post_thumbnail('full', ['class' => 'lazy-load-image lazyload img-fluid img-blog-single', 'title' => get_the_title()]); ?>
                </div>
                <?php endif?>

                <div class="blog-post-content">
                    <div class="mos-content"><?php the_content() ?></div>
                    <div class="social-share-box radius-16 text-center text-md-start d-md-flex align-items-center justify-content-between gap-4">
                        <h6 class="fs-5 fw-bold text-lapis_lazuli mb-4 mb-md-0">
                            Teilen Sie mit einem Freund.
                        </h6>

                        <div class="social-share-icons d-flex justify-content-center justify-content-md-start align-items-center gap-3">
                            <a href="#" class="single-icon rounded-pill d-flex align-items-center justify-content-center transition-02">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 17.9895 4.3882 22.954 10.125 23.8542V15.4688H7.07812V12H10.125V9.35625C10.125 6.34875 11.9166 4.6875 14.6576 4.6875C15.9701 4.6875 17.3438 4.92188 17.3438 4.92188V7.875H15.8306C14.34 7.875 13.875 8.80008 13.875 9.75V12H17.2031L16.6711 15.4688H13.875V23.8542C19.6118 22.954 24 17.9895 24 12Z" fill="#889FB7"></path>
                                </svg>
                            </a>
                            <a href="#" class="single-icon rounded-pill d-flex align-items-center justify-content-center transition-02">
                                <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.55016 19.75C16.6045 19.75 21.5583 12.2467 21.5583 5.74186C21.5583 5.53092 21.5536 5.3153 21.5442 5.10436C22.5079 4.40746 23.3395 3.54425 24 2.5553C23.1025 2.9546 22.1496 3.21538 21.1739 3.32874C22.2013 2.71291 22.9705 1.74547 23.3391 0.605767C22.3726 1.17856 21.3156 1.58261 20.2134 1.80061C19.4708 1.01156 18.489 0.489116 17.4197 0.314051C16.3504 0.138986 15.2532 0.32105 14.2977 0.832096C13.3423 1.34314 12.5818 2.15471 12.1338 3.14131C11.6859 4.12792 11.5754 5.23462 11.8195 6.2903C9.86249 6.19209 7.94794 5.6837 6.19998 4.7981C4.45203 3.91249 2.90969 2.66944 1.67297 1.14952C1.0444 2.23324 0.852057 3.51565 1.13503 4.73609C1.418 5.95654 2.15506 7.02345 3.19641 7.71999C2.41463 7.69517 1.64998 7.48468 0.965625 7.10592V7.16686C0.964925 8.30415 1.3581 9.40659 2.07831 10.2868C2.79852 11.167 3.80132 11.7706 4.91625 11.995C4.19206 12.1931 3.43198 12.222 2.69484 12.0794C3.00945 13.0574 3.62157 13.9129 4.44577 14.5263C5.26997 15.1398 6.26512 15.4806 7.29234 15.5012C5.54842 16.8711 3.39417 17.6141 1.17656 17.6106C0.783287 17.61 0.390399 17.5859 0 17.5384C2.25286 18.9837 4.87353 19.7514 7.55016 19.75Z" fill="#889FB7"></path>
                                </svg>
                            </a>
                            <a href="#" class="single-icon rounded-pill d-flex align-items-center justify-content-center transition-02">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.2234 0H1.77187C0.792187 0 0 0.773438 0 1.72969V22.2656C0 23.2219 0.792187 24 1.77187 24H22.2234C23.2031 24 24 23.2219 24 22.2703V1.72969C24 0.773438 23.2031 0 22.2234 0ZM7.12031 20.4516H3.55781V8.99531H7.12031V20.4516ZM5.33906 7.43438C4.19531 7.43438 3.27188 6.51094 3.27188 5.37187C3.27188 4.23281 4.19531 3.30937 5.33906 3.30937C6.47813 3.30937 7.40156 4.23281 7.40156 5.37187C7.40156 6.50625 6.47813 7.43438 5.33906 7.43438ZM20.4516 20.4516H16.8937V14.8828C16.8937 13.5563 16.8703 11.8453 15.0422 11.8453C13.1906 11.8453 12.9094 13.2938 12.9094 14.7891V20.4516H9.35625V8.99531H12.7687V10.5609H12.8156C13.2891 9.66094 14.4516 8.70938 16.1813 8.70938C19.7859 8.70938 20.4516 11.0813 20.4516 14.1656V20.4516V20.4516Z" fill="#889FB7"></path>
                                </svg>
                            </a>
                            <a href="#" class="single-icon rounded-pill d-flex align-items-center justify-content-center transition-02">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.6942 15.0318C12.4675 15.1735 12.2125 15.2302 11.9858 15.2302C11.7591 15.2302 11.5041 15.1735 11.2774 15.0318L0 8.14636V17.2987C0 19.2538 1.58678 20.8406 3.54191 20.8406H20.4581C22.4132 20.8406 24 19.2538 24 17.2987V8.14636L12.6942 15.0318Z" fill="#889FB7"></path>
                                    <path d="M20.4619 3.15942H3.54576C1.87398 3.15942 0.457211 4.34951 0.117188 5.93628L12.018 13.1901L23.8905 5.93628C23.5505 4.34951 22.1337 3.15942 20.4619 3.15942Z" fill="#889FB7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="author-bio radius-16 text-center text-md-start d-md-flex align-items-center gap-4 mt-30 mb-4 mb-lg-0" loading="lazy">
                            <img src="<?php echo $author_image?aq_resize($author_image, 90,90,true):get_template_directory_uri().'/assets/img/author-bio-img.png'?>" alt="<?php echo $author_name ?>" class="img-fluid mb-4 mb-md-0 rounded-circle" width="90" height="90">
                            <div class="">
                                <h6 class="fs-5 fw-bold mb-0 pb-1">
                                    <a href="<?php echo get_author_posts_url($author_id) ?>" class=" text-gray_1 text-decoration-none">
                                        <?php echo $author_name ?>
                                    </a>
                                </h6>
                                <div class="fs-6 text-gray_2 mb-0 pt-1">
                                    <?php echo $author_description?> 
                                    <?php if ($author_linkedin) : ?>
                                    <a href="<?php echo $author_linkedin?>" class="text-lapis_lazuli fw-bold text-link" target="_blank">LinkedIn.</a>
                                    <?php endif?>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-4">
                <aside id="sidebar">
                   
                    <div class="sidebar-widget border radius-12 mb-4 overflow-hidden">
                        <?php if ($category_title) :?>
                        <h4 class="widget-title fw-semi-bold fs-4 text-gray_1 bg-gray_7 px-4 py-3 mb-3"><?php echo $category_title ?></h4>
                        <?php endif?>
                        <div class="widget-body p-4">
                            <ul class="categorise-list list-unstyled mb-0">
                                <?php foreach($allCategories as $category) : ?>
                                <li class="mb-3">
                                    <a href="<?php echo get_category_link( $category['term_id'] )?>" class="text-gray_2 fs-5 fw-normal d-flex align-items-center gap-3 justify-content-between text-decoration-none">
                                        <?php echo $category['name']?>
                                        <span class="total-post">(<?php echo $category['count']?>)</span>
                                    </a>
                                </li>
                                <?php endforeach?>                                
                            </ul>
                        </div>
                    </div>
                    <?php
                    $args = array(
                        'meta_key' => '_mos_tranding_post',
                        'meta_value' => 'yes',
                        'meta_compare' => '=',
                        'posts_per_page' => 4
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) : ?>
                        <div class="sidebar-widget border radius-12 mb-4 overflow-hidden">
                        <?php if ($trending_title) : ?>
                        <h4 class="widget-title fw-semi-bold fs-4 text-gray_1 bg-gray_7 px-4 py-3 mb-0"><?php echo $trending_title ?></h4>
                        <?php endif?>
                        <div class="widget-body p-4">
                            <ul class="trending-list  list-unstyled mb-0">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <li>
                                    <a href="<?php echo get_the_permalink() ?>" class="single-blog radius-12 text-decoration-none d-flex gap-3 align-items-center mb-4">
                                        <span class="blog-img overflow-hidden radius-12 d-block flex-shrink-0">                                  
                                            <?php if (has_post_thumbnail()) : ?>
                                                <img src="<?php echo aq_resize(get_the_post_thumbnail_url($post_id,'full'),60,60,true) ?>" alt="<?php echo get_the_title() ?>" class="img-fluid w-100" width="60" height="60" loading="lazy">
                                            <?php else: ?>
                                                <img src="<?php echo get_template_directory_uri().'/assets/img/blog-small-img1.png'?>" alt="<?php echo get_the_title() ?>" class="img-fluid w-100" width="60" height="60" loading="lazy">
                                            <?php endif?>
                                        </span>
                                        <span class="blog-info">
                                            <span href="" class="blog-title text-gray_1 fs-12 fw-medium d-block"><?php echo get_the_title() ?></span>
                                            <span class="post-time mb-0 fs-12 fw-normal text-gray_3 d-block">
                                                8 hours ago
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php
                    $args = array(
                        'meta_key' => '_mos_known_post',
                        'meta_value' => 'yes',
                        'meta_compare' => '=',
                        'posts_per_page' => 4
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) : ?>
                        <div class="sidebar-widget border radius-12 mb-4 overflow-hidden">
                        <?php if ($known_title) : ?>
                        <h4 class="widget-title fw-semi-bold fs-4 text-gray_1 bg-gray_7 px-4 py-3 mb-0"><?php echo $known_title?></h4>
                        <?php endif?>
                        <div class="widget-body p-4">
                            <ul class="trending-list  list-unstyled mb-0">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <li>
                                    <a href="<?php echo get_the_permalink() ?>" class="single-blog radius-12 text-decoration-none d-flex gap-3 align-items-center mb-4">
                                        <span class="blog-img overflow-hidden radius-12 d-block flex-shrink-0">                                  
                                            <?php if (has_post_thumbnail()) : ?>
                                                <img src="<?php echo aq_resize(get_the_post_thumbnail_url($post_id,'full'),60,60,true) ?>" alt="<?php echo get_the_title() ?>" class="img-fluid w-100" width="60" height="60" loading="lazy">
                                            <?php else: ?>
                                                <img src="<?php echo get_template_directory_uri().'/assets/img/blog-small-img1.png'?>" alt="<?php echo get_the_title() ?>" class="img-fluid w-100" width="60" height="60" loading="lazy">
                                            <?php endif?>
                                        </span>
                                        <span class="blog-info">
                                            <span href="" class="blog-title text-gray_1 fs-12 fw-medium d-block"><?php echo get_the_title() ?></span>
                                            <span class="post-time mb-0 fs-12 fw-normal text-gray_3 d-block">
                                                8 hours ago
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                    <div class="sidebar-widget border radius-12 mb-4 overflow-hidden">
                        <div class="widget-body p-4">
                            <div class="text-center text-lg-start">
                                <?php if ($newsletter_image) : ?>
                                <div class="w-img mb-4">
                                    <?php echo wp_get_attachment_image( $newsletter_image, "full", "", array( "class" => "img-responsive img-fluid" ) );  ?>
                                </div>
                                <?php endif?>
                                <?php if ($newsletter_title) : ?>
                                <h3 class="text-gray_1 fs-4 fw-bold d-block mb-4"><?php echo $newsletter_title ?></h3>
                                <?php endif?>
                            </div>
                            <?php if ($newsletter_shortcode) : ?>
                            <div class="CTA-form-wrapper">
                                <div class="CTA-form">
                                    <?php echo do_shortcode($newsletter_shortcode) ?>
                                </div>
                            </div>
                            <?php endif?>
                        </div>
                    </div>
                    <?php if ($allTags && sizeof($allTags)) : ?>
                    <div class="sidebar-widget border radius-12 mb-4 overflow-hidden">
                        <?php if ($tag_title) : ?>
                        <h4 class="widget-title fw-semi-bold fs-4 text-gray_1 bg-gray_7 px-4 py-3 mb-0"><?php echo $tag_title ?></h4>
                        <?php endif?>
                        <div class="widget-body p-4">
                            <ul class="tag-list list-unstyled mb-0 d-flex gap-3 flex-wrap">
                                <?php foreach($allTags as $tag) : ?>
                                <li class="mb-3">
                                    <a href="<?php echo get_tag_link( $tag['term_id'] )?>" class="text-gray_4 fs-14 fw-medium px-3 py-2 border text-decoration-none radius-4 ls-5"><?php echo $tag['name']?></a>
                                </li>
                                <?php endforeach?>
                                
                            </ul>
                        </div>
                    </div>
                    <?php endif?>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- /Blog content area -/End  -->


<?php get_footer() ?>
