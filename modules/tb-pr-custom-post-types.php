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
            'label' => 'Miejscowości',
            'show_in_rest' => true
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
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'public' => true
        ]);

        register_taxonomy('days', 'path', array(
            'label' => 'Dni',
            'show_in_rest' => true
        ));
        register_taxonomy('stop_type', 'path', array(
            'label' => 'Typ',
            'show_in_rest' => true
        ));
    }

    function tb_pr_custom_post_types(){
        tb_pr_parishes_post_type();
        tb_pr_path_post_type();
    }

    add_action('init', 'tb_pr_custom_post_types');