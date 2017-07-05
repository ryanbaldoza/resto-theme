<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>La Pizzeria</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
    
        <?php wp_head(); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <!--<link rel="stylesheet" href="css/main.css"> -->
    </head>
    <body>

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
                    <p>1234 San Juan, Apalit, Pampanga</p>
                    <p>Phone Number: +45-301-7890</p>
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