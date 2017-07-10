<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php if ( is_category() ) {
        echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
        } elseif ( is_tag() ) {
            echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
        } elseif ( is_archive() ) {
            wp_title(''); echo ' Archive | '; bloginfo( 'name' );
        } elseif ( is_search() ) {
            echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
        } elseif ( is_home() || is_front_page() ) {
            echo 'Home | '; bloginfo( 'name' );
        }  elseif ( is_404() ) {
            echo 'Error 404 Not Found | '; bloginfo( 'name' );
        } elseif ( is_single() ) {
            wp_title(''); echo ' | '; bloginfo( 'name' );
        } else {
            echo wp_title( ' | ', false, right ); bloginfo( 'name' );
        } ?>
    </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="La Pizzeria Restaurant">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.jpg">
    
        <?php wp_head(); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <!--<link rel="stylesheet" href="css/main.css"> -->
    </head>
    <body <?php body_class(); ?>>

    <header class="site-header">
        <div class="container">
            <div class="logo">
                <a href="<?= esc_url(home_url('/')); ?>">
                    <img src="<?= get_template_directory_uri(); ?>/img/logo.svg" alt="La Pizzeria Logo" class="logo-img">
                </a>

            </div><!-- .logo -->
            <div class="header-information">
                <div class="socials">
                    <?php 
                        $args = array(
                            'theme_location'    =>  'social-menu',
                            'container'         =>  'nav',
                            'container_class'   =>  'social-nav',
                            'container_id'      =>  'socials',
                            'link_before'       =>  '<span class="sr-text"',
                            'link_after'        =>  '</span>'   
                        );
                        wp_nav_menu($args);

                     ?>
                </div><!-- .socials -->
                <address class="header-address">
                    <?php $address = esc_html(get_option('lapizzeria_info_address')); 
                          $shop_hours = esc_html(get_option('lapizzeria_info_shophours')); 
                    ?>
                   <p><?php echo $address ?></p>
                   <p><?php echo $shop_hours ?></p>
                </address>
            </div><!-- .header-information -->
        </div><!-- .container -->
    </header><!-- .site-header -->

    <div class="main-menu">

        <div class="mobile-menu">
            <a href="#" class="mobile"><i class="fa fa-bars"></i> Menu</a>
        </div><!-- mobile-menu -->

        <div class="navigation container">
            <?php 
                $args = array(
                    'theme_location'    =>  'header-menu',
                    'container'         =>  'nav',
                    'container_class'   =>  'site-nav',
                );
                wp_nav_menu($args);

             ?>
        </div><!-- .navigation -->
    </div><!-- .main-menu -->