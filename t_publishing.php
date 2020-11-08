
<?php 
/*
Template Name: Publishing
*/
get_header(); ?>

    <div class="container">
        <div class="artist-wrapper">

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

        </div>
    </div>

    </div> <!-- right-side-content -->
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>