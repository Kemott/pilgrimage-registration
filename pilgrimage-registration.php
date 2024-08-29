<?php
    /*
    * Plugin Name: Pilgrimage Registration - Zapisy na pielgrzymkę
    * Version: 1.0.0
    * Author: Tomasz Burzyński
    */

    $mainFolderPath = __DIR__;
    $mainFilePath = __FILE__;
    include ($mainFolderPath.'/modules/tb-pr-shortcodes.php');
    include ($mainFolderPath.'/modules/tb-pr-rest.php');
    include ($mainFolderPath.'/modules/tb-pr-styles-and-scripts.php');
    include ($mainFolderPath.'/modules/tb-pr-admin-pages.php');
    include ($mainFolderPath.'/modules/tb-pr-custom-post-types.php');

