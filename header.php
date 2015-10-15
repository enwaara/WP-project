<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo is_front_page() ? bloginfo('name') : wp_title() ?></title>
	<?php wp_head(); ?>
</head>
<body>

		<header>

			<h1>Hello</h1>

			<?php wp_nav_menu( array(
				'theme_location' => 'main_menu',
				'container' => 'nav'
			) ); ?>

		</header>

	<div class="page-wrapper">