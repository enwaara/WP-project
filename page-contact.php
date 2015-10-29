<?php get_header() ?>

	<section id="contact-page">

		<?php 
		 
			$args = array('post_type' => 'contact-post');
			 
			$loop = new WP_Query( $args );
			 
			while ( $loop->have_posts() ) : $loop->the_post();?>

			<div class="contact-content">

				<?php the_post_thumbnail(); ?>

				<h1 class="contact-title"><?php the_title(); ?></h1>

				<?php the_content(); ?>

			</div>

		<?php endwhile;?>

	</section>

	<form id="contact-form">
	    	
	    	<label for="name">Your name</label>
	    	<input id="name" type="text" name="name" requierd="true" maxlength="50">

	    	<label for="email">Your e-mail</label>
	    	<input id="email" type="email" name="email" requierd="true" maxlength="50">

	    	<label for="message">Whats on yout mind?</label>
	    	<textarea id="message" name="message" required="true" maxlength="1000"></textarea>

	    	<input type="submit" value="Send message">

	    </form>

<?php get_footer(); ?>