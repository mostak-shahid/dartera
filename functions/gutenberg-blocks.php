<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;
add_action('carbon_fields_register_fields', 'mos_gutenberg_blocks');

function mos_gutenberg_blocks() {
    global $animations;
    $animation_options = [''=>'Select Animation'];
    foreach($animations as $key => $value) {
        //echo $key;
        if ($key != 'Back exits' && $key != 'Bouncing exits' && $key != 'Fading exits' && $key != 'Rotating exits' && $key != 'Zooming exits' && $key != 'Sliding exits') {
            foreach($value as $animation) {
                $animation_options[$animation] = $animation;
            }
        }
    }
    
    //FAQs start
    Block::make(__('FAQs'))
    ->add_tab(__('Content'), array(
        Field::make('complex', 'mos_faqs', __('FAQs'))
        ->add_fields(array(
            Field::make('text', 'question', __('Question'))
            ->set_required( true ),
            Field::make('rich_text', 'answer', __('Answer'))
            ->set_required( true ),
            Field::make('select', 'open', __('Default Open'))
            ->set_options(array(
                'close' => 'No',
                'open' => 'Yes',
            )),
       ))
        ->set_collapsed( true )
        ->set_header_template('
            <% if (question) { %>
                <%- question %>
            <% } %>
        '),
    ))
    ->add_tab(__('Style'), array(
        Field::make('select', 'mos_faqs_text_align', __('Text Alignment'))
        ->set_options(array(
            'text-start' => 'Left',
            'text-center' => 'Center',
            'text-end' => 'Right',
        )),
        Field::make('text', 'mos_faqs_wrapper_class', __('Wrapper Class')),
        Field::make('text', 'mos_faqs_unit_class', __('Unit Class')),
        Field::make('text', 'mos_faqs_question_class', __('Question Class')),
        Field::make('text', 'mos_faqs_answer_class', __('Answer Class')),
    )) 
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_faqs_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_faqs_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
    ))        
        
    /*->add_fields(array(
        Field::make('text', 'mos_faqs_subtitle', __('Section Name')),
        Field::make('text', 'mos_faqs_title', __('Section TagLine')),
        Field::make('text', 'mos_faqs_desc', __('Section Intro')),
   ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        if ($fields['mos_faqs'] && sizeof($fields['mos_faqs'])) :
        ?>
<div class="mos-faqs-wrapper <?php echo @$fields['mos_faqs_wrapper_class']; ?> <?php echo @$attributes['className']; ?>">    
    <ul class="accordion-list list-unstyled">
        <?php foreach($fields['mos_faqs'] as $faq) : ?>
            <?php if($faq['question']): ?>
            <li class="accordion-list-item radius-16 bg-white mb-4 <?php echo @$fields['mos_faqs_unit_class']; ?> <?php echo @$fields['mos_faqs_text_align']; ?> <?php echo (@$faq['open'] == 'open')?'open':''; ?>">
                <h5 class="accordion-title fw-bold fs-20 text-gray_3 px-4 d-flex justify-content-between align-items-center <?php echo @$fields['mos_faqs_question_class']; ?>">
                <?php echo $faq['question'] ?>
                <span class="ni ni-plus-sm"></span>
                </h5>
                <?php if($faq['answer']): ?>
                <div class="accordion-desc <?php echo @$fields['mos_faqs_answer_class']; ?>" style="<?php echo (@$faq['open']!='open') ? 'display: none' : '' ?>">
                    <?php echo $faq['answer'] ?>
                </div>
                <?php endif?>
            </li>
            <?php endif?>
        <?php endforeach?>
    </ul>         
</div>
<?php endif?>
<?php if(@$fields['mos_faqs_style']) : ?>
<style><?php echo $fields['mos_faqs_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_faqs_script']) : ?>
<script><?php echo $fields['mos_faqs_script']; ?></script>
<?php endif?>
        <?php
    }); 
    //FAQs end
    
    //Badges start
    Block::make(__('Badges'))
    ->add_tab(__('Content'), array(
        Field::make('complex', 'mos_badges', __('Badges'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title'))
            ->set_required( true ),
       ))
        ->set_collapsed( true )
        ->set_header_template('
            <% if (title) { %>
                <%- title %>
            <% } %>
        '),
    ))
    ->add_tab(__('Style'), array(
        Field::make('text', 'mos_badges_wrapper_class', __('Wrapper Class')),
        Field::make('text', 'mos_badges_unit_class', __('Unit Class')),
    )) 
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_badges_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_badges_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
    ))        
        
    /*->add_fields(array(
        Field::make('text', 'mos_badges_subtitle', __('Section Name')),
        Field::make('text', 'mos_badges_title', __('Section TagLine')),
        Field::make('text', 'mos_badges_desc', __('Section Intro')),
   ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        if ($fields['mos_badges'] && sizeof($fields['mos_badges'])) :
        ?>
<div class="mos-badges-wrapper <?php echo @$fields['mos_badges_wrapper_class']; ?> <?php echo @$attributes['className']; ?>">
    <?php foreach($fields['mos_badges'] as $badge) : ?>
        <?php if(@$badge['title']): ?>
        <div class="badge rounded-pill <?php echo @$fields['mos_badges_unit_class']; ?>"><?php echo $badge['title'] ?></div>
        <?php endif?>
    <?php endforeach?>       
</div>
<?php endif?>
<?php if(@$fields['mos_badges_style']) : ?>
<style><?php echo $fields['mos_badges_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_badges_script']) : ?>
<script><?php echo $fields['mos_badges_script']; ?></script>
<?php endif?>
        <?php
    }); 
    //Badges end
    
    
    
    //Banner start
    Block::make(__('Banner'))
    ->add_tab(__('Content'), array(
        Field::make('text', 'mos_banner_subtitle', __('Sub Title')),
        Field::make('text', 'mos_banner_title', __('Main Title')),
        Field::make('rich_text', 'mos_banner_desc', __('Intro')),
        
        Field::make('text', 'mos_banner_badges_title', __('Badges Title')),
        Field::make('complex', 'mos_banner_badges', __('Badges'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
       ))
        ->set_header_template('
            <% if (title) { %>
                <%- title %>
            <% } %>
        '),        
        
        Field::make('complex', 'mos_banner_buttons', __('Buttons'))
        ->add_fields(array(
            Field::make('text', 'title', __('Button title')),
            Field::make('text', 'url', __('Button URL')),
       ))
        ->set_header_template('
            <% if (title) { %>
                <%- title %>
            <% } %>
        '),
        
        Field::make('image', 'mos_banner_image', __('Image')),
   ))
    ->add_tab(__('Style'), array(
        Field::make('select', 'mos_banner_text_align', __('Text Alignment'))
        ->set_options(array(
            'text-start' => 'Left',
            'text-center' => 'Center',
            'text-end' => 'Right',
       )),
        Field::make('text', 'mos_banner_class', __('Section Class')),
        Field::make('text', 'mos_banner_text_part_class', __('Text Part Class')),
        Field::make('text', 'mos_banner_subtitle_class', __('Sub Title Class')),
        Field::make('text', 'mos_banner_title_class', __('Main Title Class')),
        Field::make('text', 'mos_banner_intro_class', __('Intro Class')),
        Field::make('text', 'mos_banner_badges_class', __('Badges Class')),
        Field::make('text', 'mos_banner_buttons_class', __('Buttons Class')),
        Field::make('text', 'mos_banner_image_part_class', __('Image Part Class')),
   ))
    ->add_tab(__('Animation'), array(
        
        Field::make('separator', 'mos_banner_subtitle_animation_separator', __('Sub Title')),
        Field::make('select', 'mos_banner_subtitle_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_banner_subtitle_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_banner_title_animation_separator', __('Main Title')),
        Field::make('select', 'mos_banner_title_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_banner_title_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_banner_desc_animation_separator', __('Intro')),
        Field::make('select', 'mos_banner_desc_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_banner_desc_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_banner_badges_animation_separator', __('Badges')),
        Field::make('select', 'mos_banner_badges_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_banner_badges_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_banner_buttons_animation_separator', __('Buttons')),
        Field::make('select', 'mos_banner_buttons_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_banner_buttons_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_banner_image_part_animation_separator', __('Image')),
        Field::make('select', 'mos_banner_image_part_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_banner_image_part_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
   ))  
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_banner_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_banner_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))        
        
    /*->add_fields(array(
        Field::make('text', 'mos_banner_subtitle', __('Section Name')),
        Field::make('text', 'mos_banner_title', __('Section TagLine')),
        Field::make('text', 'mos_banner_desc', __('Section Intro')),
   ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        ?>
<div class="mos-banner-wrapper <?php echo @$fields['mos_banner_class']; ?> <?php echo @$attributes['className']; ?>">
    <div class="text-part <?php echo @$fields['mos_banner_text_part_class']; ?> <?php echo @$fields['mos_banner_text_align']; ?>">
        <?php if(@$fields['mos_banner_subtitle']) : ?><h6 class="subtitle <?php echo @$fields['mos_banner_subtitle_class']; ?> wow <?php echo @$fields['mos_banner_subtitle_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_banner_subtitle_animation_delay'] ?>ms"><?php echo do_shortcode($fields['mos_banner_subtitle']); ?></h6><?php endif?>

        <?php if(@$fields['mos_banner_title']) : ?><h1 class="title <?php echo @$fields['mos_banner_title_class']; ?> wow <?php echo @$fields['mos_banner_title_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_banner_title_animation_delay'] ?>ms"><?php echo do_shortcode($fields['mos_banner_title']); ?></h1><?php endif?>

        <?php if(@$fields['mos_banner_desc']) : ?><div class="intro <?php echo @$fields['mos_banner_intro_class']; ?> wow <?php echo @$fields['mos_banner_desc_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_banner_desc_animation_delay'] ?>ms"><?php echo do_shortcode($fields['mos_banner_desc']); ?></div><?php endif?>

        <?php if(@$fields['mos_banner_badges'] && sizeof($fields['mos_banner_badges'])) : ?>
        <div class="banner-left-middle <?php echo @$fields['mos_banner_badges_class']; ?> wow <?php echo @$fields['mos_banner_badges_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_banner_badges_animation_delay'] ?>ms">
            <?php if(@$fields['mos_banner_badges_title']) : ?><p class="fs-6 fw-bold text-white"><?php echo $fields['mos_banner_badges_title'] ?></p><?php endif?>
            <div class="d-flex flex-wrap align-items-center justify-content-xl-start justify-content-center gap-3 badge-group">
                <?php foreach($fields['mos_banner_badges'] as $badge) : ?>
                <?php if(@$badge['title']) : ?><div class="badge rounded-pill fs-14 fw-semi-bold px-3"><?php echo $badge['title'] ?></div><?php endif?>
                <?php endforeach?>
            </div>
        </div>
        <?php endif?>
        <?php if(@$fields['mos_banner_buttons'] && sizeof($fields['mos_banner_buttons'])) : ?>
        <div class="common-btn button-group banner-btn d-flex flex-wrap align-items-center justify-content-xl-start justify-content-center gap-3 <?php echo @$fields['mos_banner_buttons_class']; ?> wow <?php echo @$fields['mos_banner_buttons_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_banner_buttons_animation_delay'] ?>ms">
            <?php foreach($fields['mos_banner_buttons'] as $button) : ?>
                <?php if(@$button['title'] && @$button['url']) : ?>
                <a href="<?php echo do_shortcode($button['url']) ?>" class="fill-btn fw-semi-bold text-gray_1 lh-20 text-decoration-none bg-flourescent_blue radius-4 d-inline-flex align-items-center gap-2">
                    <span><?php echo do_shortcode($button['title']) ?></span>
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.5117 8.82164L10.9342 5.24414L9.75591 6.42247L12.5001 9.16664H4.16675V10.8333H12.5001L9.75591 13.5775L10.9342 14.7558L14.5117 11.1783C14.8242 10.8658 14.9997 10.4419 14.9997 9.99997C14.9997 9.55803 14.8242 9.13419 14.5117 8.82164Z" fill="#002448"></path>
                        </svg>
                    </span>
                </a>
                <?php endif?>
            <?php endforeach?>
        </div>
        <?php endif?>
    
    </div>    
    <?php if(@$fields['mos_banner_image']) : ?>
        <div class="img-part <?php echo @$fields['mos_banner_image_part_class']; ?> wow <?php echo @$fields['mos_banner_image_part_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_banner_image_part_animation_delay'] ?>ms">
            <?php echo wp_get_attachment_image($fields['mos_banner_image'], "full", "", array("class" => "img-fluid"));  ?>
        </div>
    <?php endif?>   
</div>
<?php if(@$fields['mos_banner_style']) : ?>
<style><?php echo $fields['mos_banner_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_banner_script']) : ?>
<script><?php echo $fields['mos_banner_script']; ?></script>
<?php endif?>
        <?php
    }); 
    //Banner end
    
    //Section Title Block start
    Block::make(__('Section Title Block'))
    ->add_tab(__('Content'), array(
        Field::make('text', 'mos_sec_subtitle', __('Sub Title')),
        Field::make('text', 'mos_sec_title', __('Main Title')),
        Field::make('textarea', 'mos_sec_desc', __('Intro')),
        Field::make('text', 'mos_sec_button_title', __('Button Title')),
        Field::make('text', 'mos_sec_button_url', __('Button URL')),
        Field::make('image', 'mos_sec_image', __('Image')),
   ))
    ->add_tab(__('Style'), array(
        Field::make('select', 'mos_sec_text_align', __('Text Alignment'))
        ->set_options(array(
            'text-start' => 'Left',
            'text-center' => 'Center',
            'text-end' => 'Right',
       )),
        Field::make('text', 'mos_sec_class', __('Section Class')),
        Field::make('text', 'mos_sec_subtitle_class', __('Sub Title Class')),
        Field::make('text', 'mos_sec_title_class', __('Main Title Class')),
        Field::make('text', 'mos_sec_intro_class', __('Intro Class')),
        Field::make('text', 'mos_sec_button_class', __('Button Class')),
        Field::make('text', 'mos_sec_image_class', __('Image Class')),
   ))
    ->add_tab(__('Animation'), array(
        
        Field::make('separator', 'mos_sec_subtitle_animation_separator', __('Sub Title')),
        Field::make('select', 'mos_sec_subtitle_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_sec_subtitle_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_sec_title_animation_separator', __('Main Title')),
        Field::make('select', 'mos_sec_title_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_sec_title_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_sec_desc_animation_separator', __('Intro')),
        Field::make('select', 'mos_sec_desc_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_sec_desc_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_sec_btn_animation_separator', __('Button')),
        Field::make('select', 'mos_sec_btn_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_sec_btn_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_sec_image_animation_separator', __('Image')),
        Field::make('select', 'mos_sec_image_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_sec_image_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
   ))  
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_sec_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_sec_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))        
        
    /*->add_fields(array(
        Field::make('text', 'mos_sec_subtitle', __('Section Name')),
        Field::make('text', 'mos_sec_title', __('Section TagLine')),
        Field::make('text', 'mos_sec_desc', __('Section Intro')),
   ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        ?>
<div class="section-heading <?php echo @$fields['mos_sec_text_align']; ?> <?php echo @$fields['mos_sec_class']; ?> <?php echo @$attributes['className']; ?>">
    <div class="text-part">
    <?php if(@$fields['mos_sec_subtitle']) : ?><h6 class="subtitle <?php echo @$fields['mos_sec_subtitle_class']; ?> wow <?php echo @$fields['mos_sec_subtitle_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_subtitle_animation_delay'] ?>ms"><?php echo do_shortcode($fields['mos_sec_subtitle']); ?></h6><?php endif?>
    
    <?php if(@$fields['mos_sec_title']) : ?><h2 class="title <?php echo @$fields['mos_sec_title_class']; ?> wow <?php echo @$fields['mos_sec_title_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_title_animation_delay'] ?>ms"><?php echo do_shortcode($fields['mos_sec_title']); ?></h2><?php endif?>
    
    <?php if(@$fields['mos_sec_desc']) : ?><div class="intro <?php echo @$fields['mos_sec_intro_class']; ?> wow <?php echo @$fields['mos_sec_desc_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_desc_animation_delay'] ?>ms"><?php echo do_shortcode($fields['mos_sec_desc']); ?></div><?php endif?>
    
    <?php if(@$fields['mos_sec_button_title'] && @$fields['mos_sec_button_url']) : ?>
    <div class="common-btn <?php echo @$fields['mos_sec_button_class']; ?> wow <?php echo @$fields['mos_sec_button_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_button_animation_delay'] ?>ms">
        <a href="<?php echo do_shortcode($fields['mos_sec_button_url'])?>" class="fill-btn fw-semi-bold text-gray_1 lh-20 text-decoration-none bg-flourescent_blue radius-4 d-inline-flex align-items-center gap-2">
            <span><?php echo do_shortcode($fields['mos_sec_button_title'])?></span>
            <span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.5117 8.82164L10.9342 5.24414L9.75591 6.42247L12.5001 9.16664H4.16675V10.8333H12.5001L9.75591 13.5775L10.9342 14.7558L14.5117 11.1783C14.8242 10.8658 14.9997 10.4419 14.9997 9.99997C14.9997 9.55803 14.8242 9.13419 14.5117 8.82164Z" fill="#002448"></path>
                </svg>
            </span>
        </a>
    </div>
    <?php endif?>
    </div>    
    <?php if(@$fields['mos_sec_image']) : ?>
        <div class="img-part <?php echo @$fields['mos_sec_image_class']; ?> wow <?php echo @$fields['mos_sec_image_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_sec_image_animation_delay'] ?>ms">
            <?php echo wp_get_attachment_image($fields['mos_sec_image'], "full", "", array("class" => "img-fluid"));  ?>
        </div>
    <?php endif?>   
</div>
<?php if(@$fields['mos_sec_style']) : ?>
<style><?php echo $fields['mos_sec_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_sec_script']) : ?>
<script><?php echo $fields['mos_sec_script']; ?></script>
<?php endif?>
        <?php
    }); 
    //Section Title Block end
    //Cards start
    Block::make(__('Cards'))
    ->add_tab(__('Content'), array(
        Field::make('complex', 'mos_cards_slider', __('Items'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('rich_text', 'intro', __('Intro')),
            Field::make('text', 'link_title', __('Button title')),
            Field::make('text', 'link_url', __('Button URL')),
            Field::make('image', 'photo', __('Photo')),
            Field::make('select', 'layout', __('Layout'))
            ->set_options(array(
                'horizontal' => 'Horizontal',
                'vertical' => 'Vertical',
           )),
       ))
        ->set_header_template('
            <% if (title) { %>
                <%- title %>
            <% } %>
        '),
   ))
    ->add_tab(__('Style'), array(
        Field::make('text', 'mos_cards_wrapper_class', __('Wrapper Class')),
        Field::make('text', 'mos_cards_unit_wrapper_class', __('Unit Wrapper Class')),
        Field::make('text', 'mos_cards_unit_class', __('Unit Class')),
        Field::make('text', 'mos_cards_heading_class', __('Heading Class')),
        Field::make('text', 'mos_cards_intro_class', __('Intro Class')),
        Field::make('text', 'mos_cards_button_class', __('Button Class')),
        Field::make('text', 'mos_cards_image_class', __('Image Class')),
   ))
    ->add_tab(__('Animation'), array(
        Field::make('select', 'mos_cards_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_cards_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
   ))  
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_cards_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_cards_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))        
        
    /*->add_fields(array(
        Field::make('text', 'mos_sec_subtitle', __('Section Name')),
        Field::make('text', 'mos_sec_title', __('Section TagLine')),
        Field::make('text', 'mos_sec_desc', __('Section Intro')),
   ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        if(@$fields['mos_cards_slider'] && sizeof($fields['mos_cards_slider'])) :
        $n = 0;
        ?>
<div class="card-wrapper <?php echo @$fields['mos_cards_wrapper_class']; ?> <?php echo @$attributes['className']; ?>">
    <?php foreach($fields['mos_cards_slider'] as $slider) : ?>       
        <div class="unit-wrapper <?php echo @$fields['mos_cards_unit_wrapper_class']; ?> unit-<?php echo @$slider['layout'] ?>">
            <div class="features-card h-100 <?php echo (@$slider['layout'] == 'horizontal')?'d-flex justify-content-between':'' ?> <?php echo @$fields['mos_cards_unit_class']; ?> wow <?php echo @$fields['mos_cards_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_cards_animation_delay'] * $n ?>ms">
                <div class="text-area">
                    <?php if(@$slider['title']) : ?>
                    <h3 class="fw-bold text-gray_1 <?php echo ($slider['layout'] == 'horizontal')?'fs-30':'fs-4' ?> <?php echo @$fields['mos_cards_heading_class']; ?>">
                    <?php echo do_shortcode($slider['title']) ?>
                    </h3>
                    <?php endif?>
                    <?php if(@$slider['intro']) : ?>
                    <div class="fs-18 text-gray_3 <?php echo @$fields['mos_cards_intro_class']; ?>">
                        <?php echo do_shortcode($slider['intro']) ?>
                    </div>
                    <?php endif?>
                    <?php if(@$slider['link_title'] && @$slider['link_url']) : ?>
                    <a href="<?php echo do_shortcode($slider['link_url']) ?>" class="fs-16 fw-semi-bold text-lapis_lazuli text-decoration-none <?php echo @$fields['mos_cards_button_class']; ?>"><?php echo $slider['link_title'] ?>
                        <span class="ms-1">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.5117 8.82164L10.9342 5.24414L9.75591 6.42247L12.5001 9.16664H4.16675V10.8333H12.5001L9.75591 13.5775L10.9342 14.7558L14.5117 11.1783C14.8242 10.8658 14.9997 10.4419 14.9997 9.99997C14.9997 9.55803 14.8242 9.13419 14.5117 8.82164Z" fill="#015EA5"></path>
                            </svg>
                        </span>
                    </a>                
                    <?php endif?>
                </div>
                <?php if(@$slider['photo']) : ?>
                <div class=" <?php echo ($slider['layout'] == 'horizontal')?'d-flex justify-content-center align-items-center':'text-center mt-3' ?> <?php echo @$fields['mos_cards_image_class']; ?>">
                    <?php echo wp_get_attachment_image($slider['photo'], "full", "", array("class" => "img-fluid"));  ?>
                </div>  
                <?php endif?>
            </div>
        </div>
        <?php $n++?>
    <?php endforeach?>
</div>
        <?php endif;?>
<?php if(@$fields['mos_cards_style']) : ?>
<style><?php echo $fields['mos_cards_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_cards_script']) : ?>
<script><?php echo $fields['mos_cards_script']; ?></script>
<?php endif?>
        <?php
    }); 
    //Cards end
    //Zigzag Cards start
    Block::make(__('Zigzag Cards'))
    ->add_tab(__('Content'), array(
        Field::make('complex', 'mos_zigzag_cards_slider', __('Items'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('rich_text', 'intro', __('Intro')),
            Field::make('text', 'link_title', __('Button title')),
            Field::make('text', 'link_url', __('Button URL')),
            Field::make('image', 'photo', __('Photo')),
       ))
        ->set_collapsed(true)        
        ->setup_labels(['plural_name' => 'Zigzag Cards','singular_name' => 'Zigzag Card',])
        ->set_header_template('
            <% if (title) { %>
                <%- title %>
            <% } %>
        '),
   ))
    ->add_tab(__('Style'), array(
        Field::make('text', 'mos_zigzag_cards_wrapper_class', __('Wrapper Class')),
        Field::make('text', 'mos_zigzag_cards_unit_class', __('Unit Class')),
        Field::make('text', 'mos_zigzag_cards_heading_class', __('Heading Class')),
        Field::make('text', 'mos_zigzag_cards_intro_class', __('Intro Class')),
        Field::make('text', 'mos_zigzag_cards_button_class', __('Button Class')),
        Field::make('text', 'mos_zigzag_cards_image_class', __('Image Class')),
   ))
    ->add_tab(__('Animation'), array(
        Field::make('select', 'mos_zigzag_cards_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_zigzag_cards_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
   ))  
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_zigzag_cards_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_zigzag_cards_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))        
        
    /*->add_fields(array(
        Field::make('text', 'mos_sec_subtitle', __('Section Name')),
        Field::make('text', 'mos_sec_title', __('Section TagLine')),
        Field::make('text', 'mos_sec_desc', __('Section Intro')),
   ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        if(@$fields['mos_zigzag_cards_slider'] && sizeof($fields['mos_zigzag_cards_slider'])) :
        $n = 1;
        ?>
<div class="task-wrapper <?php echo @$fields['mos_zigzag_cards_wrapper_class']; ?> <?php echo @$attributes['className']; ?>">
    <?php foreach($fields['mos_zigzag_cards_slider'] as $slider) : ?>     
        <div class="task-area <?php echo @$fields['mos_zigzag_cards_unit_class']; ?> wow <?php echo @$fields['mos_zigzag_cards_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_zigzag_cards_animation_delay'] ?>ms">
            <div class="row align-items-center gx-5 row-count-<?php echo $n ?> <?php echo ($n%2 == 0)?'flex-row-reverse':'' ?>">
                <div class="col-lg-6">
                    <div class="task-content-area px-5">
                        <div class="step-number">
                            <span class="fs-120 fw-bold">
                                <?php echo sprintf("%02d", $n) ?>
                            </span>
                        </div>
                        <?php if(@$slider['title']) : ?>
                        <h3 class="task-title <?php echo @$fields['mos_zigzag_cards_heading_class']; ?>">
                        <?php echo do_shortcode($slider['title']) ?>
                        </h3>
                        <?php endif?>                       
                        <?php if(@$slider['intro']) : ?>
                        <div class="task-intro <?php echo @$fields['mos_zigzag_cards_intro_class']; ?>">
                            <?php echo do_shortcode($slider['intro']) ?>
                        </div>
                        <?php endif?>
                        <?php if(@$slider['link_title'] && @$slider['link_url']) : ?>
                        <a href="<?php echo do_shortcode($slider['link_url']) ?>" class="task-btn text-decoration-none <?php echo @$fields['mos_zigzag_cards_button_class']; ?>"><?php echo $slider['link_title'] ?>
                            <span class="ms-1">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.5117 8.82164L10.9342 5.24414L9.75591 6.42247L12.5001 9.16664H4.16675V10.8333H12.5001L9.75591 13.5775L10.9342 14.7558L14.5117 11.1783C14.8242 10.8658 14.9997 10.4419 14.9997 9.99997C14.9997 9.55803 14.8242 9.13419 14.5117 8.82164Z" fill="#015EA5"></path>
                                </svg>
                            </span>
                        </a>                
                        <?php endif?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php if(@$slider['photo']) : ?>
                    <div class="task-img <?php echo @$fields['mos_zigzag_cards_image_class']; ?>">
                        <?php echo wp_get_attachment_image($slider['photo'], "full", "", array("class" => "img-fluid"));  ?>
                    </div>  
                    <?php endif?>
                </div>
            </div>
        </div>  
        <?php $n++?>
    <?php endforeach?>
</div>
        <?php endif;?>
<?php if(@$fields['mos_zigzag_cards_style']) : ?>
<style><?php echo $fields['mos_zigzag_cards_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_zigzag_cards_script']) : ?>
<script><?php echo $fields['mos_zigzag_cards_script']; ?></script>
<?php endif?>
        <?php
    }); 
    //Zigzag Cards end
    //Portfolio Slider start
    Block::make(__('Portfolio Slider'))
    ->add_tab(__('Content'), array(
        Field::make('complex', 'mos_portfolio_slider_slider', __('Items'))
        ->add_fields(array(
            Field::make('text', 'link_title', __('Button title')),
            Field::make('text', 'link_url', __('Button URL')),
            Field::make('image', 'photo', __('Photo')),
       ))
        ->set_header_template('
            <% if (link_title) { %>
                <%- link_title %>
            <% } %>
        '),
   ))
    ->add_tab(__('Style'), array(
        Field::make('text', 'mos_portfolio_slider_wrapper_class', __('Wrapper Class')),
        Field::make('text', 'mos_portfolio_slider_unit_class', __('Unit Class')),
        Field::make('text', 'mos_portfolio_slider_button_class', __('Button Class')),
        Field::make('text', 'mos_portfolio_slider_image_class', __('Image Class')),
   ))
    ->add_tab(__('Animation'), array(
        Field::make('select', 'mos_portfolio_slider_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_portfolio_slider_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
   ))  
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_portfolio_slider_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_portfolio_slider_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))        
        
    /*->add_fields(array(
        Field::make('text', 'mos_sec_subtitle', __('Section Name')),
        Field::make('text', 'mos_sec_title', __('Section TagLine')),
        Field::make('text', 'mos_sec_desc', __('Section Intro')),
   ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        if(@$fields['mos_portfolio_slider_slider'] && sizeof($fields['mos_portfolio_slider_slider'])) :
        ?>
<div class="portfolio-wrapper portfolio-slider <?php echo @$fields['mos_portfolio_slider_wrapper_class']; ?> <?php echo @$attributes['className']; ?> wow <?php echo @$fields['mos_portfolio_slider_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_portfolio_slider_animation_delay'] ?>ms">
    <div class="portfolio-owl-carousel mos-owl-carousel owl-carousel" data-carousel-options='{"loop": true,"items":3,"margin": 30, "autoplay":true,"autoplayTimeout":"2500","animateOut": "fadeOut","smartSpeed": 2500,"nav": true,"dots": false,"autoplayHoverPause": true,"responsive":{"0": {"items": 1},"767":{"items": 2},"1200":{"items": 3}}}'>
    <?php foreach($fields['mos_portfolio_slider_slider'] as $slider) : ?>  
        <div class="portfolio-card <?php echo @$fields['mos_portfolio_slider_unit_class']; ?>">            
            <?php if(@$slider['photo']) : ?>
            <div class="portfolio-card-img <?php echo @$fields['mos_portfolio_slider_image_class']; ?>">
                <?php echo wp_get_attachment_image($slider['photo'], "full", "", array("class" => "img-fluid"));  ?>
            </div>  
            <?php endif?>
            <?php if(@$slider['link_title'] && @$slider['link_url']) : ?>
            <div class="card-footer">
                <a class="portfolio-btn <?php echo @$fields['mos_portfolio_slider_button_class']; ?>" href="<?php echo do_shortcode($slider['link_url']) ?>">
                    <span><?php echo do_shortcode($slider['link_title']) ?></span>
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.00933 15.5892L7.8335 14.4108L12.241 9.99999L7.8335 5.58916L9.01266 4.41083L13.4168 8.82166C13.7293 9.13421 13.9048 9.55805 13.9048 9.99999C13.9048 10.4419 13.7293 10.8658 13.4168 11.1783L9.00933 15.5892Z"
                                fill="#002448" />
                        </svg>
                    </span>
                </a>
            </div>            
            <?php endif?>
        </div>     
    <?php endforeach?>
    </div>
</div>
        <?php endif;?>
<?php if(@$fields['mos_portfolio_slider_style']) : ?>
<style><?php echo $fields['mos_portfolio_slider_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_portfolio_slider_script']) : ?>
<script><?php echo $fields['mos_portfolio_slider_script']; ?></script>
<?php endif?>
        <?php
    }); 
    //Portfolio Slider end
    //Testimonial Slider start
    Block::make(__('Testimonial Slider'))
    ->add_tab(__('Content'), array(
        Field::make('complex', 'mos_testimonial_slider_slider', __('Items'))
        ->add_fields(array(
            Field::make('text', 'title', __('Title')),
            Field::make('rich_text', 'intro', __('Intro')),
            Field::make('image', 'photo', __('Photo')),
            Field::make('text', 'name', __('Name')),
            Field::make('text', 'company', __('Company')),
            Field::make('select', 'rating', __('Rating'))
            ->set_options(array(
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
           ))
       ))
        ->set_header_template('
            <% if (name) { %>
                <%- name %> <%- company ? " from " + company : "" %>
            <% } %>
        '),
   ))
    ->add_tab(__('Style'), array(
        Field::make('text', 'mos_testimonial_slider_wrapper_class', __('Wrapper Class')),
        Field::make('text', 'mos_testimonial_slider_unit_class', __('Unit Class')),
        Field::make('text', 'mos_testimonial_slider_title_class', __('Title Class')),
        Field::make('text', 'mos_testimonial_slider_intro_class', __('Intro Class')),
        Field::make('text', 'mos_testimonial_slider_image_class', __('Image Class')),
        Field::make('text', 'mos_testimonial_slider_name_class', __('Name Class')),
        Field::make('text', 'mos_testimonial_slider_company_class', __('Company Class')),
        Field::make('text', 'mos_testimonial_slider_rating_class', __('Rating Class')),
   ))
    ->add_tab(__('Animation'), array(
        Field::make('select', 'mos_testimonial_slider_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_testimonial_slider_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
   ))  
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_testimonial_slider_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_testimonial_slider_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))        
        
    /*->add_fields(array(
        Field::make('text', 'mos_sec_subtitle', __('Section Name')),
        Field::make('text', 'mos_sec_title', __('Section TagLine')),
        Field::make('text', 'mos_sec_desc', __('Section Intro')),
   ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        if(@$fields['mos_testimonial_slider_slider'] && sizeof($fields['mos_testimonial_slider_slider'])) :
        ?>
<div class="testimonial-wrapper testimonial-slider <?php echo @$fields['mos_testimonial_slider_wrapper_class']; ?> <?php echo @$attributes['className']; ?> wow <?php echo @$fields['mos_testimonial_slider_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_testimonial_slider_animation_delay'] ?>ms">
    <div class="testimonial-owl-carousel mos-owl-carousel owl-carousel" data-carousel-options='{"loop": true,"items":3,"margin": 30, "autoplay":"true","autoplayTimeout":"2500","animateOut": "fadeOut","smartSpeed": 2500,"nav": true,"dots": false,"autoplayHoverPause": true,"responsive":{"0": {"items": 1},"767":{"items": 2},"1200":{"items": 3}}}'>
    <?php foreach($fields['mos_testimonial_slider_slider'] as $slider) : ?> 
        <div class="item">
            <div class="testimonial-card <?php echo @$fields['mos_testimonial_slider_unit_class']; ?>">      
                <?php if(@$slider['photo']) : ?>
                <div class="testimonial-card-img <?php echo @$fields['mos_testimonial_slider_image_class']; ?>">
                    <?php echo wp_get_attachment_image($slider['photo'], "full", "", array("class" => "img-fluid rounded-circle mb-30"));  ?>
                </div>  
                <?php endif?>
                <?php if(@$slider['title']) : ?>
                <h5 class="testimonial-card-title <?php echo @$fields['mos_testimonial_slider_title_class']; ?>"><?php echo do_shortcode($slider['title']) ?></h5>
                <?php endif?>
                
                <?php if(@$slider['intro']) : ?>
                <div class="testimonial-card-intro <?php echo @$fields['mos_testimonial_slider_intro_class']; ?>"><?php echo do_shortcode($slider['intro']) ?></div>
                <?php endif?>
                <?php if(@$slider['rating']) : ?>
                <div class="d-flex justify-content-center align-items-center gap-1 mb-3 <?php echo @$fields['mos_testimonial_slider_rating_class']; ?>">
                    <?php for ($x = 0; $x < $slider['rating']; $x++) : ?>                        
                        <img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/assets/img/star.svg" alt="star" width="20" height="20">                   
                    <?php endfor?>
                </div>
                <?php endif?>
                <?php if(@$slider['name']) : ?>
                <h6 class="testimonial-card-name <?php echo @$fields['mos_testimonial_slider_name_class']; ?>"><?php echo do_shortcode($slider['name']) ?></h6>
                <?php endif?>
                <?php if(@$slider['company']) : ?>
                <p class="testimonial-card-company <?php echo @$fields['mos_testimonial_slider_company_class']; ?>"><?php echo do_shortcode($slider['company']) ?></p>
                <?php endif?>
            </div>
        </div>     
    <?php endforeach?>
    </div>
</div>
        <?php endif;?>
<?php if(@$fields['mos_testimonial_slider_style']) : ?>
<style><?php echo $fields['mos_testimonial_slider_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_testimonial_slider_script']) : ?>
<script><?php echo $fields['mos_testimonial_slider_script']; ?></script>
<?php endif?>
        <?php
    }); 
    //Testimonial Slider end
    //Hero Banner start
    Block::make(__('Hero Banner'))
    ->add_tab(__('Content'), array(
        Field::make('text', 'mos_hero_banner_title', __('Title')),
        Field::make('text', 'mos_hero_banner_subtitle', __('Subtitle')),
        Field::make('rich_text', 'mos_hero_banner_intro', __('Intro')),
        Field::make('image', 'mos_hero_banner_photo', __('Image')),
        Field::make('text', 'mos_hero_banner_btn_title', __('Button Title')),
        Field::make('text', 'mos_hero_banner_btn_link', __('Button Link')),
   ))
    ->add_tab(__('Style'), array(
        Field::make('select', 'mos_hero_banner_image_align', __('Image Position'))
        ->set_options(array(
            'flex-row' => 'Left',
            'flex-row-reverse' => 'Right',
       )),
        Field::make('select', 'mos_hero_banner_text_align', __('Text Alignment'))
        ->set_options(array(
            'text-start' => 'Left',
            'text-center' => 'Center',
            'text-end' => 'Right',
       )),
        Field::make('text', 'mos_hero_banner_wrapper_class', __('Wrapper Class')),
        Field::make('text', 'mos_hero_banner_title_class', __('Title Class')),
        Field::make('text', 'mos_hero_banner_subtitle_class', __('Subtitle Class')),
        Field::make('text', 'mos_hero_banner_intro_class', __('Intro Class')),
        Field::make('text', 'mos_hero_banner_photo_class', __('Image Class')),
        Field::make('text', 'mos_hero_banner_btn_class', __('Button Class')),
   ))
    ->add_tab(__('Animation'), array(
        Field::make('separator', 'mos_hero_banner_title_animation_separator', __('Title')),
        Field::make('select', 'mos_hero_banner_title_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_hero_banner_title_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_hero_banner_subtitle_animation_separator', __('Sub Title')),
        Field::make('select', 'mos_hero_banner_subtitle_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_hero_banner_subtitle_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_hero_banner_intro_animation_separator', __('Intro')),
        Field::make('select', 'mos_hero_banner_intro_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_hero_banner_intro_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_hero_banner_photo_animation_separator', __('Image')),
        Field::make('select', 'mos_hero_banner_photo_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_hero_banner_photo_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_hero_banner_btn_animation_separator', __('Button')),
        Field::make('select', 'mos_hero_banner_btn_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_hero_banner_btn_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
   ))  
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_hero_banner_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_hero_banner_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))        
        
    /*->add_fields(array(
        Field::make('text', 'mos_sec_subtitle', __('Section Name')),
        Field::make('text', 'mos_sec_title', __('Section TagLine')),
        Field::make('text', 'mos_sec_desc', __('Section Intro')),
   ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        ?>
<div class="hero-banner-wrapper <?php echo @$fields['mos_hero_banner_wrapper_class']; ?> <?php echo @$attributes['className']; ?>">
    <div class="protfolio-banner d-flex justify-content-between align-items-center flex-wrap flex-md-nowrap <?php echo @$fields['mos_hero_banner_image_align'] ?>">
        
        <?php if(@$fields['mos_hero_banner_photo']) : ?>
        <div class="banner-img w-100 <?php echo @$fields['mos_hero_banner_photo_class']; ?> wow <?php echo @$fields['mos_hero_banner_photo_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_hero_banner_photo_animation_delay'] ?>ms">
            <?php echo wp_get_attachment_image($fields['mos_hero_banner_photo'], "full", "", array("class" => "img-fluid"));  ?>
        </div>
        <?php endif?>
        
        <div class="banner-text <?php echo @$fields['mos_hero_banner_text_align'] ?>">
           <?php if(@$fields['mos_hero_banner_subtitle']) : ?><h4 class="subtitle <?php echo @$fields['mos_hero_banner_subtitle_class']; ?> wow <?php echo @$fields['mos_hero_banner_subtitle_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_hero_banner_subtitle_animation_delay'] ?>ms"><?php echo do_shortcode($fields['mos_hero_banner_subtitle']); ?></h4><?php endif?>
           
            <?php if(@$fields['mos_hero_banner_title']) : ?>
            <h3 class="title <?php echo @$fields['mos_hero_banner_title_class']; ?> wow <?php echo @$fields['mos_hero_banner_title_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_hero_banner_title_animation_delay'] ?>ms">
                <?php echo do_shortcode($fields['mos_hero_banner_title']); ?>
                <span>
                    <svg width="26" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-3">
                        <path d="M3.37143 19.7688C2.72381 20.1541 2.11429 20.0578 1.54286 19.4798C1.00952 18.8632 1.00952 18.3044 1.54286 17.8035C2.7619 16.5318 3.6 15.5877 4.05714 14.9711C4.51429 14.316 4.7619 13.6031 4.8 12.8324C4.91429 11.9846 4.68571 11.5607 4.11429 11.5607C2.97143 11.5607 2 11.0597 1.2 10.0578C0.4 9.05588 0 7.76493 0 6.18497C0 4.33526 0.514286 2.85164 1.54286 1.7341C2.60952 0.578034 4.01905 0 5.77143 0C7.44762 0 8.87619 0.635838 10.0571 1.90751C11.2381 3.17919 11.8286 4.87476 11.8286 6.99422C11.8286 12.0039 9.00952 16.262 3.37143 19.7688ZM17.5429 19.7688C16.8952 20.1541 16.2857 20.0578 15.7143 19.4798C15.181 18.9017 15.181 18.343 15.7143 17.8035C16.9333 16.5318 17.7714 15.5877 18.2286 14.9711C18.6857 14.316 18.9524 13.6031 19.0286 12.8324C19.1048 11.9846 18.8571 11.5607 18.2857 11.5607C17.1429 11.5607 16.1714 11.0597 15.3714 10.0578C14.5714 9.01734 14.1714 7.7264 14.1714 6.18497C14.1714 4.33526 14.6857 2.85164 15.7143 1.7341C16.781 0.578034 18.1905 0 19.9429 0C21.619 0 23.0476 0.635838 24.2286 1.90751C25.4095 3.17919 26 4.87476 26 6.99422C26 12.0039 23.181 16.262 17.5429 19.7688Z" fill="#015EA5"></path>
                    </svg>
                </span>
            </h3>
            <?php endif?>
            
            <?php if(@$fields['mos_hero_banner_intro']) : ?>
            <div class="intro <?php echo @$fields['mos_hero_banner_intro_class']; ?> wow <?php echo @$fields['mos_hero_banner_intro_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_hero_banner_intro_animation_delay'] ?>ms">
                <?php echo do_shortcode($fields['mos_hero_banner_intro']); ?>
            </div>
            <?php endif?>   
                     
            <?php if(@$fields['mos_hero_banner_btn_title'] && @$fields['mos_hero_banner_btn_link']) : ?>
            <div class="common-btn <?php echo @$fields['mos_hero_banner_btn_class']; ?> wow <?php echo @$fields['mos_hero_banner_btn_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_hero_banner_btn_animation_delay'] ?>ms">
                <a href="<?php echo do_shortcode($fields['mos_hero_banner_btn_link']) ?>" class="fill-btn fw-semi-bold text-gray_1 lh-20 text-decoration-none bg-flourescent_blue radius-4 d-inline-flex align-items-center gap-2">
                    <span><?php echo do_shortcode($fields['mos_hero_banner_btn_title']) ?></span>
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.5117 8.82164L10.9342 5.24414L9.75591 6.42247L12.5001 9.16664H4.16675V10.8333H12.5001L9.75591 13.5775L10.9342 14.7558L14.5117 11.1783C14.8242 10.8658 14.9997 10.4419 14.9997 9.99997C14.9997 9.55803 14.8242 9.13419 14.5117 8.82164Z" fill="#002448"></path>
                        </svg>
                    </span>
                </a>
            </div>
            <?php endif?>
        </div>
    </div>
</div>
<?php if(@$fields['mos_hero_banner_style']) : ?>
<style><?php echo $fields['mos_hero_banner_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_hero_banner_script']) : ?>
<script><?php echo $fields['mos_hero_banner_script']; ?></script>
<?php endif?>
        <?php
    });
    //Hero Banner end
    //CTA start
    Block::make(__('CTA'))
    ->add_tab(__('Content'), array(
        Field::make('text', 'mos_cta_title', __('Title')),
        Field::make('text', 'mos_cta_shortcode', __('Form Shortcode')),
        Field::make('text', 'mos_cta_hints', __('Phone Hints')),
        Field::make('textarea', 'mos_cta_intro', __('Intro')),
        Field::make('image', 'mos_cta_photo', __('Image')),
   ))
    ->add_tab(__('Style'), array(
        Field::make('select', 'mos_cta_image_align', __('Image Position'))
        ->set_options(array(
            'flex-row' => 'Left',
            'flex-row-reverse' => 'Right',
       )),
        Field::make('select', 'mos_cta_text_align', __('Text Alignment'))
        ->set_options(array(
            'text-start' => 'Left',
            'text-center' => 'Center',
            'text-end' => 'Right',
       )),
        Field::make('text', 'mos_cta_wrapper_class', __('Wrapper Class')),
        Field::make('text', 'mos_cta_title_class', __('Title Class')),
        Field::make('text', 'mos_cta_shortcode_class', __('Form Class')),
        Field::make('text', 'mos_cta_intro_class', __('Intro Class')),
        Field::make('text', 'mos_cta_photo_class', __('Image Class')),
        Field::make('text', 'mos_cta_btn_class', __('Image Class')),
   ))
    ->add_tab(__('Animation'), array(
        Field::make('separator', 'mos_cta_title_animation_separator', __('Title')),
        Field::make('select', 'mos_cta_title_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_cta_title_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),        
        
        Field::make('separator', 'mos_cta_intro_animation_separator', __('Intro')),
        Field::make('select', 'mos_cta_intro_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_cta_intro_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_cta_shortcode_animation_separator', __('Form')),
        Field::make('select', 'mos_cta_shortcode_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_cta_shortcode_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_cta_photo_animation_separator', __('Image')),
        Field::make('select', 'mos_cta_photo_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_cta_photo_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
        
        Field::make('separator', 'mos_cta_btn_animation_separator', __('Button')),
        Field::make('select', 'mos_cta_btn_animation_option', __('Animation'))
        ->add_options($animation_options),
        Field::make('text', 'mos_cta_btn_animation_delay', __('Animation Delay'))
        ->set_default_value('0')
        ->set_help_text('Please add animation delay without unit, unit will be ms.'),
   ))  
    ->add_tab(__('Advanced'), array(
        Field::make('textarea', 'mos_cta_style', __('Style'))
        ->set_help_text('Please write your custom css without style tag'),
        Field::make('textarea', 'mos_cta_script', __('Script'))
        ->set_help_text('Please write your custom script without script tag'),
   ))        
        
    /*->add_fields(array(
        Field::make('text', 'mos_sec_subtitle', __('Section Name')),
        Field::make('text', 'mos_sec_title', __('Section TagLine')),
        Field::make('text', 'mos_sec_desc', __('Section Intro')),
   ))*/
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
        $phones = carbon_get_theme_option('mos-contact-phone');
        ?>

<div class="cta-wrapper <?php echo @$fields['mos_cta_wrapper_class']; ?> <?php echo @$attributes['className']; ?>">
    <div class="row align-items-center gx-5  <?php echo @$fields['mos_cta_image_align'] ?>">
        <div class="col-lg-6">
            <div class="CTA-left">
                <?php if(@$fields['mos_cta_photo']) : ?>
                    <div class="CTA-img <?php echo @$fields['mos_cta_photo_class']; ?> wow <?php echo @$fields['mos_cta_photo_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_cta_photo_animation_delay'] ?>ms">
                        <?php echo wp_get_attachment_image($fields['mos_cta_photo'], "full", "", array("class" => "img-fluid"));  ?>
                    </div>
                <?php endif?>
                <?php if($phones && sizeof($phones)) : ?>
                <a href="tel:<?php echo (@$phones[0]['number'])?preg_replace("/\s+/", "",$phones[0]['number']):''  ?>" class="CTA-call-btn d-flex align-items-center gap-3 text-decoration-none rounded-pill mx-3 <?php echo @$fields['mos_cta_btn_class']; ?> wow <?php echo @$fields['mos_cta_btn_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_cta_btn_animation_delay'] ?>ms">
                    <span class="CTA-call-icon">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/call-icon-with-bg.svg" alt="Call to action" class="img-fluid" width="68" height="68">
                    </span>
                    <span class="">
                        <?php if(@$fields['mos_cta_hints']) : ?>
                        <span class="fs-5 fw-bold text-gray_8 d-block mb-1">
                            <?php echo do_shortcode($fields['mos_cta_hints'])?>
                        </span>
                        <?php endif?>
                        <span class="fs-30 fw-bold text-indigo_dye d-block">
                            <?php echo @$phones[0]['number'] ?>
                        </span>
                    </span>
                </a>                    
                <?php endif?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="CTA-form-wrapper <?php echo @$fields['mos_cta_text_align']; ?>">
                <?php if(@$fields['mos_cta_title']) : ?>
                <h4 class="title <?php echo @$fields['mos_cta_title_class']; ?> wow <?php echo @$fields['mos_cta_title_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_cta_title_animation_delay'] ?>ms">
                    <?php echo do_shortcode($fields['mos_cta_title'])?>
                </h4>
                <?php endif?>
                <?php if(@$fields['mos_cta_intro']) : ?>
                <div class="intro <?php echo @$fields['mos_cta_intro_class']; ?> wow <?php echo @$fields['mos_cta_intro_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_cta_intro_animation_delay'] ?>ms">
                    <?php echo do_shortcode($fields['mos_cta_intro'])?>
                </div>
                <?php endif?>
                <div class="CTA-form <?php echo @$fields['mos_cta_shortcode_class']; ?> wow <?php echo @$fields['mos_cta_shortcode_animation_option'] ?>" data-wow-delay="<?php echo @$fields['mos_cta_shortcode_animation_delay'] ?>ms">
                    <?php echo do_shortcode($fields['mos_cta_shortcode'])?>
                </div>

            </div>
        </div>
    </div>
</div>     

<?php if(@$fields['mos_cta_style']) : ?>
<style><?php echo $fields['mos_cta_style']; ?></style>
<?php endif?>
<?php if(@$fields['mos_cta_script']) : ?>
<script><?php echo $fields['mos_cta_script']; ?></script>
<?php endif?>
        <?php
    });
    //CTA end
}