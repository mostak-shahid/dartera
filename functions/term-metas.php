<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'mos_term_options');
function mos_term_options() {
    Container::make('term_meta', __('Category Properties'))
    ->where('term_taxonomy', '=', 'category')
    ->add_fields(array(
        Field::make('image', 'mos_category_image', __('Thumbnail')),
   ));
}