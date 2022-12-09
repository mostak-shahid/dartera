    <div class="contact-toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
        <img src="<?php echo get_template_directory_uri()?>/assets/img/banner-click.png" class="img-fluid" alt="contact toggle">
    </div>
    <!-- sidebar1 -->
    <div class="nav-sidebar">
        <div class="offcanvas offcanvas-end p-2" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <?php if (carbon_get_theme_option('mos-sidebar-title')) : ?>
                <h5 class="offcanvas-title fs-30 fw-bold text-gray_1" id="offcanvasWithBothOptionsLabel"><?php echo carbon_get_theme_option('mos-sidebar-title')?></h5>
                <?php endif?>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <?php
                $phones = carbon_get_theme_option('mos-contact-phone'); 
                $emails = carbon_get_theme_option('mos-contact-email');
                ?>                
                <div class="offcanvas-body-top">
                    <?php if (carbon_get_theme_option('mos-sidebar-subtitle')) : ?>
                    <p class="fs-6 text-lapis_lazuli fw-bold"><?php echo carbon_get_theme_option('mos-sidebar-subtitle')?></p>
                    <?php endif?>
                    <?php if($phones && sizeof($phones)) : ?>
                    <a href="tel:<?php echo preg_replace("/\s+/", "", $phones[0]['number'])?>" class="text-decoration-none d-flex align-items-center gap-2 mb-2">
                        <img src="<?php echo get_template_directory_uri()?>/assets/img/call1.png" class="img-fluid" alt="call">
                        <p class="text-gray_2 fs-5 mb-0"><?php echo $phones[0]['number']?></p>
                    </a>
                    <?php endif?>
                    <?php if($emails && sizeof($emails)) : ?>
                    <a href="mailto:<?php echo $emails[0]['email']?>" class="text-decoration-none d-flex align-items-center gap-2">
                        <img src="<?php echo get_template_directory_uri()?>/assets/img/email1.png" class="img-fluid" alt="call">
                        <p class="text-gray_2 fs-5 mb-0"><?php echo $emails[0]['email']?></p>
                    </a>
                    <?php endif?>
                </div>
                <div class="offcanvas-body-bottom">
                    <?php if (carbon_get_theme_option('mos-sidebar-button-1-title') && carbon_get_theme_option('mos-sidebar-button-1-url')) : ?>
                    <div class="nav-sidebar-item d-flex align-items-center gap-2 justify-content-between mb-3 position-relative">
                        <div class="sidebar-left d-flex align-items-center gap-3">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/sidebar.svg" class="img-fluid" alt="sidebarlogo">
                            <p class="pb-0 text-gray_3 fs-18 fw-bold mb-0"><?php echo carbon_get_theme_option('mos-sidebar-button-1-title') ?></p>
                        </div>
                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.4142 4.58597L8.12115 0.292969L6.70715 1.70697L10.0002 4.99997H0.000152588V6.99997H10.0002L6.70715 10.293L8.12115 11.707L12.4142 7.41397C12.7891 7.03891 12.9997 6.5303 12.9997 5.99997C12.9997 5.46964 12.7891 4.96102 12.4142 4.58597V4.58597Z"
                                fill="#B3CFE4" />
                        </svg>
                        <a href="<?php echo carbon_get_theme_option('mos-sidebar-button-1-url') ?>" class="hidden-link">Read More</a>
                    </div>
                    <?php endif?>
                    <?php if (carbon_get_theme_option('mos-sidebar-button-2-title')) : ?>
                    <div class="nav-sidebar-item d-flex align-items-center gap-2 justify-content-between mb-3"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions2"
                        aria-controls="offcanvasWithBothOptions">
                        <div class="sidebar-left d-flex align-items-center gap-3">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/sidebar2.svg" class="img-fluid" alt="sidebarlogo">
                            <p class="pb-0 text-gray_3 fs-18 fw-bold mb-0"><?php echo carbon_get_theme_option('mos-sidebar-button-2-title') ?></p>
                        </div>
                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.4142 4.58597L8.12115 0.292969L6.70715 1.70697L10.0002 4.99997H0.000152588V6.99997H10.0002L6.70715 10.293L8.12115 11.707L12.4142 7.41397C12.7891 7.03891 12.9997 6.5303 12.9997 5.99997C12.9997 5.46964 12.7891 4.96102 12.4142 4.58597V4.58597Z"
                                fill="#B3CFE4" />
                        </svg>

                    </div>                    
                    <?php endif?>
                    <?php if (carbon_get_theme_option('mos-sidebar-button-3-title')) : ?>
                    <div class="nav-sidebar-item d-flex align-items-center gap-2 justify-content-between mb-3"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions3"
                        aria-controls="offcanvasWithBothOptions">
                        <div class="sidebar-left d-flex align-items-center gap-3">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/sidebar4.svg" class="img-fluid" alt="sidebarlogo">
                            <p class="pb-0 text-gray_3 fs-18 fw-bold mb-0"><?php echo carbon_get_theme_option('mos-sidebar-button-3-title') ?></p>
                        </div>
                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.4142 4.58597L8.12115 0.292969L6.70715 1.70697L10.0002 4.99997H0.000152588V6.99997H10.0002L6.70715 10.293L8.12115 11.707L12.4142 7.41397C12.7891 7.03891 12.9997 6.5303 12.9997 5.99997C12.9997 5.46964 12.7891 4.96102 12.4142 4.58597V4.58597Z"
                                fill="#B3CFE4" />
                        </svg>

                    </div>          
                    <?php endif?>
                    <?php if (carbon_get_theme_option('mos-sidebar-button-4-title') && carbon_get_theme_option('mos-sidebar-button-4-url')) : ?>
                    <div class="nav-sidebar-item d-flex align-items-center gap-2 justify-content-between mb-3 position-relative">
                        <div class="sidebar-left d-flex align-items-center gap-3">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/sidebar5.svg" class="img-fluid" alt="sidebarlogo">
                            <p class="pb-0 text-gray_3 fs-18 fw-bold mb-0"><?php echo carbon_get_theme_option('mos-sidebar-button-4-title') ?></p>
                        </div>
                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.4142 4.58597L8.12115 0.292969L6.70715 1.70697L10.0002 4.99997H0.000152588V6.99997H10.0002L6.70715 10.293L8.12115 11.707L12.4142 7.41397C12.7891 7.03891 12.9997 6.5303 12.9997 5.99997C12.9997 5.46964 12.7891 4.96102 12.4142 4.58597V4.58597Z"
                                fill="#B3CFE4" />
                        </svg>
                        <a href="<?php echo carbon_get_theme_option('mos-sidebar-button-4-url') ?>" class="hidden-link">Read More</a>
                    </div>                              
                    <?php endif?>
                </div>
            </div>
        </div>
    </div>
    <!--/ sidebar1 -->


    <!-- sidebar2 -->
    <div class="nav-sidebar">
        <div class="offcanvas offcanvas-end p-2" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions2"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header d-block">
                <a href="#" class="d-block text-lapis_lazuli fs-6 text-decoration-none" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <svg class="me-1" width="11" height="10" viewBox="0 0 11 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.8332 4.16664H2.49987L5.24403 1.42247L4.0657 0.244141L0.488199 3.82164C0.175747 4.13419 0.000221252 4.55803 0.000221252 4.99997C0.000221252 5.44191 0.175747 5.86576 0.488199 6.17831L4.0657 9.75581L5.24403 8.57747L2.49987 5.83331H10.8332V4.16664Z"
                            fill="#015EA5" />
                    </svg>

                    Zurück
                </a>
                <?php if (carbon_get_theme_option('mos-sidebar-2-title')) : ?>
                <h5 class="offcanvas-title fs-30 fw-bold text-gray_1 mt-3" id="offcanvasWithBothOptionsLabel"><?php echo carbon_get_theme_option('mos-sidebar-2-title')?></h5>
                <?php endif?>
                <?php if (carbon_get_theme_option('mos-sidebar-2-subtitle')) : ?>
                <p class="fs-14 text-gray_2 mt-2"><?php echo carbon_get_theme_option('mos-sidebar-2-subtitle')?></p>
                <?php endif?>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <?php if (carbon_get_theme_option('mos-sidebar-2-shortcode')) : ?>
            <div class="offcanvas-body">
                <?php echo do_shortcode(carbon_get_theme_option('mos-sidebar-2-shortcode'))?>
            </div>
            <?php endif?>
        </div>
    </div>
    <!--/ sidebar2 -->


    <!-- sidebar3 -->
    <div class="nav-sidebar">
        <div class="offcanvas offcanvas-end p-2" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions3"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header d-block">
                <a href="#" class="d-block text-lapis_lazuli fs-6 text-decoration-none" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <svg class="me-1" width="11" height="10" viewBox="0 0 11 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.8332 4.16664H2.49987L5.24403 1.42247L4.0657 0.244141L0.488199 3.82164C0.175747 4.13419 0.000221252 4.55803 0.000221252 4.99997C0.000221252 5.44191 0.175747 5.86576 0.488199 6.17831L4.0657 9.75581L5.24403 8.57747L2.49987 5.83331H10.8332V4.16664Z"
                            fill="#015EA5" />
                    </svg>

                    Zurück
                </a>
                <?php if (carbon_get_theme_option('mos-sidebar-3-title')) : ?>
                <h5 class="offcanvas-title fs-30 fw-bold text-gray_1 mt-3" id="offcanvasWithBothOptionsLabel"><?php echo carbon_get_theme_option('mos-sidebar-3-title')?></h5>
                <?php endif?>
                <?php if (carbon_get_theme_option('mos-sidebar-3-subtitle')) : ?>
                <p class="fs-14 text-gray_2 mt-2"><?php echo carbon_get_theme_option('mos-sidebar-3-subtitle')?></p>
                <?php endif?>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <?php if (carbon_get_theme_option('mos-sidebar-3-shortcode')) : ?>
            <div class="offcanvas-body">
                <?php echo do_shortcode(carbon_get_theme_option('mos-sidebar-3-shortcode'))?>
            </div>
            <?php endif?>
        </div>
    </div>
    <!--/ sidebar3 -->


    <!-- Custom Right Click Context Menue start  -->
    <div class="context-menu">
        <div class="menu-header">
            <h6 class="text-gray_1 fw-semi-bold mb-2">
                <span class="me-1">
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_12195_82889)">
                            <path
                                d="M24.7651 25.5984C26.781 24.0432 27.8462 21.4914 27.8462 18.1723C27.8462 12.8906 25.1027 7.05786 21.1751 4.40234H12.2413C8.31376 7.05786 5.57031 12.8906 5.57031 18.1723C5.57031 21.9446 6.94614 24.7261 9.52955 26.1793L24.7651 25.5984Z"
                                fill="#F0C419" />
                            <path
                                d="M9.26928 26.0218C6.85411 24.5387 5.57031 21.8129 5.57031 18.1725C5.56997 17.4114 5.62483 16.6512 5.73445 15.898C7.27031 15.8805 8.91756 18.4305 9.48031 21.7894C9.80098 23.1927 9.72795 24.6574 9.26928 26.0218Z"
                                fill="#F29C1F" />
                            <path
                                d="M8.00781 4.99448L10.6809 4.40241L12.0175 4.10345L13.7761 6.44828L16.7071 4.68966L19.6382 6.44828L21.3968 4.10345L22.7333 4.40241L25.4064 4.99448C25.2071 4.73655 25.0019 4.48448 24.785 4.23828C22.534 1.64724 19.7378 0 16.7071 0C13.6764 0 10.8802 1.64724 8.62919 4.23828C8.4123 4.48448 8.20712 4.73655 8.00781 4.99448Z"
                                fill="#955BA5" />
                            <path
                                d="M10.8472 22.2757L8.50234 24.0343L4.9851 20.5171L3.41406 22.0881C4.4751 29.7557 10.0265 33.9999 16.7092 33.9999C23.392 33.9999 28.9434 29.7557 30.0044 22.0881L28.4334 20.5171L24.9161 24.0343L22.5713 22.2757L19.6403 25.2067L16.7092 22.8619L13.7782 25.2067L10.8472 22.2757Z"
                                fill="#955BA5" />
                            <path
                                d="M12.6021 13.483C13.2496 13.483 13.7745 12.9581 13.7745 12.3106C13.7745 11.6631 13.2496 11.1382 12.6021 11.1382C11.9546 11.1382 11.4297 11.6631 11.4297 12.3106C11.4297 12.9581 11.9546 13.483 12.6021 13.483Z"
                                fill="#002448" />
                            <path
                                d="M20.899 13.483C21.5465 13.483 22.0714 12.9581 22.0714 12.3106C22.0714 11.6631 21.5465 11.1382 20.899 11.1382C20.2515 11.1382 19.7266 11.6631 19.7266 12.3106C19.7266 12.9581 20.2515 13.483 20.899 13.483Z"
                                fill="#002448" />
                            <path
                                d="M16.7117 17.5861C17.8842 16.9999 18.4704 15.2413 18.4704 15.2413C17.9357 14.7782 17.3448 14.3843 16.7117 14.0688C16.0787 14.3843 15.4878 14.7782 14.9531 15.2413C14.9531 15.2413 15.5393 16.9999 16.7117 17.5861Z"
                                fill="#E57E25" />
                            <path
                                d="M26.3409 30.0839C23.8099 32.6647 20.3233 34.0822 16.7095 33.9998C13.0957 34.0822 9.60911 32.6647 7.07812 30.0839L9.67502 28.1377L12.0198 29.8963L14.3647 28.1377L16.7095 29.8963L19.0543 28.1377L21.3992 29.8963L23.744 28.1377L26.3409 30.0839Z"
                                fill="#894B9D" />
                        </g>
                        <defs>
                            <clipPath id="clip0_12195_82889">
                                <rect width="34" height="34" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </span>
                Sie haben mich gefunden 🐣
            </h6>
            <p class="text-gray_3 fs-14 mb-0">Klicken Sie auf mich, um mich glücklich zu machen</p>
        </div>
        <ul class="menu-options list-unstyled mb-0">
            <li class="menu-option">
                <span class="d-flex justify-content-center align-items-center gap-2">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_12199_87189)">
                            <path
                                d="M10.4974 2.96683L7.53056 0H2.91406C2.44993 0 2.00481 0.184374 1.67663 0.512563C1.34844 0.840752 1.16406 1.28587 1.16406 1.75V11.6667H10.4974V2.96683ZM2.33073 10.5V1.75C2.33073 1.59529 2.39219 1.44692 2.50158 1.33752C2.61098 1.22812 2.75935 1.16667 2.91406 1.16667H6.9974V3.5H9.33073V10.5H2.33073ZM12.8307 5.25V14H4.08073V12.8333H11.6641V4.08333L12.8307 5.25Z"
                                fill="#003A75" />
                        </g>
                        <defs>
                            <clipPath id="clip0_12199_87189">
                                <rect width="14" height="14" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    Kopieren
                </span>
                <span>
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.76726 0.55836C3.87234 0.771641 2.26179 1.8982 1.42234 3.59625C0.0742934 6.32242 1.23093 9.62281 3.99812 10.9408C5.11101 11.4713 6.41804 11.6052 7.57742 11.3072C8.3157 11.1185 9.07039 10.7357 9.72937 10.2189C10.1477 9.89078 10.8696 9.09234 11.0911 8.71227L11.1403 8.63024L10.5032 8.22555C10.1559 8.00406 9.80593 7.78258 9.72937 7.73336L9.58718 7.64313L9.41218 7.88102C8.4825 9.1443 7.23289 9.81422 6.0325 9.69391C4.43836 9.53258 3.13679 8.34859 2.78679 6.73805C2.71843 6.42906 2.70476 5.77008 2.75672 5.45289C2.93718 4.34547 3.56336 3.40484 4.50672 2.81422C5.12468 2.42867 5.94773 2.2318 6.60945 2.30836C7.65125 2.42867 8.63562 3.06578 9.41218 4.11852L9.58718 4.35641L9.72937 4.26617C9.80593 4.21695 10.1559 3.99547 10.5032 3.77399L11.1403 3.3693L11.0911 3.28727C10.9844 3.10133 10.6098 2.63102 10.361 2.36852C9.46961 1.42516 8.33484 0.80172 7.13445 0.596642C6.8364 0.547422 6.07078 0.525547 5.76726 0.55836Z"
                            fill="#003A75" />
                    </svg>
                </span>
            </li>
            <li class="menu-option">
                <span class="d-flex justify-content-center align-items-center gap-2">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.0833 8.16663C10.6032 8.16978 10.1315 8.29312 9.71133 8.52538L7.75833 6.18329L12.1141 0.956628L11.2181 0.209961L7 5.27213L2.78133 0.209961L1.88533 0.956628L6.24167 6.18329L4.28867 8.52538C3.86835 8.2934 3.39674 8.17008 2.91667 8.16663C2.33981 8.16663 1.7759 8.33769 1.29625 8.65817C0.816611 8.97866 0.442775 9.43418 0.222019 9.96713C0.00126375 10.5001 -0.056496 11.0865 0.0560442 11.6523C0.168584 12.2181 0.44637 12.7378 0.854273 13.1457C1.26218 13.5536 1.78188 13.8314 2.34765 13.9439C2.91343 14.0565 3.49988 13.9987 4.03283 13.7779C4.56578 13.5572 5.0213 13.1833 5.34179 12.7037C5.66227 12.2241 5.83333 11.6602 5.83333 11.0833C5.82999 10.4241 5.60108 9.78596 5.18467 9.27496L7 7.09446L8.81475 9.27496C8.39888 9.78623 8.17022 10.4243 8.16667 11.0833C8.16667 11.6602 8.33773 12.2241 8.65821 12.7037C8.9787 13.1833 9.43422 13.5572 9.96717 13.7779C10.5001 13.9987 11.0866 14.0565 11.6523 13.9439C12.2181 13.8314 12.7378 13.5536 13.1457 13.1457C13.5536 12.7378 13.8314 12.2181 13.944 11.6523C14.0565 11.0865 13.9987 10.5001 13.778 9.96713C13.5572 9.43418 13.1834 8.97866 12.7037 8.65817C12.2241 8.33769 11.6602 8.16663 11.0833 8.16663V8.16663ZM2.91667 12.8333C2.57055 12.8333 2.23221 12.7307 1.94442 12.5384C1.65663 12.3461 1.43233 12.0728 1.29988 11.753C1.16743 11.4332 1.13277 11.0814 1.20029 10.7419C1.26782 10.4024 1.43449 10.0906 1.67923 9.84586C1.92397 9.60111 2.23579 9.43444 2.57526 9.36692C2.91473 9.2994 3.26659 9.33405 3.58636 9.4665C3.90613 9.59896 4.17945 9.82326 4.37174 10.111C4.56403 10.3988 4.66667 10.7372 4.66667 11.0833C4.66667 11.5474 4.48229 11.9925 4.1541 12.3207C3.82592 12.6489 3.3808 12.8333 2.91667 12.8333ZM11.0833 12.8333C10.7372 12.8333 10.3989 12.7307 10.1111 12.5384C9.8233 12.3461 9.599 12.0728 9.46654 11.753C9.33409 11.4332 9.29944 11.0814 9.36696 10.7419C9.43448 10.4024 9.60116 10.0906 9.8459 9.84586C10.0906 9.60111 10.4025 9.43444 10.7419 9.36692C11.0814 9.2994 11.4333 9.33405 11.753 9.4665C12.0728 9.59896 12.3461 9.82326 12.5384 10.111C12.7307 10.3988 12.8333 10.7372 12.8333 11.0833C12.8333 11.5474 12.649 11.9925 12.3208 12.3207C11.9926 12.6489 11.5475 12.8333 11.0833 12.8333Z"
                            fill="#003A75" />
                    </svg>
                    Ausschneiden
                </span>
                <span>
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.12065 2.11918L7.88281 0.881348L5.00173 3.76301L2.12065 0.881348L0.882812 2.11918L3.76448 5.00026L0.882812 7.88135L2.12065 9.11918L5.00173 6.23751L7.88281 9.11918L9.12065 7.88135L6.23898 5.00026L9.12065 2.11918Z"
                            fill="#003A75" />
                    </svg>
                </span>
            </li>
            <li class="menu-option">
                <span class="d-flex justify-content-center align-items-center gap-2">
                    <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.48076 0.768358C4.2374 0.803905 3.94482 0.954296 3.75889 1.14023C3.60576 1.29336 3.42803 1.59414 3.42803 1.70078C3.42803 1.74453 3.40068 1.75 3.14092 1.75C2.95771 1.75 2.81826 1.76367 2.76357 1.78828C2.646 1.83476 2.53115 1.97422 2.50928 2.0918L2.49287 2.1875H2.20029C2.02529 2.1875 1.84209 2.20391 1.74639 2.22851C1.27607 2.35156 0.912402 2.71797 0.789355 3.19102C0.726465 3.42891 0.726465 11.0113 0.789355 11.252C0.917871 11.7387 1.32803 12.1297 1.81201 12.2227C1.89951 12.2391 2.52021 12.25 3.35967 12.25H4.7624L4.83896 12.4059C4.9292 12.5973 5.1917 12.8625 5.38584 12.9664C5.68115 13.125 5.67568 13.125 7.72373 13.125C8.88584 13.125 9.65693 13.1141 9.74717 13.0977C10.2503 13.002 10.6905 12.5617 10.7835 12.0613C10.8218 11.859 10.819 7.38555 10.7835 7.18867C10.7151 6.83047 10.4444 6.46133 10.13 6.2918C9.86475 6.15234 9.70889 6.125 9.1374 6.125H8.62334V4.65391C8.62334 3.51641 8.61514 3.15547 8.58506 3.04883C8.47568 2.63867 8.17217 2.33516 7.76475 2.22578C7.67998 2.20391 7.48037 2.1875 7.25342 2.1875H6.87881L6.8624 2.0918C6.84053 1.97422 6.72568 1.83476 6.60811 1.78828C6.55342 1.76367 6.41396 1.75 6.23076 1.75C5.98467 1.75 5.94365 1.74453 5.94365 1.70625C5.94365 1.62422 5.78232 1.32344 5.67021 1.19766C5.38311 0.869531 4.92646 0.705468 4.48076 0.768358ZM4.91826 1.69805C5.04951 1.77461 5.1042 1.89766 5.12334 2.15195C5.13975 2.3543 5.15068 2.38984 5.22178 2.46641C5.34209 2.59219 5.44326 2.625 5.73857 2.625H5.99834V2.84375V3.0625H4.68584H3.37334V2.84648V2.63047L3.67139 2.61953C3.92295 2.61406 3.98311 2.60312 4.04873 2.55391C4.19092 2.44726 4.24834 2.33242 4.24834 2.15195C4.24834 1.73086 4.5874 1.49844 4.91826 1.69805ZM2.50381 3.36055C2.51201 3.6832 2.53662 3.74609 2.70068 3.86641C2.77451 3.92383 2.79912 3.92383 4.68584 3.92383C6.57256 3.92383 6.59717 3.92383 6.671 3.86641C6.83506 3.74609 6.85967 3.6832 6.86787 3.36055L6.87881 3.05703L7.24521 3.06797C7.58154 3.07617 7.61436 3.08164 7.67178 3.13906L7.73467 3.20195L7.74287 4.66211L7.75107 6.125H6.79678C5.76865 6.125 5.67295 6.13594 5.39131 6.27812C5.19717 6.37656 4.95654 6.61445 4.85264 6.80586C4.68311 7.12578 4.68584 7.08203 4.68584 9.32969V11.3777L3.29404 11.3695C1.93506 11.3613 1.89951 11.3586 1.82568 11.3039C1.78467 11.2738 1.72451 11.2137 1.69443 11.1727C1.63701 11.0988 1.63701 11.0879 1.62881 7.29258C1.62607 5.19805 1.62881 3.44805 1.63701 3.39883C1.65615 3.28945 1.771 3.15 1.88311 3.10078C1.93232 3.07891 2.07178 3.06523 2.23037 3.0625H2.49287L2.50381 3.36055ZM9.7335 7.07109C9.77451 7.10117 9.83467 7.16133 9.86475 7.20234C9.92217 7.27617 9.92217 7.29531 9.92217 9.625C9.92217 11.9547 9.92217 11.9738 9.86475 12.0477C9.83467 12.0887 9.77451 12.1488 9.7335 12.1789C9.65967 12.2363 9.63506 12.2363 7.74834 12.2363C5.86162 12.2363 5.83701 12.2363 5.76318 12.1789C5.72217 12.1488 5.66201 12.0887 5.63193 12.0477C5.57451 11.9738 5.57451 11.9465 5.56631 9.69883C5.56084 8.44648 5.56631 7.38555 5.57451 7.33633C5.59365 7.22695 5.7085 7.0875 5.82061 7.03828C5.88623 7.0082 6.26084 7.00273 7.78115 7.0082C9.62959 7.01367 9.65967 7.01367 9.7335 7.07109Z"
                            fill="#003A75" />
                        <path
                            d="M6.25672 7.91336C6.07352 7.99266 5.96961 8.2032 6.00789 8.40828C6.0325 8.5368 6.16922 8.68719 6.29227 8.72273C6.36062 8.74461 6.86375 8.75008 7.80711 8.74461C9.18523 8.73641 9.22078 8.73367 9.29461 8.67898C9.43953 8.57234 9.48328 8.48484 9.48328 8.31258C9.48328 8.14031 9.43953 8.05281 9.29461 7.94617C9.22078 7.88875 9.18523 7.88875 7.77977 7.88328C6.62312 7.87781 6.32234 7.88328 6.25672 7.91336Z"
                            fill="#003A75" />
                        <path
                            d="M6.25672 9.22586C6.07352 9.30516 5.96961 9.5157 6.00789 9.72078C6.0325 9.8493 6.16922 9.99969 6.29227 10.0352C6.36062 10.0571 6.86375 10.0626 7.80711 10.0571C9.18523 10.0489 9.22078 10.0462 9.29461 9.99148C9.43953 9.88484 9.48328 9.79734 9.48328 9.62508C9.48328 9.45281 9.43953 9.36531 9.29461 9.25867C9.22078 9.20125 9.18523 9.20125 7.77977 9.19578C6.62312 9.19031 6.32234 9.19578 6.25672 9.22586Z"
                            fill="#003A75" />
                        <path
                            d="M6.25672 10.5384C6.07352 10.6177 5.96961 10.8282 6.00789 11.0333C6.0325 11.1618 6.16922 11.3122 6.29227 11.3477C6.36062 11.3696 6.86375 11.3751 7.80711 11.3696C9.18523 11.3614 9.22078 11.3587 9.29461 11.304C9.43953 11.1973 9.48328 11.1098 9.48328 10.9376C9.48328 10.7653 9.43953 10.6778 9.29461 10.5712C9.22078 10.5138 9.18523 10.5138 7.77977 10.5083C6.62312 10.5028 6.32234 10.5083 6.25672 10.5384Z"
                            fill="#003A75" />
                    </svg>
                    Einfügen
                </span>
                <span>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_12288_80165)">
                            <path
                                d="M4.51506 1.21908V2.52253C4.51506 3.09774 4.51289 3.42411 4.51072 3.63068C4.50979 3.71898 4.50887 3.78483 4.50812 3.83861C4.5071 3.91158 4.50639 3.96232 4.50639 4.01676V4.14176H4.38139H3.81256H3.68756V4.01676V2.37866C3.68756 1.82204 3.68953 1.40659 3.69414 1.12595C3.69644 0.985816 3.69942 0.878098 3.70322 0.802803C3.70511 0.765394 3.70729 0.734191 3.70991 0.710317C3.71121 0.698562 3.71284 0.686426 3.71507 0.675256L3.71521 0.674517C3.71626 0.669161 3.71989 0.650536 3.73003 0.630839C3.74849 0.593852 3.78051 0.5627 3.80196 0.543738C3.82739 0.521255 3.85789 0.498804 3.88804 0.481516C3.93282 0.454265 3.97756 0.442877 4.07086 0.435341C4.16379 0.427836 4.32287 0.423104 4.61017 0.419956C5.18675 0.413638 6.29565 0.413638 8.46472 0.413638H8.46668C8.79609 0.413638 9.10189 0.413581 9.3858 0.413527C11.2177 0.413185 12.1382 0.413013 12.6058 0.429491C12.7411 0.434261 12.8415 0.440507 12.9162 0.448934C12.9888 0.457114 13.0471 0.468266 13.0923 0.487391C13.146 0.510072 13.1819 0.544175 13.2043 0.589089C13.2127 0.605856 13.2184 0.623061 13.221 0.63026C13.2243 0.63957 13.2259 0.643801 13.2278 0.647674L13.228 0.648124C13.2433 0.679701 13.2487 0.718143 13.2522 0.752118C13.2564 0.791468 13.2597 0.847033 13.2625 0.925766C13.2683 1.0838 13.2724 1.34475 13.2753 1.77677C13.2812 2.64147 13.2826 4.19742 13.2826 7.00018C13.2826 9.80293 13.2812 11.3589 13.2753 12.2236C13.2724 12.6556 13.2683 12.9166 13.2625 13.0746C13.2597 13.1533 13.2564 13.2089 13.2522 13.2482C13.2487 13.2822 13.2433 13.3207 13.228 13.3522L13.2278 13.3527C13.2259 13.3566 13.2243 13.3608 13.221 13.3701C13.2208 13.3707 13.2205 13.3714 13.2202 13.3722C13.2174 13.3803 13.212 13.3959 13.2044 13.4112C13.182 13.4561 13.1461 13.4902 13.0925 13.5129C13.0472 13.5321 12.989 13.5432 12.9165 13.5514C12.8418 13.5598 12.7416 13.5661 12.6065 13.5709C12.1394 13.5873 11.22 13.5872 9.39014 13.5868C9.10652 13.5868 8.80101 13.5867 8.47193 13.5867C6.53489 13.5867 5.42522 13.5855 4.79161 13.5801C4.47512 13.5774 4.27583 13.5737 4.15112 13.5685C4.08901 13.5659 4.04309 13.5629 4.00948 13.5591C3.98178 13.556 3.94476 13.551 3.91416 13.5357L3.91416 13.5357L3.91383 13.5355C3.91113 13.5341 3.90683 13.5321 3.90163 13.5296C3.88765 13.5229 3.86717 13.513 3.85368 13.5053C3.8278 13.4905 3.79903 13.4694 3.77437 13.4353C3.7297 13.3735 3.71409 13.289 3.70477 13.183C3.68726 12.9839 3.68735 12.6071 3.68752 11.871C3.68754 11.7944 3.68756 11.7139 3.68756 11.6293V9.98359V9.85859H3.81256H4.39451H4.51951V9.98359C4.51951 10.0624 4.51906 10.1263 4.51845 10.2132C4.51809 10.2631 4.51769 10.3207 4.51728 10.393C4.51617 10.5916 4.51506 10.9031 4.51506 11.4778V12.7813L8.47958 12.7764L8.47965 12.7764L12.4419 12.769V7.00018V1.23132L8.47965 1.22398H8.47958L4.51506 1.21908Z"
                                fill="#003A75" stroke="#003A75" stroke-width="0.25" />
                            <path
                                d="M7.06305 4.36234C7.11067 4.36764 7.15323 4.38398 7.20584 4.41876C7.25472 4.45107 7.31762 4.50288 7.40801 4.58394C7.59012 4.74724 7.90432 5.04812 8.48041 5.60206L9.88756 6.90878L9.98627 7.00045L9.88749 7.09204L8.46731 8.40878C7.89636 8.95902 7.57972 9.26224 7.39607 9.42767C7.305 9.50971 7.24183 9.56229 7.19423 9.59452C7.14507 9.6278 7.09821 9.64941 7.04269 9.64941C6.78132 9.64941 6.55742 9.42886 6.61319 9.16074L6.61318 9.16074L6.6134 9.15972C6.62011 9.12877 6.63577 9.10271 6.64659 9.08626C6.65916 9.06715 6.67528 9.04634 6.69395 9.02404C6.73142 8.97928 6.78625 8.92017 6.86125 8.84312C7.01172 8.68857 7.25126 8.45383 7.61461 8.10193L7.61493 8.10162L8.34147 7.40302H4.58307C1.63529 7.40302 0.814379 7.40174 0.552994 7.3818L0.4375 7.37299V7.25716V6.74359V6.62776L0.552994 6.61895C0.814379 6.59901 1.63529 6.59773 4.58307 6.59773H8.3427L7.61756 5.89661C7.6175 5.89656 7.61745 5.89651 7.6174 5.89646C7.2892 5.58088 7.04924 5.34574 6.88972 5.18281C6.81013 5.10151 6.74925 5.03687 6.7071 4.98856C6.68617 4.96457 6.66829 4.94285 6.65466 4.92408C6.64787 4.91474 6.64089 4.90443 6.63483 4.89374C6.63013 4.88544 6.62137 4.8691 6.61653 4.84831C6.59629 4.7651 6.60872 4.67797 6.63977 4.60441C6.6708 4.5309 6.72481 4.46058 6.80047 4.41675C6.88117 4.36774 6.96176 4.3488 7.06305 4.36234ZM7.06305 4.36234C7.06232 4.36226 7.0616 4.36218 7.06087 4.3621L7.04795 4.48643L7.06496 4.3626C7.06432 4.36251 7.06368 4.36242 7.06305 4.36234Z"
                                fill="#003A75" stroke="#003A75" stroke-width="0.25" />
                        </g>
                        <defs>
                            <clipPath id="clip0_12288_80165">
                                <rect width="14" height="14" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </span>
            </li>
        </ul>
    </div>
    <!-- Custom Right Click Context Menue End  -->