
<?php 
/*
Template Name: Artist
*/
get_header(); ?>

<div class="artist-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-title"data-title="<?php the_title(); ?>"><?php the_title(); ?></h2>

                <?php $args = array( 'post_type'=> 'artist', 'posts_per_page' => -1, 'orderby'=> 'title', 'order' => 'ASC' ); ?>
                <div class="artist-list-wrapper">
                <?php $query = new WP_Query(array(
                        'post_type' => 'artist',
                        'posts_per_page' => -1,
                        'orderby'=> 'title', 
                        'order' => 'ASC'
                    )) ?>

                    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                        <div class="artist">
                            <?php $title = get_the_title(); for($i = 1; $i <= 1; $i++) : ?>
                            <span data-title="<?php echo $title[0]; ?>" class="section-title artists-first-letter"><?php echo $title[0]; ?></span>
                            <?php endfor; ?>
                            <ul class="artists-list">
                                <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""> <?php the_title(); ?></a></li>
                            </ul>
                        </div>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</div>



</div> <!-- right-side-content -->
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>