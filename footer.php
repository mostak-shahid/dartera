    <!-- Footer section -/Start -->
    <footer class="footer <?php echo carbon_get_theme_option( 'mos-footer-class' ) ?>">
        <div class="container position-relative">
            <!-- Fooetr top -/Start -->
            <div class="footer-top">
                <div class="row">
                    <div class="newsletter text-center">
                        <?php if (carbon_get_theme_option( 'mos-widgets-newsletter-title' )) : ?>
                        <h4 class="fs-30 fw-bold text-white mb-2 wow fadeInUp delay-0ms">
                            <?php echo carbon_get_theme_option( 'mos-widgets-newsletter-title' ) ?>
                        </h4>
                        <?php endif?>
                        <?php if (carbon_get_theme_option( 'mos-widgets-newsletter-intro' )) : ?>
                        <div class="text-dark_6 wow fadeInUp delay-250ms">
                            <?php echo do_shortcode(carbon_get_theme_option( 'mos-widgets-newsletter-intro' )) ?>
                        </div>
                        <?php endif?>
                        <?php if (carbon_get_theme_option( 'mos-widgets-newsletter-shortcode' )) : ?>
                        <div class="subscribe-box mt-3 position-relative wow fadeInUp delay-500ms">
                            <?php echo do_shortcode(carbon_get_theme_option( 'mos-widgets-newsletter-shortcode' )) ?>
                        </div>
                        <?php endif?>
                    </div>
                </div>
            </div>
            <!-- Fooetr top -/End -->

            <!-- Fooetr Main -/Start -->
            <div class="footer-main">
                <div class="row">

                    <div class="col-sm-6 col-lg-3 mb-lg-0 mb-5 wow fadeInLeft delay-0ms">
                        <div class="footer-widget">                            
                        <?php $logo = carbon_get_theme_option( 'mos-logo' ) ?>
                        <?php if ($logo) : ?> 
                        <a class="site-logo mb-30 d-inline-block" href="<?php echo home_url() ?>"><?php echo wp_get_attachment_image($logo, "full", "", array( "class" => "img-responsive img-fluid" ) );?></a>              
                        <?php endif?>
                        <?php $socials = carbon_get_theme_option( 'mos-contact-social-media' ) ?>
                            <?php if ($socials and sizeof($socials)) :?>
                            
                                <ul class="widget-list list-unstyled m-0 d-flex flex-wrap gap-lg-4 gap-3">
                                    <?php foreach($socials as $social) : ?>
                                    <li class="widget-list-item pb-0 <?php echo sanitize_title($social['title'])?>-item">
                                        <a href="<?php echo $social['link']?>" class="text-decoration-none text-white fs-6 d-flex align-items-center" <?php if ($social['new-tab']) echo ' target="_blank"' ?>>
                                            <span class="pe-2 me-1 ">
                                                <img src="<?php echo get_template_directory_uri()?>/assets/img/<?php echo sanitize_title($social['title'])?>-white.svg" alt="LinkedIn" class="img-fluid">
                                            </span>
                                            <span class="widget-list-item-hover position-relative mt-1">
                                                <?php echo $social['title']?>
                                            </span>
                                        </a>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            
                            <?php endif?>
                        </div>
                        <div class="default-widgets">
                            <?php if ( is_active_sidebar( "footer_1" ) ) : ?>
                            <?php dynamic_sidebar( "footer_1" ); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-lg-0 mb-5 wow fadeInLeft delay-250ms">
                        <div class="footer-widget">
                            <?php if (carbon_get_theme_option( 'mos-widgets-newsletter-col-2-title' )) : ?>
                            <h6 class="footer-widget-heading fw-semi-bold text-cyan text-uppercase lt-space-05 pb-4 mb-1"><?php echo carbon_get_theme_option( 'mos-widgets-newsletter-col-2-title' ) ?></h6>
                            <?php endif?>
                            
                            <ul class="widget-list list-unstyled m-0">
                            <?php
                            $phones = carbon_get_theme_option( 'mos-contact-phone' ); 
                            $emails = carbon_get_theme_option( 'mos-contact-email' );
                            ?>
                            <?php if($phones && sizeof($phones)) : ?>
                            <li class="widget-list-item">
                                <a href="tel:<?php echo preg_replace("/\s+/", "", $phones[0]['number'])?>" class="text-decoration-none text-white fs-5 d-flex align-items-center">
                                    <span class="pe-2 me-1 ">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 13.42V16.956C18.0001 17.2092 17.9042 17.453 17.7316 17.6382C17.559 17.8234 17.3226 17.9363 17.07 17.954C16.633 17.984 16.276 18 16 18C7.163 18 0 10.837 0 2C0 1.724 0.015 1.367 0.046 0.93C0.06372 0.67744 0.17658 0.44101 0.3618 0.26841C0.54703 0.0958102 0.79082 -0.000109725 1.044 2.74852e-07H4.58C4.70404 -0.000129725 4.8237 0.0458602 4.91573 0.12902C5.00776 0.21218 5.0656 0.32658 5.078 0.45C5.101 0.68 5.122 0.863 5.142 1.002C5.34073 2.38892 5.748 3.73783 6.35 5.003C6.445 5.203 6.383 5.442 6.203 5.57L4.045 7.112C5.36445 10.1865 7.8145 12.6365 10.889 13.956L12.429 11.802C12.4919 11.714 12.5838 11.6509 12.6885 11.6237C12.7932 11.5964 12.9042 11.6068 13.002 11.653C14.267 12.2539 15.6156 12.6601 17.002 12.858C17.141 12.878 17.324 12.9 17.552 12.922C17.6752 12.9346 17.7894 12.9926 17.8724 13.0846C17.9553 13.1766 18.0012 13.2961 18.001 13.42H18Z"
                                                fill="#00BAEB" />
                                        </svg>
                                    </span>
                                    <span class="widget-list-item-hover position-relative">
                                        <?php echo $phones[0]['number']?>
                                    </span>
                                </a>
                            </li>
                            <?php endif?>
                            <?php if($emails && sizeof($emails)) : ?>
                            <li class="widget-list-item pb-0">
                                <a href="mailto:hey@dartera.ch"
                                    class="text-decoration-none text-white fs-5 d-flex align-items-center">
                                    <span class="pe-2 me-1 ">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.25722 3.49696C0.4979 3.80069 0 4.53611 0 5.35392V16.9999C0 18.1045 0.89543 18.9999 2 18.9999H18C19.1046 18.9999 20 18.1045 20 16.9999V5.35392C20 4.53611 19.5021 3.80069 18.7428 3.49696L11.1142 0.445525C10.3989 0.159435 9.6011 0.159435 8.8858 0.445525L1.25722 3.49696ZM4.70711 7.29274C4.31658 6.90222 3.68342 6.90222 3.29289 7.29274C2.90237 7.68327 2.90237 8.31645 3.29289 8.70695L7.87868 13.2928C9.0503 14.4644 10.9497 14.4644 12.1213 13.2928L16.7071 8.70695C17.0976 8.31645 17.0976 7.68327 16.7071 7.29274C16.3166 6.90222 15.6834 6.90222 15.2929 7.29274L10.7071 11.8786C10.3166 12.2691 9.6834 12.2691 9.2929 11.8786L4.70711 7.29274Z"
                                                fill="#00BAEB" />
                                        </svg>
                                    </span>
                                    <span class="widget-list-item-hover position-relative">
                                        <?php echo $emails[0]['email']?>
                                    </span>
                                </a>
                            </li>
                            <?php endif?>
                            </ul>
                        </div>
                        <div class="default-widgets">
                            <?php if ( is_active_sidebar( "footer_2" ) ) : ?>
                            <?php dynamic_sidebar( "footer_2" ); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-lg-0 mb-5 wow fadeInLeft delay-500ms">
                        <div class="footer-widget">
                            <?php if (carbon_get_theme_option( 'mos-widgets-newsletter-col-3-title' )) : ?>
                            <h6 class="footer-widget-heading fw-semi-bold text-cyan text-uppercase lt-space-05 pb-4 mb-1"><?php echo carbon_get_theme_option( 'mos-widgets-newsletter-col-3-title' ) ?></h6>
                            <?php endif?>
                            <ul class="widget-list list-unstyled m-0">
                               <?php $address = carbon_get_theme_option( 'mos-contact-contact-address' );?>
                                <?php if($address && sizeof($address)) : ?>
                                <li class="widget-list-item pb-0">
                                    <p class="text-white mb-0 fs-5">
                                        <?php if ($address[0]['link']) :?>
                                        <a href="<?php echo $address[0]['link'] ?>" target="_blank"><?php echo $address[0]['address'] ?></a>
                                        <?php echo $address[0]['address'] ?>
                                        <?php else : ?>
                                        <?php echo $address[0]['address'] ?>
                                        <?php endif?>
                                    </p>
                                </li>
                                <?php endif?>
                            </ul>
                        </div>                        
                        <div class="default-widgets">
                            <?php if ( is_active_sidebar( "footer_3" ) ) : ?>
                            <?php dynamic_sidebar( "footer_3" ); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 mb-lg-0 mb-5 wow fadeInLeft delay-750ms">
                        <div class="footer-widget">
                            <?php if (carbon_get_theme_option( 'mos-widgets-newsletter-col-4-title' )) : ?>
                            <h6 class="footer-widget-heading fw-semi-bold text-cyan text-uppercase lt-space-05 pb-4 mb-1"><?php echo carbon_get_theme_option( 'mos-widgets-newsletter-col-4-title' ) ?></h6>
                            <?php endif?>
                            
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'widgetmenu',
                                'container' => false,
                                'menu_class' => 'widget-list list-unstyled m-0 widgetmenu', 
                                'depth' => 1,
                            ));          
                            ?>
                        </div>
                        <div class="default-widgets">
                            <?php if ( is_active_sidebar( "footer_4" ) ) : ?>
                            <?php dynamic_sidebar( "footer_4" ); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Fooetr Main -/End -->

            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-12 col-xl-5 text-xl-start text-center wow fadeInLeft delay-250ms">
                        <div class="text-white fw-medium">
                            <?php echo do_shortcode(carbon_get_theme_option( 'mos-footer-content' )); ?>
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 text-xl-end text-center wow fadeInRight delay-250ms">
                        
                        <div class="footer-button-wrapper d-flex flex-wrap align-items-center justify-content-xl-end justify-content-center mt-xl-0 mt-4 gap-4">
                            
                            <?php $footer_buttons = carbon_get_theme_option( 'mos-footer-buttons' ) ?>
                            <?php if($footer_buttons && sizeof($footer_buttons)) : ?>
                                <?php foreach($footer_buttons as $footer_button) : ?>                        
                                    
                                    <div class="footer-common-btn">
                                        <a href="<?php echo $footer_button['link']?>" class="radius-8 text-white text-decoration-none w-100 d-flex align-items-center justify-content-between"  <?php if ($footer_button['new-tab']) echo ' target="_blank"' ?>>
                                            <span class="fw-bold ">
                                                <?php echo $footer_button['title']?>
                                            </span>
                                            <span>
                                                <svg width="12" height="11" viewBox="0 0 12 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.22446 0.214993L3.28476 0.214992L3.28476 2.17137L7.84088 2.17137L0.922998 9.08926L2.30658 10.4728L9.22446 3.55495L9.22446 8.11107L11.1808 8.11107L11.1808 2.17137C11.1808 1.65253 10.9746 1.15496 10.6077 0.78809C10.2409 0.421214 9.7433 0.215072 9.22446 0.214993V0.214993Z"
                                                        fill="#385470" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    
                                <?php endforeach;?>
                            <?php endif?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer section -/End -->
    <?php get_template_part( 'template-parts/sidebar', '' ) ?>
<?php 
$btt_enable = carbon_get_theme_option('mos-back-to-top');
$btt_image = carbon_get_theme_option('mos-back-to-top-image');
$btt_background = carbon_get_theme_option('mos-back-to-top-background');
$btt_class = carbon_get_theme_option('mos-back-to-top-class');
if($btt_enable) :
?>
<div id="btt-btn" class="scrollup <?php echo $btt_class ?>" onclick="backToTop()">
    <?php if ($btt_image): ?>
    <?php echo wp_get_attachment_image( $btt_image, 'full' );  ?>
    <?php else : ?>
    <i class="fa fa-angle-up"></i>
    <?php endif?>
</div>
<?php endif?>
<?php wp_footer();?>
<!--Theme Options CSS-->
<style>
    body {
        background-color: <?php echo carbon_get_theme_option('mos_body_bg') ? 'var(--mos-body-bg)' : 'var(--bs-body-bg)' ?>;
        color: <?php echo carbon_get_theme_option('mos_content_color') ? 'var(--mos-content-color)' : 'var(--bs-body-color)' ?>;
    }
    a {color: <?php echo carbon_get_theme_option('mos_link_color') ? carbon_get_theme_option('mos_link_color') : 'var(--bs-link-color)' ?>;}
    a:hover {color: <?php echo carbon_get_theme_option('mos_link_hover_color') ? carbon_get_theme_option('mos_link_hover_color') : 'var(--bs-link-hover-color)' ?>;}
    <?php $header_background=carbon_get_theme_option('mos-header-background');

    ?>.main-header {
        <?php if(carbon_get_theme_option('mos-header-content-color')): ?> color: <?php echo carbon_get_theme_option('mos-header-content-color') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-header-padding')): ?> padding: <?php echo carbon_get_theme_option('mos-header-padding') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-header-margin')): ?> margin: <?php echo carbon_get_theme_option('mos-header-margin') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-header-border')): ?> border: <?php echo carbon_get_theme_option('mos-header-border') ?>; <?php endif?> <?php if(@$header_background && sizeof($header_background)): ?> <?php foreach($header_background as $value): ?> <?php //var_dump($value) ?>
            <?php foreach($value as $key=> $val): ?> <?php if ($key !='background-image'&& $key !='_type'): ?> <?php echo $val? $key . ':'. $val . ';':''?> <?php elseif ($key=='background-image'): ?> <?php echo $val ? $key . ':url('. wp_get_attachment_url($val) . ');':''?> <?php endif?> <?php endforeach?> <?php endforeach?> <?php endif?>
    }

    <?php if(carbon_get_theme_option('mos-header-link-color')) : ?>.main-header a {
        color: <?php echo carbon_get_theme_option('mos-header-link-color') ?>
    }

    <?php endif?><?php if(carbon_get_theme_option('mos-header-link-color-hover')) : ?>.main-header a:hover {
        color: <?php echo carbon_get_theme_option('mos-header-link-color-hover') ?>
    }

    <?php endif?><?php $footer_background=carbon_get_theme_option('mos-footer-background');

    ?>.footer {
        <?php if(carbon_get_theme_option('mos-footer-content-color')): ?> color: <?php echo carbon_get_theme_option('mos-footer-content-color') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-footer-padding')): ?> padding: <?php echo carbon_get_theme_option('mos-footer-padding') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-footer-margin')): ?> margin: <?php echo carbon_get_theme_option('mos-footer-margin') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-footer-border')): ?> border: <?php echo carbon_get_theme_option('mos-footer-border') ?>; <?php endif?> <?php if(@$footer_background && sizeof($footer_background)): ?> <?php foreach($footer_background as $value): ?> <?php //var_dump($value) ?>
            <?php foreach($value as $key=> $val): ?> <?php if ($key !='background-image'&& $key !='_type'): ?> <?php echo $val? $key . ':'. $val . ';':''?> <?php elseif ($key=='background-image'): ?> <?php echo $val ? $key . ':url('. wp_get_attachment_url($val) . ');':''?> <?php endif?> <?php endforeach?> <?php endforeach?> <?php endif?>
    }

    <?php if(carbon_get_theme_option('mos-footer-link-color')) : ?>.footer a {
        color: <?php echo carbon_get_theme_option('mos-footer-link-color') ?>
    }

    <?php endif?><?php if(carbon_get_theme_option('mos-footer-link-color-hover')) : ?>.footer a:hover {
        color: <?php echo carbon_get_theme_option('mos-footer-link-color-hover') ?>
    }
    <?php endif?>    
</style>
    <?php if (carbon_get_theme_option( 'mos_plugin_wow' ) == 'on') : ?>
    <script>new WOW().init();</script>
    <?php endif?>
    
    <?php if (carbon_get_theme_option( 'mos_plugin_owlcarousel' ) == 'on') : ?>
    <script>
        jQuery(document).ready(function($) {
            $('body').find('.mos-owl-carousel').each(function( e ) {            
                var oc = $(this);
                var ocOptions = oc.data('carousel-options');
                var defaults = {
                    loop: true,
                    nav: false,
                    autoplay: true,
                }
                oc.owlCarousel($.extend(defaults, ocOptions));
            });
        });
    </script>
    <?php endif?>

</body>

</html>
