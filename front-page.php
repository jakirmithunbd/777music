<?php 
/*
Template Name: Home
*/
get_header(); 
?>
                    <div class="container">
                        <div class="artist-wrapper">

                        <h3><?php the_field('top_heading'); ?></h3>

                            <div class="artist-items-wrapper">

                                <?php $query = new WP_Query(array(
                                    'post_type' => 'artist',
                                    'posts_per_page' => -1
                                )) ?>

                                <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <div class="artist-item">
                                        <div href="<?php the_permalink()?>" class="media">
                                            <img src="<?php echo get_the_post_thumbnail_url()?>" alt="">
                                            <a class="title" href="<?php the_permalink()?>"><?php the_title()?></a>
                                        </div>
                                    </div>
                                <?php endwhile; endif; wp_reset_postdata(); ?>

                            </div>
                            <?php $btn = get_field('button'); ?>
                            <div class="text-center">
                                <a target="<?php echo $btn['target']; ?>" href="<?php echo $btn['url']; ?>" class="btn"><?php echo $btn['title']; ?></a>
                            </div>
                        </div>
                    </div>
                    </div> <!-- right-side-content -->
                </div>
            </div>
        </div>
    </div>

    <!-- ig-feed -->
    
    <div class="ig-feed">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="ig-feed-title">
                        <h2 id="igfeed_title_animation" class="section-title"data-title="<?php _e('Ig feed', 'music') ?>"><?php _e('Ig feed', 'music') ?></h2>
                    </div>
                    <?php $ig_feed = get_field('instagram_feed'); ?>
                    <div class="ig-images">
                        <?php echo do_shortcode($ig_feed); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- youtube & newa -->

    <div class="youtube-news">
        <div class="container-fluid">
            <div class="row eq-height">
                <div class="col-lg-6 padding-0">
                    <div class="youtube-side">
                        <div class="youtube-title">
                            <h2 id="youtube_title_animation" class="section-title"data-title="<?php _e('Youtube', 'music') ?>"><?php _e('Youtube', 'music') ?></h2>
                        </div>
                        <div class="youtube-video">
                            <?php the_field('youtube'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 padding-0">
                    <div class="news-side">
                        <div class="news-title">
                            <h2 id="newsfeed_title_animation" class="section-title"data-title="<?php _e('News Feed', 'music') ?>"><?php _e('News Feed', 'music') ?></h2>
                        </div>
                        <div class="news-video">
                            <?php $twitter = get_field('twitter_feed'); echo do_shortcode($twitter); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>