<?php
    /**
     *
     * @package scf-framework
     * @author Steve (7/17/2013)
     * @version 4.0
     */
    require_once('wfc_config/wfc_config.php');

    /*
    ===============================
    FRAMEWORK SETUP
    ===============================
    */
    add_action( 'after_setup_theme', 'wfc_framework_setup' );
    if( !function_exists( 'wfc_framework_setup' ) ):
        function wfc_framework_setup(){
            /*
            ===============================
            ADD IMAGE SIZES
            ===============================
            */
            add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size( 980, 328, true );
            add_image_size( 'subpage-banners', 980, 328, true );
            add_image_size( 'campaign', 980, 497, true );
            /*
            ===============================
            REGISTERING NAVIGATION MENUS
            ===============================
            */
            register_nav_menu( 'Primary', 'Primary Navigation' );
        }
    endif; // wfc_framework_setup

    $campaign_meta_boxes_args = array(
        'cpt'       => 'Campaign' /* CPT Name */,
        'menu_name' => 'Campaign' /* Overide the name above */,
        'meta_box'  => array(
            'title'     => 'Campaing Meta Info',
            'new_boxes' => array(
                array(
                    'field_title' => 'Link to URL: ',
                    'type_of_box' => 'text',
                    'desc'        => 'Ex. http://www.google.com/', /* optional */
                ),
                array(
                    'field_title' => 'Read More Button: ',
                    'type_of_box' => 'text',
                    'desc'        => 'Ex. Learn More, See More, Read More', /* optional */
                )
            )
        ),
    );
    $campaign_meta_boxes = new wfc_meta_box_class($campaign_meta_boxes_args);
    /*
    === Add theme specific functions below.
    === If you feel you need to edit the framework files consult a manager first.
    */
    add_image_size( 'spotlight-thumb', 255, 131, true );
    register_nav_menu( 'Quick Links', 'Quick Links' );
    add_action( 'wp_enqueue_scripts', 'wfc_js_scripts' );
    function wfc_js_scripts(){
        wp_register_script( 'wfc.extensions', WFC_JS_URI.'/extensions.js', '', '', true );
        wp_register_script( 'wfc.plugins', WFC_JS_URI.'/plugins.js', '', '', true );
        wp_enqueue_script( 'wfc.plugins' );
        wp_enqueue_script( 'wfc.extensions' );
    }

    add_action( 'wp_enqueue_scripts', 'wfc_css_styles' );
    function wfc_css_styles(){
        wp_register_style( 'wfc-extensions', WFC_CSS_URI.'/extensions.css' );
        wp_enqueue_style( 'wfc-extensions' );
    }

    function Wfc_Core_Page_Loop(){
        global $wpdb;
        global $post;
        echo '<div class="row">';
        echo '<div id="content" class="span9">';
        while( have_posts() ) : the_post();
            echo '<h2 id="wfc-the-title">'.get_the_title().'</h2>';
            the_content();
        endwhile;
        wp_reset_query();
        echo '</div><!-- //#content -->';
        dynamic_sidebar();
        echo '</div>';
    }

    function Wfc_Core_Home_Page_Loop(){
        global $wpdb;
        global $post;
        $query = new WP_Query(array('post_type' => 'pages', 'pagename' => 'home'));
        while( $query->have_posts() ) : $query->the_post();
        echo '<div id="content">';
            echo '<h2 id="wfc-the-title">'.get_the_title().'</h2>';
            the_content();
        endwhile;
        wp_reset_query();
        echo '</div><!-- //#content -->';
    }

    function Wfc_Core_Homecontent_Loop(){
        global $wpdb;
        $query = new WP_Query(array('post_type' => 'homeboxes', 'order' => 'ASC'));
        if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
            <div id="block">
                <h2><?php echo get_the_title(); ?></h2>
                <?php the_post_thumbnail( 'large' ); ?>
                <?php echo get_the_content(); ?>
            </div>
            <a class="learn_more" href="<?php echo get_post_meta( get_the_ID(), 'wfc_homeboxes_link', true ); ?>">Learn More</a>
        <?php
        endwhile;endif;
        wp_reset_query();
    }

    /*
    ===============================
    REGISTER SIDEBARS
    ===============================
    */
    if( !function_exists( 'Wfc_Register_Sidebars' ) ):
        function Wfc_Register_Sidebars(){
            register_sidebar(
                array(
                     'name'          => 'Right Sidebar',
                     'id'            => 'sidebar-1',
                     'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                     'after_widget'  => "</aside>",
                     'before_title'  => '<h3 class="widget-title">',
                     'after_title'   => '</h3>',
                     'description'   => ''
                ) );
        }
    endif; // wfc_framework_setup
    add_action( 'after_setup_theme', 'Wfc_Register_Sidebars' );



















