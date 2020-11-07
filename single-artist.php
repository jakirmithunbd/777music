<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-7 col-sm-6">
            <div class="artiste-content">
                <div class="artste-title">
                    <?php $language = get_field('language_logo'); ?>
                    <div class="artiste-flag">
                        <img src="<?php echo $language['url']; ?>" alt="ig-images">
                    </div>
                    <h2 class="section-title"data-title="Boy Pablo"><?php the_title(); ?></h2>
                </div>

                <?php echo get_field('content'); ?>

                <div class="social-icon">
                    <?php $social_media = get_field('social_media'); if($social_media) : foreach ($social_media as $social_item) : ?>
                        <a target="_blank" href="<?php echo $social_item['url'] ?>">
                            <span class="fab fa-<?php echo $social_item['icon']['value']; ?>"></span>
                        </a>
                    <?php endforeach; endif; ?>
                </div>
            </div>

            <div class="listen">
                <div class="listen-title artste-title">
                    <h2 class="section-title"data-title="listen">listen <?php _e('events', 'music'); ?></h2>    
                </div>
                <div class="listen-ply">
                    <img src="../assets/images/listen-play.jpg" alt="ig-images">
                </div>
            </div> <!-- listen -->
        </div>

        <div class="col-md-5 col-sm-6">
            <div class="vertical-slider">
                <?php $gallery = get_field('gallery'); if($gallery) : foreach ($gallery as $item) : ?>
                    <div class="vertical-slider-item">
                        <img src="<?php echo $item['url']; ?>" alt="<?php echo $item['title']; ?>">
                    </div><!-- vertical-slider-item -->
                <?php endforeach; endif; ?>
            </div><!-- vertical-slider -->
        </div>
    </div>
</div><!-- container -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="events-title artste-title">
                <h2 class="section-title"data-title="events"><?php _e('events', 'music'); ?></h2>    
            </div>
            <div class="events">
                <?php echo do_shortcode('[bandsintown_events]'); ?>
            </div>

        </div>
    </div>
</div><!-- container -->

<?php get_footer(); ?>