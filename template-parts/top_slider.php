<?php
/**
 * The template for displaying slider parts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Preseed Japan
 */

?>

<div class="p-slider swiper-container">
	<div class="swiper-wrapper">
		<div class="p-slider__child swiper-slide">
			<a class="c-slidelink" href="/company/">
				<picture>
					<source media="(max-width: 768px)" srcset="<?php bloginfo('template_directory'); ?>/assets/img/slider/sp/img_mv01_sp.jpg">
					<source media="(min-width: 769px)" srcset="<?php bloginfo('template_directory'); ?>/assets/img/slider/img_mv01.png">
					<img src="<?php bloginfo('template_directory'); ?>/assets/img/slider/img_mv01.png" alt="mv01">
				</picture>
			</a>
		</div>
		<div class="p-slider__child swiper-slide">
			<a class="c-slidelink" href="/recruit/">
				<picture>
					<source media="(max-width: 768px)" srcset="<?php bloginfo('template_directory'); ?>/assets/img/slider/sp/img_mv02_sp.jpg">
					<source media="(min-width: 769px)" srcset="<?php bloginfo('template_directory'); ?>/assets/img/slider/img_mv02.png">
					<img src="<?php bloginfo('template_directory'); ?>/assets/img/slider/img_mv02.png" alt="mv02">
				</picture>
			</a>
		</div>
		<div class="p-slider__child swiper-slide">
			<a class="c-slidelink" href="/business/">
				<picture>
					<source media="(max-width: 768px)" srcset="<?php bloginfo('template_directory'); ?>/assets/img/slider/sp/img_mv03_sp.jpg">
					<source media="(min-width: 769px)" srcset="<?php bloginfo('template_directory'); ?>/assets/img/slider/img_mv03.png">
					<img src="<?php bloginfo('template_directory'); ?>/assets/img/slider/img_mv03.png" alt="mv03">
				</picture>
			</a>
		</div>
	</div>
</div>
