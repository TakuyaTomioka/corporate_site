<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Preseed Japan
 */

get_header();
?>
  <?php
      // Start the Loop.
      while ( have_posts() ) :
        the_post();
        global $post;
        $slug = $post->post_name;
      ?>
  <div id="<?php echo $slug ?>" class="p-content">
    <main>
      <?php remove_filter('the_content', 'wpautop'); ?>
      <?php the_content(); ?>
      <?php get_template_part('template-parts/to_top'); ?>
    </main>
    <!-- #main -->
  </div>
  <?php
    endwhile; // End the loop.
  ?>
<?php
get_footer();
