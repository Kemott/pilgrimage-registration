<?php

    function tb_pr_custom_post_types(){
        register_post_type('parish', [
            'label' => 'Parafie',
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-admin-multisite',
            'supports' => array('title')
        ]);

        register_taxonomy('city', 'parish', array(
            'label' => 'Miejscowości'
        ));
    }

    add_action('init', 'tb_pr_custom_post_types');