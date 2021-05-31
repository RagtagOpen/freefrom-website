<?php
/**
 * Template part for displaying team member content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FreeFrom
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php freefrom_post_thumbnail( 'headshot' ); ?>

	<div class="team-member">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content();
			?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
