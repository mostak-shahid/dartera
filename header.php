<?php 
if (is_home()) $page_id = get_option( 'page_for_posts' );
elseif (is_front_page()) $page_id = get_option('page_on_front');
else $page_id = get_the_ID();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en-US"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->
<!--<![endif]-->
<!--[if gte IE 9] <style type="text/css"> .gradient {filter: none;}</style><![endif]-->
<!--[if !IE]><html lang="en"><![endif]-->
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->
    <style>
    :root {
        --mos-body-bg: <?php echo carbon_get_theme_option( 'mos_body_bg' )?carbon_get_theme_option( 'mos_body_bg' ):'#fff'?>;       
        --mos-primary-color: <?php echo carbon_get_theme_option( 'mos_primary_color' )?carbon_get_theme_option( 'mos_primary_color' ):'#00f5eb'?>;            
        --mos-secondary-color: <?php echo carbon_get_theme_option( 'mos_secondary_color' )?carbon_get_theme_option( 'mos_secondary_color' ):'#21fff6'?>;            
        --mos-content-color: <?php echo carbon_get_theme_option( 'mos_content_color' )?carbon_get_theme_option( 'mos_content_color' ):'#212529'?>;       
    }    
    </style>
    <?php wp_head(); ?>
    <script>
        function hideLoader() {
            console.log(0);
            //document.querySelector(".se-pre-con").style.display = "none";
            document.getElementById("page-loader").classList.add("d-none");
        }
    </script>
</head>

<body <?php body_class(); ?> <?php if (carbon_get_theme_option( 'mos-page-loader' ) == 'on') : ?> onload='document.getElementById("page-loader").classList.add("d-none")' <?php endif?>>
    <?php if (carbon_get_theme_option( 'mos-page-loader' ) == 'on') : ?>
    <div id="page-loader" class="se-pre-con position-fixed top-0 start-0 bottom-0 end-0 d-flex justify-content-center align-items-center <?php echo carbon_get_theme_option( 'mos-page-loader-class' )?>" <?php if (carbon_get_theme_option( 'mos-page-loader-background' )) echo 'style="background-color:'.carbon_get_theme_option( 'mos-page-loader-background' ).'"' ?>>
        <?php if(carbon_get_theme_option( 'mos-page-loader-image' )): ?>
        <?php echo wp_get_attachment_image( carbon_get_theme_option( 'mos-page-loader-image' ), 'full', "", array( "class" => "loading-image" ) );  ?>
        <div class="rotating-border"></div>
        <?php else: ?>
        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
        <?php endif?>
    </div>
    <?php endif; ?>    
    <!-- header -/Start -->
    <header id="header" class="main-header smooth <?php echo carbon_get_theme_option( 'mos-header-class' ) ?>">
        <!-- navbar -/Start -->
        <div class="header">
            <div class="container-fluid p-0">
                <nav class="menu-area navbar py-0 navbar-expand-xxl py-2">
                    <div class="container-fluid">
                        <?php $logo = carbon_get_theme_option( 'mos-logo' ) ?>
                        <?php if ($logo) : ?> 
                        <a class="navbar-brand theme-logo" href="<?php echo home_url() ?>"><?php echo wp_get_attachment_image($logo, "full", "", array( "class" => "img-responsive img-fluid" ) );?></a>                       
                        <?php endif?>
                        <?php $phones = carbon_get_theme_option('mos-contact-phone'); ?>
                        <div class="d-xxl-none d-flex align-items-center ms-auto gap-sm-3 gap-2 contactInfo px-0 me-2">
                            <div class="nav-item dropdown language pe-2">
                                <a class="nav-link text-light_white py-xxl-4 py-2 px-0 mx-0 dropdown-toggle fs-14 fw-bold text-uppercase"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <!-- Deutsch -->
                                    <img src="<?php echo get_template_directory_uri()?>/assets/img/language.png" class="img-fluid language-icon" alt="">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end fade-down all-language ">
                                    <li>
                                        <a class="dropdown-item text-light_white fs-14 fw-bold text-uppercase" href="#">
                                            English
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-light_white fs-14 fw-bold text-uppercase" href="#">
                                            Hindi
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-light_white fs-14 fw-bold text-uppercase" href="#">
                                            Bangla
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <?php if($phones && sizeof($phones)) : ?>
                            <a href="tel:<?php echo preg_replace("/\s+/", "", $phones[0]['number'])?>" class=" text-decoration-none phone text-white fs-5">
                                <span><img src="<?php echo get_template_directory_uri()?>/assets/img/call.svg" class="img-fluid" alt="call"></span>
                            </a>
                            <?php endif?>
                            <a href="#" class=" text-decoration-none phone text-white fs-5">
                                <span><img src="<?php echo get_template_directory_uri()?>/assets/img/appointment.png" class="img-fluid appointment"
                                        alt="appointment"></span>
                            </a>
                            <!-- <button type="button" class="nav-btn px-4 border-0 fs-6 fw-semi-bold text-gray_1">
                                Termin vereinbaren
                            </button> -->
                        </div>


                        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#nav-toggle" aria-controls="nav-toggle" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span><img src="<?php echo get_template_directory_uri()?>/assets/img/menu.png" class="img-fluid" alt=""></span>
                        </button>



                        <div class="collapse navbar-collapse" id="nav-toggle">
                            <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'mainmenu',
                                'depth'             => 2,
                                'container'         => false,
//                                'container_class'   => 'collapse navbar-collapse',
//                                'container_id'      => 'navbarText',
                                'menu_class'        => 'mos-main-menu menu navbar-nav mx-auto mb-2 mb-lg-0',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                            ));
                            ?>
                            


                            <div class="nav-right d-flex align-items-center">
                                <div class="nav-item dropdown language pe-2 d-xxl-block d-none">
                                    <a class="nav-link text-light_white py-xxl-4 py-2 px-0 mx-3 dropdown-toggle fs-14 fw-bold text-uppercase"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Deutsch
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end fade-down all-language ">
                                        <li>
                                            <a class="dropdown-item text-light_white fs-14 fw-bold text-uppercase"
                                                href="#">
                                                English
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-light_white fs-14 fw-bold text-uppercase"
                                                href="#">
                                                Hindi
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-light_white fs-14 fw-bold text-uppercase"
                                                href="#">
                                                Bangla
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="d-xxl-flex d-none align-items-center gap-4 contactInfo px-4">
                                    <?php if($phones && sizeof($phones)) : ?>
                                    <a href="tel:<?php echo preg_replace("/\s+/", "", $phones[0]['number'])?>" class=" text-decoration-none phone text-white fs-5">
                                        <span><img src="<?php echo get_template_directory_uri()?>/assets/img/call.svg" class="img-fluid" alt="call"></span>
                                        <?php echo $phones[0]['number']?>
                                    </a>
                                    <?php endif?>
                                    <button type="button" class="nav-btn px-4 border-0 fs-6 fw-semi-bold text-gray_1">
                                        Termin vereinbaren
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- navbar -/End -->
    </header>
    <!--/ header -/End -->

    
