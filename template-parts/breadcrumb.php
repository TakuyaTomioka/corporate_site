

<?php
  $post_id  = get_the_ID();// ポストIDを取得、所得したIDから各カスタムフィールドの値を取得
global $post;
$slug = $post->post_name;
  ?>
  <div class="l-content l-content--middle">
    <nav>
      <ol class="c-breadcrumb">
        <li class="c-breadcrumb__list"><a href="/">HOME</a></li>
        <?php if ( is_page() ): ?>
        <li class="c-breadcrumb__list"><?php echo strtoupper($slug) ?></li>
        <?php elseif( is_archive() ): ?>
        <li class="c-breadcrumb__list">INFORMATION</li>
        <?php elseif( is_single() ): ?>
        <li class="c-breadcrumb__list"><a href="/information/">INFORMATION</a></li>
        <li class="c-breadcrumb__list"><?php echo esc_html(get_the_title()); ?></li>
        <?php endif ?>
      </ol>
    </nav>
  </div>