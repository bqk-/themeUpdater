<?php
    /**
     *
     * @package scf-framework
     * @author Steve (6/11/2012)
     * @since 0.1
     */
    // WFC STANDARD FUNCTIONS //
    // ---------------------- //
    define('WFC_SITE_URL', get_bloginfo( 'url' ).'/');
    define('WFC_ADMIN_URL', admin_url());
    define('WFC_PT', dirname( __DIR__ ).'/');
    define('WFC_CONFIG', WFC_PT.'/wfc_config');
    define('WFC_THEME_FUNCTIONS', WFC_PT.'/theme_functions');
    define('WFC_WIDGETS', WFC_PT.'/widgets');
    define('WFC_SHORTCODE', WFC_PT.'/admin/shortcode');
    define('WFC_GLOBAL', WFC_PT.'/admin/global');
    define('WFC_URI', get_template_directory_uri());
    define('WFC_ADM', WFC_PT.'/admin');
    define('WFC_CSS_URI', WFC_URI.'/wfc_files/css');
    define('WFC_JS_URI', WFC_URI.'/wfc_files/js');
    define('WFC_IMG_URI', WFC_URI.'/wfc_files/images');
    define('WFC_ADM_CSS_URI', WFC_URI.'/wfc_files/admin/css');
    define('WFC_ADM_JS_URI', WFC_URI.'/wfc_files/admin/js');
    define('WFC_ADM_IMG_URI', WFC_URI.'/wfc_files/admin/images');
    /*
    ===============================
    MAIN INCLUDE FILE
     * @since 2.2
    ==============================
    */
    require_once(WFC_ADM.'/wfc_admin_config.php');