<?php get_header() ?>

	<section id="about-page">

		<aside id="about-sidebar">

			<?php
			 
			$args = array('post_type' => 'contact-post');
					 
			$loop = new WP_Query( $args );
					 
			while ( $loop->have_posts() ) : $loop->the_post();?>

				<div class="about-content">

					<?php the_post_thumbnail(); ?>

					<h2 class="about-title"><?php the_title(); ?></h2>

					<?php the_content(); ?>
				
				</div>

			<?php endwhile;?>

		</aside>

		<div id="main">
			
			<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

				<h1><?php the_title(); ?></h1>
		
				<p><?php the_content(); ?></p>

			<?php endwhile; endif; ?>

		</div>

	</section>

<?php get_footer(); ?>