<?php

    get_header();
    //"The Loop" - output any content in WordPress as a catch all
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_title('<h2>', '</h2>');
            the_content();
        endwhile;
    else:
        _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
    endif;
    get_footer();

?>
