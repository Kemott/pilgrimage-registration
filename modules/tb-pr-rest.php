<?php
    function tb_pr_activate_registration_action(WP_REST_Request $request){
        
    }

    add_action('rest_api_init', function(){
        register_rest_route('tb-pr/v1', '/registration/activate', array(
            'methods' => 'GET',
            'callback' => 'tb_pr_activate_registration_action'
        ));
    });