<?php
    function tb_pr_options_page(){
        global $mainFolderPath;
        include ($mainFolderPath.'/views/pages/options.php');
    }

    function tb_pr_pilgrimages_page(){
        global $mainFolderPath;
        include ($mainFolderPath.'/views/pages/pilgrimages.php');
    }

    function tb_pr_register_settings(){
        register_setting('tb-pr', 'tb-pr-consent-under-age');
        register_setting('tb-pr', 'tb-pr-regulations');
        register_setting('tb-pr', 'tb-pr-cost-per-day');
        register_setting('tb-pr', 'tb-pr-package-cost');
        register_setting('tb-pr', 'tb-pr-t-shirt-cost');
    }

    function tb_pr_set_admin_pages(){
        add_menu_page('Pielgrzymka', 'Pielgrzymka', 'manage_options', 'tb-pr-pilgrimage', '', 'dashicons-location-alt', 2);
        add_submenu_page('tb-pr-pilgrimage', "Edycje", 'Edycje', 'manage_options', 'tb-pr-pilgrimages', 'tb_pr_pilgrimages_page');
        add_submenu_page('tb-pr-pilgrimage','Ustawienia', 'Ustawienia', 'manage_options', 'tb-pr-registration', 'tb_pr_options_page', 'dashicons-groups');
        add_action('admin_init', 'tb_pr_register_settings');
    }

    add_action('admin_menu', 'tb_pr_set_admin_pages');