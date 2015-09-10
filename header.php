<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php wp_title("|", true); ?></title>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="wrapper" role="document">

		<?php if( get_field('option_vacation_notice', 'option') ): ?>
					
			<div class="info">
				
				<?php the_field('option_vacation_notice_text', 'option'); ?>

			</div>

		<?php endif; ?>

    	<header id="header" role="banner">
			<div class="wrap">

				<?php get_template_part('parts/header/logo'); ?>

				<?php get_template_part('parts/header/buttons'); ?>

			</div>
        </header>

		<?php get_template_part('parts/header/navigation'); ?>
