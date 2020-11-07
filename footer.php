                
    <!-- main-content-wrapper -->    
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-form-wrapper">
                        <img src="../assets/images/footer-graphic-1.svg" alt="">

                        <div class="contact-form">
                            <h2>stay in the know</h2>
                            <form action="">
                                <div class="form-group">
                                    <label for="uname">name :</label>
                                    <input type="text" id="uname" name="uname" required>
                                </div>
                                <div class="form-group">
                                   <label for="email">Email :</label>
                                   <input type="email" id="email" name="email">
                                </div>
                                <button type="submit" class="btn btn-default">sign up</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- col-md-6 -->
                <div class="col-md-6">
                    <div class="contact-form-wrapper">
                        <img src="<?php echo get_theme_file_uri( '/assets/images/footer-graphic-2.svg' )?>" alt="">
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
                        </div><!-- footer-menu -->
                        <div class="social-media">
                        <?php $social_media = get_field('social_media'); if($social_media) : foreach ($social_media as $social_item) : ?>
                            <a target="_blank" href="<?php echo $social_item['url'] ?>">
                                <span class="fab fa-<?php echo $social_item['icon']['value']; ?>"></span>
                            </a>
                        <?php endforeach; endif; ?>
                        </div>
                      
                    </div>
                </div><!-- col-md-6 -->
            </div>
        </div>
    </footer>
  <?php wp_footer(); ?>
    </body>
</html>