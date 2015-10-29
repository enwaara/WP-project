<?php get_header() ?>
	<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

		<article id="single-contact-post">

			<?php the_post_thumbnail(); ?>
		
			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>
			
		</article>

	<?php endwhile; endif; ?>
<?php get_footer(); ?>