
<?php 
/*
Template Name: Artist
*/
get_header(); ?>

<div class="artist-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 id="artist-page-title" class="section-title"data-title="<?php the_title(); ?>"><?php the_title(); ?></h2>
            </div>
        </div>

        <div class="row eq-height">
            <?php  $args = array(
            'orderby' => 'title',
            'order' => 'ASC',
            'post_type' => 'artist',
            'posts_per_page' => -1
        );
        $artists = get_posts( $args );
        $sorted = array();
        $letter_counter = 0;
        $artist_counter = 0;
        foreach ($artists as $artist) {
            $name = strtolower( $artist->post_title );
            $char = $name[0];
            if ( ! isset( $sorted[ $char ] ) ) {
                $sorted[ $char ] = array();
                $letter_counter++;
            }
            $artist_counter++;
            $sorted[ $char ][] = array(
                'nom' => $artist->post_title,
                'url' => get_permalink($artist->ID),
                'img' => get_the_post_thumbnail_url($artist->ID )
            );
        }
        ksort( $sorted );
        $artists_list = '';
        $divider = round($artist_counter/4, 0);
        $cpt = 0;
        $letter_counter = 0;
        foreach($sorted as $character => $artists) {
            echo '<div class="col-12 col-md-4 col-lg-4"><span data-title="' . strtoupper($character) . '" class="artists-first-letter section-title">' . strtoupper($character) . '</span>';
            echo '<ul class="artists-list">';
            foreach ($artists as $artist) {
                // var_dump($artist);
                printf('<li><a href="%s" title="%s"> <img src="%s"> %s</a></li>', $artist['url'], $artist['nom'], $artist['img'], $artist['nom']);
                $cpt++;
            }
            echo '</ul></div>';
        } ?>
        </div>
    </div>
</div>




</div> <!-- right-side-content -->
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>