<?php 
get_header();
$title = carbon_get_theme_option( 'mos-404-title' );
$intro = carbon_get_theme_option( 'mos-404-intro' );
$contact = carbon_get_theme_option( 'mos-404-contact' );
?>
<!-- Banner -->
<section class="error-banner research-banner d-flex align-items-center position-relative">
    <div class="banner-shape position-absolute start-0 bottom-0">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/banner-left-shape.png" class="img-fluid" alt="banner left shape">
    </div>
    <div class="error-shape position-absolute bottom-0">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/error-shape-2.png" class="img-fluid" alt="banner right shape">
    </div>
    <div class="error-shape3 position-absolute ">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/error-shape-3.png" class="img-fluid" alt="banner right shape">
    </div>

    <div class="contact-toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/banner-click.png" class="img-fluid" alt="contact toggle">
    </div>
    <div class="container">
        <div class="error-wrapper mb-5 mb-lg-0 text-center">
            <div class="error-bg text-center">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/page404-bg.png" class="img-fluid" alt="error">
            </div>
            <?php if ($title) :?>
            <h1 class="fs-36 fw-bold text-white mt-4"><?php echo $title ?></h1>
            <?php endif?>
            <?php if ($intro) :?>
            <div class="fs-18 text-light_white mt-4 mb-5">
                <?php echo do_shortcode($intro) ?>
            </div>
            <?php endif?>

            <!-- Common Buttons -/ Start -->
            <div class="common-btn d-flex flex-wrap align-items-center justify-content-center gap-3">
                <a href="<?php echo home_url() ?>" class="fill-btn fw-semi-bold text-gray_1 lh-20 text-decoration-none bg-flourescent_blue radius-4 d-inline-flex align-items-center gap-2">
                    <span>Startseite</span>
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.5117 8.82164L10.9342 5.24414L9.75591 6.42247L12.5001 9.16664H4.16675V10.8333H12.5001L9.75591 13.5775L10.9342 14.7558L14.5117 11.1783C14.8242 10.8658 14.9997 10.4419 14.9997 9.99997C14.9997 9.55803 14.8242 9.13419 14.5117 8.82164Z" fill="#002448" />
                        </svg>
                    </span>
                </a>
                <?php if ($contact) :?>
                <a href="<?php echo do_shortcode($contact) ?>" class="minimal-btn cyan-border fw-semi-bold text-flourescent_blue lh-20 text-decoration-none radius-4 d-inline-flex align-items-center gap-2">
                    <span>Kontakt</span>
                    <span class="">
                        <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5117 3.82164L6.93425 0.244141L5.75591 1.42247L8.50008 4.16664H0.166748V5.83331H8.50008L5.75591 8.57747L6.93425 9.75581L10.5117 6.17831C10.8242 5.86576 10.9997 5.44191 10.9997 4.99997C10.9997 4.55803 10.8242 4.13419 10.5117 3.82164V3.82164Z" fill="#00F5EB" />
                        </svg>
                    </span>
                </a>
                <?php endif?>
            </div>
            <!-- Common Buttons -/ End -->


        </div>
    </div>
</section>
<!--/ Banner -->
<?php get_footer() ?>
