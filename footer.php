<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Preseed Japan
 */
?>
	</div>
	<!-- //#container -->
	<footer id="footer">
		<div class="l-footer__wrap">
			<div class="l-footer">
				<div class="l-footer__layout">
					<h1 class="l-footer__sitename"><a href="/"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo_white.png" alt="Preseed Japan Corporation"></a></h1>
					<ul class="c-menu c-menu--footer">
						<li class="c-menu__link"><a href="/information/">INFORMATION</a></li>
						<li class="c-menu__link"><a href="/business/">BUSINESS</a></li>
						<li class="c-menu__link"><a href="/recruit/">RECRUIT</a></li>
						<li class="c-menu__link"><a href="/company/">COMPANY</a></li>
						<li class="c-menu__link"><a href="/privacy-policy/">PRIVACY POLICY</a></li>
					</ul>
				</div>
				<a href="https://preseedjapan.co.jp/contact" class="c-link c-link--button" target="_blank">CONTACT</a>
			</div><!-- .site-info -->
			<div class="c-link c-link--sns"><a class="c-insta" href="https://www.instagram.com/miraporta_official/" target="_blank">Follow us</a></div>
		</div>
		<p class="l-copyright">&copy; Prseed Japan Corporation All Rights Reserved.</p>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
