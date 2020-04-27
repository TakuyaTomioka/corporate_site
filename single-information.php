<?php
/**
 * The custum post single-information template file
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
  <div id="information-detail" class="p-content">
    <div class="p-fv">
      <h2 class="c-title__lv1">
        INFORMATION
      </h2>
    </div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php get_template_part('template-parts/breadcrumb'); ?>
    <div class="l-content l-content--small js-anim">
      <h2 class="c-ttl--information"><?php the_title(); ?></h2>
      <div class="l-postinfo">
        <div class="c-date"><?php the_time('Y.m.d'); ?></div>
        <?php
          $terms = get_the_terms( get_the_ID(), 'information_category' );
          if ( !empty($terms) ) : if ( !is_wp_error($terms) ) :
          ?>
          <?php foreach( $terms as $term ) : ?>
          <div class="c-category"><span class="<?php echo $term->slug; ?>"><?php echo $term->name; ?></span></div>
          <?php endforeach; ?>
          <?php endif; endif; ?>
      </div>
      <div class="l-information">
        <?php the_content(); ?>
      </div>
      <div class="l-paging">
        <div class="c-pagingnavi c-pagingnavi--left">
          <?php previous_post_link('%link', '<span><img src="'. get_template_directory_uri().'/assets/img/ico_arrow_left.svg" alt=""></span>前の記事へ'); ?>
        </div>
        <ul class="c-paging">
          <li class="c-button"><a href="/information/">記事一覧へ</a></li>
        </ul>
        <div class="c-pagingnavi c-pagingnavi--right">
          <?php next_post_link('%link', '次の記事へ<span><img src="'. get_template_directory_uri().'/assets/img/ico_arrow_right.svg" alt=""></span>'); ?>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
    <?php get_template_part('template-parts/to_top'); ?>
  </div>
<?php
get_footer();