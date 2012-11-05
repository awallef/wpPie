<?php

/**
 * new post type "Prevention Campaigns" with relative hierarchical taxonomy "Campaign Themes"
 */
register_post_type('prevention_campaigns', array(
    'labels' => array(
        'name' => __('Prevention Campaigns'),
        'singular_name' => __('Prevention Campaign')
    ),
    'public' => true,
    'has_archive' => true,
    'rewrite' => array('slug' => 'campagnes'),
    'supports' => array('title','editor','thumbnail','custom-fields')
        )
);


register_taxonomy(  
    'campaign_theme',  
    'prevention_campaigns',  
    array(  
        'hierarchical' => true,  
        'label' => __('Campaign Themes'),  
        'query_var' => true,  
        'rewrite' => array('slug' => 'theme')  
    )  
);


?>
