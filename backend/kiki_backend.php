<?php

defined("ABSPATH") or exit();


/**
 * kiki_admin_menu function
 * @return void
 */
function kiki_admin_menu()
{
    $kiki_dashBoard         = add_menu_page( "kiki slider dashboard", "KiKi Slides", "manage_options", "kiki-dashboard", "kiki_dashboard", "dashicons-art" );
    $kiki_addNewSlide       = add_submenu_page("kiki-dashboard", "Add New Slide", "Add New Slide" ,"manage_options", "kiki-addSlide" , "kiki_addNewSlide");
    $kiki_Categorys         = add_submenu_page("kiki-dashboard", "kiki slider Categories", "Categories" ,"manage_options", "kiki-Categorys" , "kiki_Categorys");
    $kiki_about             = add_submenu_page("kiki-dashboard", "About KiKi Slider", "About KiKi Slider" ,"manage_options", "kiki-about" , "kiki_aboutPlugin");

    add_action("load-{$kiki_dashBoard}", "kiki_loadAdminScript");
    add_action("load-{$kiki_dashBoard}", "kiki_loadCustomScript");
    add_action("load-{$kiki_addNewSlide }", "kiki_loadAdminScript");
    add_action("load-{$kiki_addNewSlide }", "kiki_loadCustomScript");
    add_action("load-{$kiki_Categorys}", "kiki_loadAdminScript");
    add_action("load-{$kiki_Categorys}", "kiki_loadCustomScript");
    add_action("load-{$kiki_about}", "kiki_loadAdminScript");
    add_action("load-{$kiki_about}", "kiki_loadCustomScript");
}

/**
 * kiki_loadAdminScript function
 *
 * @return void
 */
function kiki_loadAdminScript()
{
    // load admin css style
    wp_register_style("kiki_loadStyle", KIKI_CSS_URL . "admin_style.css");
    wp_enqueue_style("kiki_loadStyle");

    // load admin js file
    wp_register_script("kiki_loadAjaxJs", KIKI_JS_URL . "admin_ajax.js", "jquery");
    wp_localize_script("kiki_loadAjaxJs", "phpToJsPath", array("ajaxurl"=>admin_url("admin-ajax.php")) );
    wp_enqueue_script("kiki_loadAjaxJs");
}

function kiki_loadCustomScript()
{
    //load jquery.min.css
    wp_register_style("kiki_loadJqueryUICss", KIKI_JS_URL . "jquery-ui-1.12.1/jquery-ui.min.css", "jquery");
    wp_enqueue_style("kiki_loadJqueryUICss");

    //load jquery.min.js
    wp_register_script("kiki_loadJqueryUIJs", KIKI_JS_URL . "jquery-ui-1.12.1/jquery-ui.min.js", "jquery");
    wp_enqueue_script("kiki_loadJqueryUIJs");
}
