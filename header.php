<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Preseed Japan
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<?php get_template_part('meta'); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header id="header">
		<div class="l-header">
			<h1 class="l-header__sitename"><a href="/"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" alt="Preseed Japan Corporation"></a></h1>
			<div class="c-humberger u-sponly js-menu">
				<div class="c-humberger__area">
					<span class="c-line c-line-top"></span>
					<span class="c-line c-line-middle"></span>
					<span class="c-line c-line-bottom"></span>
				</div>

			</div>
			<div class="l-menu--block">
				<ul class="c-menu">
					<li class="c-menu__link <?php if( !is_front_page() && get_post_type() === 'information' ) echo 'is-current'; ?>"><a href="/information/">INFORMATION</a></li>
					<li class="c-menu__link <?php if( is_page('business') ) echo 'is-current'; ?>"><a href="/business/">BUSINESS</a></li>
					<li class="c-menu__link <?php if( is_page('recruit') ) echo 'is-current'; ?>"><a href="/recruit/">RECRUIT</a></li>
					<li class="c-menu__link <?php if( is_page('company') ) echo 'is-current'; ?>"><a href="/company/">COMPANY</a></li>
					<li class="c-menu__link <?php if( is_page('privacy-policy') ) echo 'is-current'; ?> u-sponly"><a href="/privacy-policy/">PRIVACY POLICY</a></li>
				</ul>
				<a href="https://preseedjapan.co.jp/contact" class="c-link c-link--button" target="_blank"><span>CONTACT</span></a>
			</div>
		</div>
	</header>
	<div id="container">