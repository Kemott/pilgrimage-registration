<?php
    function tb_pr_parishes_post_type(){
        register_post_type('parish', [
            'label' => 'Parafie',
            'show_ui' => true,
            'show_in_menu' => 'tb-pr-pilgrimage',
            'show_in_rest' => true,
            'menu_position' => 2,
            'menu_icon' => 'dashicons-admin-multisite',
            'supports' => array('title')
        ]);

        register_taxonomy('city', 'parish', array(
            'label' => 'Miejscowości'
        ));
    }

    function tb_pr_path_post_type(){
        register_post_type('path', [
            'label' => 'Trasa',
            'show_ui' => true,
            'show_in_menu' => 'tb-pr-pilgrimage',
            'show_in_rest' => true,
            'menu_position' => 2,
            'menu_icon' => 'dashicons-admin-multisite',
            'supports' => array('title')
        ]);

        register_taxonomy('days', 'path', array(
            'label' => 'Dni'
        ));
    }

    function tb_pr_custom_post_types(){
        tb_pr_parishes_post_type();
        tb_pr_path_post_type();
    }

    add_action('init', 'tb_pr_custom_post_types');