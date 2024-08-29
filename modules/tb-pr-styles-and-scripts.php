<?php

    function tb_pr_add_styles(){
        global $mainFilePath;
        wp_enqueue_style('tb-pr-style', plugins_url('tb-pr-style.css', $mainFilePath));
        wp_enqueue_style('tb-pr-bootstrap', plugins_url('bootstrap/css/bootstrap.css', $mainFilePath));
        wp_enqueue_script('tb-pr-script', plugins_url('js/tb-pr-script.js', $mainFilePath));
    }

    add_action('wp_enqueue_scripts', 'tb_pr_add_styles');
    add_action('admin_enqueue_scripts', 'tb_pr_add_styles');

    function tb_pr_add_admin_scripts(){
        global $mainFolderPath;
        wp_enqueue_script('media-upload');
        wp_enqueue_media();
        wp_enqueue_script('tb-pr-media-upload', $mainFolderPath.'/js/tb-pr-media-script.js');
    }

    add_action('admin_print_scripts', 'tb_pr_add_admin_scripts');