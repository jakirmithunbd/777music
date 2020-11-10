<?php get_header(); ?>

<?php echo get_template_part( 'template-parts/page-header' ); ?>



<section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-details wow fadeInUp">
                        <?php if (have_posts()): while (have_posts()): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
                    </div> <!-- right-side-content -->
                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>