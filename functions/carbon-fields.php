<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', 'crb_attach_user_meta_options');

function crb_attach_user_meta_options() {
    Container::make('user_meta', 'Address')
            ->add_fields(array(
                Field::make('image', 'mos_profile_image', __('Profile Image'))
                ->set_type(array('image'))
                ->set_value_type('url'),
                Field::make('text', 'mos_profile_designation', 'Designation'),
    ));
}