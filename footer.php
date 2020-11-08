                
    <!-- main-content-wrapper -->    
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contact-form-wrapper">
                        <?php $graphic_left = get_field('graphic_left', 'options'); ?>
                        <img src="<?php echo $graphic_left['url']; ?>" alt="<?php echo $graphic_left['title']; ?>">
                        
                        <div class="contact-form">
                            <h2><?php the_field('contact_top_title', 'options'); ?></h2>
                            <?php echo do_shortcode('[contact-form-7 id="84" title="Stay in the know"]'); ?>
                        </div>
                    </div>
                </div> <!-- col-md-6 -->
                <div class="col-sm-6">
                    <div class="contact-form-wrapper footer-right">
                    <?php $graphic_right = get_field('graphic_right', 'options'); ?>
                        <img src="<?php echo $graphic_right['url']; ?>" alt="<?php echo $graphic_right['title']; ?>">
                        <div class="footer-menu">
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
                        
                        <div class="social-media">
                            <?php $social_media = get_field('social_media', 'options'); if($social_media) : foreach ($social_media as $social_item) : ?>
                                <a target="_blank" href="<?php echo $social_item['url'] ?>">
                                    <span class="fab fa-<?php echo $social_item['icon']['value']; ?>"></span>
                                </a>
                                <?php endforeach; endif; ?>
                            </div>
                        </div><!-- footer-menu -->
                            
                    </div>
                </div><!-- col-md-6 -->
            </div>
        </div>
    </footer>
  <?php wp_footer(); ?>
    </body>
</html>