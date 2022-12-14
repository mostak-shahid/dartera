<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
add_action('carbon_fields_register_fields', 'mos_post_meta_options');

function mos_post_meta_options() {
    Container::make('post_meta', 'Post data')
    ->where('post_type', '=', 'post')
    ->add_fields(array(
        Field::make('text', 'mos_post_badge', 'Badge'),
        Field::make( 'checkbox', 'mos_tranding_post', __( 'Trending post?' ) )
        ->set_option_value( 'yes' ),
        Field::make( 'checkbox', 'mos_known_post', __( 'Known post?' ) )
        ->set_option_value( 'yes' ),
    ));
    Container::make('post_meta', 'Case study data')
    ->where('post_type', '=', 'case_study')
    ->add_fields(array(
        Field::make('text', 'mos_post_badge', 'Badge'),
    ));
    Container::make('post_meta', 'Project Data')
    ->where('post_type', '=', 'project')
    ->add_fields(array(
        Field::make('text', 'mos_post_badge', 'Badge'),        
        Field::make( 'association', 'mos_project_page', __( 'Linked Page' ) )
        ->set_types( array(
            array(
                'type'      => 'post',
                'post_type' => 'page',
            )
        ))
        ->set_max(1),
    ));
}