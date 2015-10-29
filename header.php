<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo is_front_page() ? bloginfo('name') : wp_title() ?></title>
<link href='https://fonts.googleapis.com/css?family=Quicksand:400,300|ABeeZee' rel='stylesheet' type='text/css'>	<?php wp_head(); ?>
</head>
<body>
		<header>

			<form id="searchbar">

				<i class="fa fa-search"></i>
				<input type="text" onkeyup="showResult(this.value)">
			
			</form>

			<div id="livesearch"></div>

			<h1><a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.svg"></h1>

			<?php wp_nav_menu( array(
				'theme_location' => 'main_menu',
				'container' => 'nav'
			) ); ?>

			<a id="cart-icon" href="http://localhost/wordpress/?p=6"><i class="fa fa-shopping-cart"></i></a>
			
			<?php
			global $woocommerce;

			// get cart quantity
			$qty = $woocommerce->cart->get_cart_contents_count();

			// get cart total
			$total = $woocommerce->cart->get_cart_total();

			// get cart url
			$cart_url = $woocommerce->cart->get_cart_url();

			// if multiple products in cart
			if($qty>1)
			      echo '<a id="cart-info" href="'.$cart_url.'">'.$qty.' products | '.$total.'</a>';

			// if single product in cart
			if($qty==1)
			      echo '<a id="cart-info" href="'.$cart_url.'">1 product | '.$total.'</a>';
			?>

			

		</header>

	<div class="page-wrapper">