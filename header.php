<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if(is_front_page()){ echo' Home '; echo' | '; echo bloginfo('name'); } else { wp_title(''); echo' | '; bloginfo('name');  } ?></title>
    <?php if(get_field('favicon', 'options')) : ?>
        <link rel="icon" href="<?php the_field('favicon', 'options'); ?>" sizes="32x32" />
    <?php endif; ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5d12ffe75a6f55001254f3ac&product=inline-share-buttons' async='async'></script> -->
    </head>
    <?php wp_head(); ?>
    <div id="loader">
        <div class="overlay"></div>
        <div class="arrow">
            <img src="<?php echo get_theme_file_uri( '/assets/images/smiley.png' )?>" alt="">
        </div>
        <div class="line_yellow"></div>
    </div>
    <body <?php body_class('is_loading loading_finish'); ?>>

    <?php 
    $queried_object = get_queried_object();
    $logo = get_field('logo', 'options');
    ?>

    <div class="main-content-wrapper">
        <div class="container-fluid">
            <div class="left-side-menu">
                 <?php if (function_exists('wp_nav_menu')): ?>
                    <?php wp_nav_menu( 
                            array(
                            'menu'               => 'Left side Menu',
                            'theme_location'     => 'menu-1',
                            'depth'              => 3,
                            'container'          => 'false',
                            'menu_class'         => 'nav navbar-nav',
                            'menu_id'            => '',
                            'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                            'walker'             => new wp_bootstrap_navwalker()
                            ) 
                        ); 
                    ?>
                <?php endif; ?>

                <div class="toggle-menu-bar">
                    <span class="fas fa-chevron-right"></span>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="right-side-content">

                        <header class="header">
                            <nav class="navbar">
                                <div class="container">
                                    <div class="navbar-wrapper">
                                        <div class="navbar-header">
                    
                                            <div class="navbar-brand">
                                                <a href="<?php echo site_url(); ?>"><img src="<?php echo $logo; ?>" class="img-responsive" alt="Logo Image"></a>
                                            </div><!-- / Logo  -->
                    
                                            <a href="#sidr" class="openMenu navbar-toggle collapsed">
                                                <span class="fas fa-bars"></span>
                                            </a>
                    
                                        </div>
                                        <?php if(is_front_page()) : ?>                
                                        <div id="sidr" class="collapse navbar-collapse">
                                            <span class="fas fa-long-arrow-alt-right closeMenu hidden"></span>
                                            <?php if (function_exists('wp_nav_menu')): ?>
                                                <?php wp_nav_menu( 
                                                    array(
                                                    'menu'               => 'Top Menu',
                                                    'theme_location'     => 'menu-2',
                                                    'depth'              => 3,
                                                    'container'          => 'false',
                                                    'menu_class'         => 'nav navbar-nav',
                                                    'menu_id'            => '',
                                                    'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                                    'walker'             => new wp_bootstrap_navwalker()
                                                    ) 
                                                    ); 
                                                ?>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </nav><!-- / navigation  -->
                        </header><!-- / Header Area  -->
    