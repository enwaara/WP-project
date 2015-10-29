<?php get_header() ?>
	<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

		<article class="post">
		
			<p><?php the_content(); ?></p>
			<?php the_post_thumbnail(); ?>
			
		</article>

	<?php endwhile; endif; ?>
<?php get_footer(); ?>