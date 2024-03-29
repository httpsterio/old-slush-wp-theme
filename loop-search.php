<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if (!have_posts()) : ?>
	<div class="notice">
		<p class="bottom"><?php _e('Sorry, no results were found.', 'slush'); ?></p>
	</div>
	<?php get_search_form(); ?>	
<?php endif; ?>

<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php slush_entry_meta(); ?>	
		</header>
		<div class="entry-content">
			<?php the_content('Continue reading...'); ?>
		</div>
		<footer>
			<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
		</footer>
	</article>

<?php endwhile; // End the loop ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( function_exists('slush_pagination') ) { slush_pagination(); } else if ( is_paged() ) { ?>
<nav id="post-nav">
	<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'slush' ) ); ?></div>
	<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'slush' ) ); ?></div>
</nav>
<?php } ?>