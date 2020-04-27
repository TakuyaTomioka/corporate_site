<?php
/**
 * The custum post archive-information template file
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
<div id="infromation" class="p-content">
  <div class="p-fv">
    <h2 class="c-title__lv1">
      INFORMATION
    </h2>
  </div>
  <?php get_template_part('template-parts/breadcrumb'); ?>
  <div class="l-content l-content--small js-anim">
    <ul class="l-info l-info--top">
      <?php
      if(have_posts()):
        while(have_posts()): the_post();
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
        ?>
    </ul>
    <div class="l-paging">
    <?php
        /* 以下、ページャーの表示 */
        if ( function_exists( 'pagination' ) ) :
            pagination( $wp_query->max_num_pages, get_query_var( 'paged' ) );
        endif; ?>
    </div>
    <?php else : //記事が無い場合 ?>
      <p class="c-none">記事はまだありません。</p>

    <?php endif;
      wp_reset_postdata(); //クエリのリセット ?>
    </div>
  </div>
<?php
get_footer();