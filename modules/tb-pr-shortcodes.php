<?php
    function tb_pr_form_shortcode(){
        global $mainFolderPath;
        include($mainFolderPath.'/views/registration.php');
    }

    add_shortcode('tb_pr_form', 'tb_pr_form_shortcode');