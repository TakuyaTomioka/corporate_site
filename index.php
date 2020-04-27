<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Preseed Japan
 */

get_header();
?>
<div id="top" class="p-content">
	<div class="p-mv">
		<div class="swiper-pagination"></div>
		<div class="p-scroller js-scroller">
				<picture>
					<source media="(max-width: 768px)" srcset="<?php bloginfo('template_directory'); ?>/assets/img/sp/img_scroll_sp.svg">
					<source media="(min-width: 769px)" srcset="<?php bloginfo('template_directory'); ?>/assets/img/img_scroll.svg">
						<img src="<?php bloginfo('template_directory'); ?>/assets/img/img_scroll.svg" alt="SCROLL">
				</picture>

			</div>
		<?php get_template_part('template-parts/top_slider'); ?>
	</div>
	<div class="p-bgwrap p-bgwrap--top1 is-scroller">
		<div class="l-content l-content--small js-anim">
			<h2 class="c-title c-title__lv2">INFORMATION</h2>
			<ul class="l-info l-info--top">
			<?php
				$args = array(
						'post_type' => 'information',
						'posts_per_page' => 3,
						'no_found_rows' => false,
				);

				$the_query = new WP_Query($args);
				if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post();
						?>
				<li class="l-info__list">
					<div class="c-date"><?php the_time('Y.m.d'); ?></div>
					<?php
        $terms = get_the_terms( get_the_ID(), 'information_category' );
        if ( !empty($terms) ) : if ( !is_wp_error($terms) ) :
        ?>
        <?php foreach( $terms as $term ) : ?>
        <div class="c-category"><span class="<?php echo $term->slug; ?>"><?php echo $term->name; ?></span></div>
        <?php endforeach; ?>
        <?php endif; endif; ?>
					<a class="c-ttllink" href="<?php the_permalink(); ?>">
						<span><?php the_title(); ?></span>
					</a>
				</li>
				<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</ul>
			<div class="l-right">
				<a class="c-link c-link--right" href="/information/">一覧を見る</a>
			</div>
		</div>
		<h2 class="c-title__lv1 js-anim">MISSION
			<span>プレシードの想い</span>
		</h2>
	</div>
	<div class="p-top--mission js-anim">
		<div class="p-top--mission__content">
			<div class="p-top--mission__content__wrap">
				<p class="c-txt">
					私たちの志事（シゴト）は<br class="u-sponly">
					あなたと“価値”をつなげるコト<br>
					価値あるコトをあなたに伝えたい。<br>
					あなたが最高にハッピーになった姿を想像しながら。<br>
					全てのモノやコトにはドラマがある。<br>
					あなたにその人の想いや温もりを伝えたい。
				</p>
				<div class="c-ttl">
					あなたが人生という名の舞台で<br>もっともっと輝けるように。
				</div>
				<a href="/company/" class="c-button c-button--black">詳細を見る</a>
			</div>
		</div>
	</div>
	<div class="p-bgwrap p-bgwrap--top2">
		<div class="l-content l-content--middle">
			<h2 class="c-title__lv1 js-anim">BRANDS
				<span>取り扱い商品</span>
			</h2>
			<div class="js-anim">
				<div class="l-box l-box--large">
					<div class="c-box--img">
						<picture>
							<source media="(max-width: 768px)" srcset="<?php bloginfo('template_directory'); ?>/assets/img/sp/img_brands01_sp.jpg">
							<source media="(min-width: 769px)" srcset="<?php bloginfo('template_directory'); ?>/assets/img/img_brands01.jpg">
							<img src="<?php bloginfo('template_directory'); ?>/assets/img/img_brands01.jpg" alt="AVIOT イメージ">
						</picture>
					</div>
					<div class="c-box--txt">
						<div class="c-logo"><img src="<?php bloginfo('template_directory'); ?>/assets/img/img_logo_aviot.png" alt="AVIOT"></div>
						<p class="c-txt">日本のサウンドを熟知した日本人オーディオエキスパートが携わる、日本発のオーディオビジュアルブランド。<br>“make A comfort zone”をスローガンに掲げ、高音質、高品質に加え、ずっと使い続けたくなる心地よさを追及し続けます。</p>
						<a class="c-button c-button--small" href="/business/#brands01">詳細を見る</a>
					</div>
				</div>
				<div class="l-box l-box--reverse l-box--small">
					<div class="c-box--img c-box--img--reverse">
						<picture>
							<source media="(max-width: 768px)" srcset="<?php bloginfo('template_directory'); ?>/assets/img/sp/img_brands02_sp.jpg">
							<source media="(min-width: 769px)" srcset="<?php bloginfo('template_directory'); ?>/assets/img/img_brands02.jpg">
							<img src="<?php bloginfo('template_directory'); ?>/assets/img/img_brands02.jpg" alt="Cambridge Audio イメージ">
						</picture>
					</div>
					<div class="c-box--txt c-box--txt--reverse">
						<div class="c-logo"><img src="<?php bloginfo('template_directory'); ?>/assets/img/img_logo_cambridgeaudio.png" alt="Cambridge Audio"></div>
						<p class="c-txt">1968 年初頭に設立されたイギリス・ロンドンに位置するの最先端オーディオメーカーです。創立以来イギリスのオーディオにおけるHi-Fi の世界を牽引しており、その歴史は40 年にも及びます。現在では世界45を超える国々で展開され、世界でも有数なオーディオHi-Fi ブランドです。</p>
						<a class="c-button c-button--small" href="/business/#brands02">詳細を見る</a>
					</div>
				</div>
				<div class="l-center u-pconly">
					<a href="/business/" class="c-button c-button--black">詳細を見る</a>
				</div>
			</div>
		</div>
		<?php get_template_part('template-parts/to_top'); ?>
	</div>
</div>
	</div><!-- .content-area -->
<?php
get_footer();
