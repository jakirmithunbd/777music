
<?php 
/*
Template Name: About us
*/
get_header(); ?>

<div class="container">
    <div class="about-wrapper">
        <div class="row">
            <div class="col-md-8 col-sm-6">
                <div class="about-content">
                    <div class="about-title">
                        <h2 class="section-title"data-title="<?php the_title(); ?>"><?php the_title(); ?></h2>
                    </div>

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                        the_content();
                    endwhile; endif; wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="about-img">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="ig-images">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>