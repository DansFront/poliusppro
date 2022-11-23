<?php get_header(); ?>

<?php
	if ( have_posts() ) :

		/* Start the Loop */
		while ( have_posts() ) : the_post();

		endwhile;
	endif;
?>
<?php get_sidebar(); ?>

<?php get_footer();
