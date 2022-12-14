<?php 
get_header();
$blog_id = get_option('page_for_posts');
$post   = get_post($blog_id);
$blog_page_content =  apply_filters('the_content', $post->post_content);
$allCategories = array_reverse(mos_get_terms ('category'));
$n = 1;

$term_id = (@get_queried_object()->term_id)?get_queried_object()->term_id:0;
$default_posts_per_page = get_option( 'posts_per_page' );
$tax = ($term_id)?(is_tag())?'tag_id':'cat':'';
$post_type = $post_type?$post_type:'post';
?>



    <!-- blog-header-tab -->
    <div class="blog-header-tab border-bottom mt-5 pt-5">
        <div class="container-fluid">
            <div class="blog-tab-list">
                <ul class="nav nav-pills align-items-center justify-content-center mb-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <?php if ($post_type == 'case_study') : ?>
                        <a href="<?php echo get_post_type_archive_link( 'case_study' ); ?>" class="nav-link py-4 d-flex align-items-center gap-2 text-gray_3 fs-6 fw-semi-bold <?php echo(is_home())?'active':'' ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/tab-icon1.svg" alt="tab icon" class="img-responsive img-fluid archive-cat-icon">
                            Neueste Fallstudien
                        </a>
                        <?php else : ?>
                        <a href="<?php echo get_the_permalink($blog_id)?>" class="nav-link py-4 d-flex align-items-center gap-2 text-gray_3 fs-6 fw-semi-bold <?php echo(is_home())?'active':'' ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/tab-icon1.svg" alt="tab icon" class="img-responsive img-fluid archive-cat-icon">
                            Neueste Artikel
                        </a>
                        <?php endif?>
                    </li>
                    
                    <?php foreach($allCategories as $category):?>
                    <?php 
                    $category_image = carbon_get_term_meta($category['term_id'], 'mos_category_image'); 
                    ?>
                    <li class="nav-item" role="presentation">
                        <a href="<?php echo get_category_link($category['term_id'])?>" class="nav-link py-4 d-flex align-items-center gap-2 text-gray_3 fs-6 fw-semi-bold <?php echo($term_id == $category['term_id'])?'active':'' ?>">
<!--                            .active-->
                            <?php if ($category_image) :?>
                            <?php echo wp_get_attachment_image($category_image, "full", "", array("class" => "img-responsive img-fluid archive-cat-icon"));  ?>
                            <?php endif?>
                            <?php echo $category['name']?>
                        </a>
                    </li>
                    <?php if ($n>6) break;?>
                    <?php $n++?>
                    <?php endforeach?>
                    <li class="nav-item">
                        <button type="button" class="btn search-btn p-0">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/search-icon.svg" alt="tab icon" class="img-fluid">
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/ blog-header-tab -->

<?php echo (is_home())?$blog_page_content:''?>

    <!-- blog-main -->
    <main class="blog-main pb-5 mt-4">
        <div class="container">
            <!-- search-wrap -->
            <div class="searchBar">
                <div class="search-wrap position-relative pb-4">
                    <input type="text" class="form-control rounded-pill px-4 h-52 text-gray_5 fs-14 fw-normal"
                        placeholder="Search..">
                    <button type="submit" class="btn position-absolute">
                        <img src="<?php echo get_template_directory_uri()?>/assets/img/search-icon.svg" alt="icon" class="img-fluid">
                    </button>
                </div>
            </div>
            <!-- search-wrap -End -->
                    <div class="blogCart-section-title">
                        <h4 class="fs-30 fw-bold text-gray_1 mb-0">
                            Neueste Beiträge
                        </h4>
                    </div>
                    <div class="border-1px mb-30"></div>
                    <?php
                    $args = array(
                        'posts_per_page' => 3,
                        'post_type' => $post_type,
                    );
                    if ($term_id){
                        if (is_tag()) {
                            $args['tag_id'] = $term_id;
                        } else {
                            $args['cat'] = $term_id;
                        }
                    }
                    $query = new WP_Query($args);
                    ?>
                    <?php if ($query->have_posts()) : ?>
                    <!-- blog-slide-active -->
                    <div class="mos-owl-carousel blog-slide-active owl-carousel mb-5 radius-12" data-carousel-options='{"loop": true,"items": 1,"margin": 0,"autoplay": true,"nav": true,"autoplayTimeout": 2500,"animateOut": "fadeOut","smartSpeed": 2500,"dots": true,"autoplayHoverPause": true}'>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php
                        $post_id = get_the_ID();
                        $post_badge = carbon_get_post_meta($post_id, 'mos_post_badge');
                        $author_id = get_post_field('post_author', $post_id);
                        $author_name = get_the_author_meta('display_name',$author_id);
                        $author_description = get_the_author_meta('description',$author_id);
                        $author_image = carbon_get_user_meta($author_id, 'mos_profile_image');
                        $author_designation = carbon_get_user_meta($author_id, 'mos_profile_designation');
                        $author_linkedin = carbon_get_user_meta($author_id, 'mos_profile_linkedin');
                        ?>
                        <div class="single-blog">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="featured-image">
                                    <a href="<?php echo get_the_permalink() ?>">
                                    <?php the_post_thumbnail('full', ['class' => 'img-fluid w-100 radius-4', 'title' => get_the_title()]); ?>
                                    </a>
                                </div>
                            <?php endif?>
                            <div class="blog-info">
                                <?php if ($post_badge) :?>
                                <h6 class="sub-title fs-18 fw-semi-bold text-lapis_lazuli bg-lapis_lazuli_light radius-4 d-inline-block mb-3"><?php echo $post_badge ?></h6>
                                <?php endif?>
                                <h3 class="mb-4">
                                    <a href="<?php echo get_the_permalink() ?>" class="blog-title text-gray_1 fs-4 fw-medium text-decoration-none"><?php echo get_the_title() ?></a>
                                </h3>
                                <p class="fs-18 text-gray_2 fw-normal mb-4"><?php echo wp_trim_words(get_the_content(), 16, '...')?></p>
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
                        <?php endwhile;?>
                    </div>
                    <!-- blog-slide-active -END -->
                    <?php wp_reset_postdata(); ?>
                    <?php endif;?>

                    <?php
                    $loaded = 3 + $default_posts_per_page;
                    $args = array(
                        'offset' => 3,
                        'posts_per_page' => $default_posts_per_page,
                        'post_type' => $post_type,
                    );
                    if ($term_id){
                        if (is_tag()) {
                            $args['tag_id'] = $term_id;
                        } else {
                            $args['cat'] = $term_id;
                        }
                    }
                    $query = new WP_Query($args);
                    ?>
                    <?php if ($query->have_posts()) : ?>
                    <?php $n = 1?>
                    <!-- blogs-post  -->
                    <div class="blogs-post section-padding pt-0 bg-white">
                        <div class="blog-post-inner">
                            <div class="blogCart-section-title">
                                <h4 class="fs-30 fw-bold text-gray_1 mb-0">
                                    Alle Artikel
                                </h4>
                            </div>
                            <div class="border-1px mb-30"></div>
                            <div class="row load-more-below">
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
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
                                <?php endwhile;?>        
                            </div>
                            <?php if ($loaded < $query->found_posts) : ?>
                            <div class="common-btn banner-btn d-flex justify-content-center mt-5">
                                <input type="hidden" class="data" value='{"post_type":"<?php echo $post_type ?>","term_id":"<?php echo $term_id ?>", "tax":"<?php echo $tax ?>", "count":"<?php echo $default_posts_per_page ?>", "total":"<?php echo $query->found_posts ?>"}'> 
                                <button class="btn fill-btn fw-semi-bold text-gray_1 lh-20 text-decoration-none bg-flourescent_blue radius-4 load-more-posts" type="button" data-loaded="<?php echo $loaded ?>">
                                    <span>Mehr laden</span>
                                </button>
                            </div>
                            <?php endif?>
                        </div>
                    </div>
                    <!--/ blogs-post  -->
                    <?php wp_reset_postdata(); ?>
                    <?php endif;?>
                    <?php if ($post_type != 'case_study') : ?>
                    <!-- case-studies -->
                    <div class="case-studies">
                        <div
                            class="blogCart-section-title d-flex justify-content-between gap-4 align-items-center flex-wrap">
                            <h4 class="fs-30 fw-bold text-gray_1 mb-0">
                                Case Studies
                            </h4>
                            <a href="<?php echo get_post_type_archive_link( 'case_study' ); ?>" class="text-lapis_lazuli text-decoration-none fw-semi-bold d-flex align-items-center gap-2">
                                Alle Case Studies anzeigen
                                <span class="ni ni-arrow-long-right text-lapis_lazuli fs-4"></span>
                            </a>
                        </div>
                        <div class="border-1px mb-30"></div>

                        <?php
                    $args = array(
                        'posts_per_page' => 3,
                        'post_type' => 'case_study',
                    );
                    $query = new WP_Query($args);
                    ?>
                    <?php if ($query->have_posts()) : ?>
                    <!-- blog-slide-active -->
                    <div class="mos-owl-carousel blog-slide-active owl-carousel mb-5 radius-12" data-carousel-options='{"loop": true,"items": 1,"margin": 0,"autoplay": true,"nav": true,"autoplayTimeout": 2500,"animateOut": "fadeOut","smartSpeed": 2500,"dots": true,"autoplayHoverPause": true}'>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php
                        $post_id = get_the_ID();
                        $post_badge = carbon_get_post_meta($post_id, 'mos_post_badge');
                        $author_id = get_post_field('post_author', $post_id);
                        $author_name = get_the_author_meta('display_name',$author_id);
                        $author_description = get_the_author_meta('description',$author_id);
                        $author_image = carbon_get_user_meta($author_id, 'mos_profile_image');
                        $author_designation = carbon_get_user_meta($author_id, 'mos_profile_designation');
                        $author_linkedin = carbon_get_user_meta($author_id, 'mos_profile_linkedin');
                        ?>
                        <div class="single-blog">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="featured-image">
                                    <a href="<?php echo get_the_permalink() ?>">
                                    <?php the_post_thumbnail('full', ['class' => 'img-fluid w-100 radius-4', 'title' => get_the_title()]); ?>
                                    </a>
                                </div>
                            <?php endif?>
                            <div class="blog-info">
                                <?php if ($post_badge) :?>
                                <h6 class="sub-title fs-18 fw-semi-bold text-lapis_lazuli bg-lapis_lazuli_light radius-4 d-inline-block mb-3"><?php echo $post_badge ?></h6>
                                <?php endif?>
                                <h3 class="mb-4">
                                    <a href="<?php echo get_the_permalink() ?>" class="blog-title text-gray_1 fs-4 fw-medium text-decoration-none"><?php echo get_the_title() ?></a>
                                </h3>
                                <p class="fs-18 text-gray_2 fw-normal mb-4"><?php echo wp_trim_words(get_the_content(), 16, '...')?></p>
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
                        <?php endwhile;?>
                    </div>
                    <!-- blog-slide-active -END -->
                    <?php wp_reset_postdata(); ?>
                    <?php endif;?>
                    </div>
                    <!--/ case-studies -->
                    <?php endif?>
                </div>
    </main>
    <!--/ blog-main -->
<?php get_footer() ?>