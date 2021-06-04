<?php
/**
 * Template part for displaying posts on the index page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FreeFrom
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php freefrom_post_thumbnail( 'blog-thumb' ); ?>

	<header class="entry-header">

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</header><!-- .entry-header -->

	<?php freefrom_posted_on(); ?>

</article><!-- #post-<?php the_ID(); ?> -->
