<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- <meta name="viewport" content="width=device-width"> -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-barba="wrapper">

<?php 
	get_template_part('components/c-loader');
	get_template_part('components/c-nav');
	get_template_part('components/c-burger');
?>