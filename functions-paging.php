<?php
/**
* ページネーション出力関数
* $paged : 現在のページ
* $pages : 全ページ数
* $range : 左右に何ページ表示するか
* $show_only : 1ページしかない時に表示するかどうか
*/
function pagination( $pages, $paged, $range = 2, $show_only = false ) {
  $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
  $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

  //表示テキスト
  //$text_first   = "<<";
  $text_before  = '<span><img src="'.get_template_directory_uri().'/assets/img/ico_arrow_left.png" alt=""></span>prev';
  $text_next    = 'next<span><img src="'.get_template_directory_uri().'/assets/img/ico_arrow_right.png" alt=""></span>';
  //$text_last    = ">>";

  if ( $show_only && $pages === 1 ) {
      // １ページのみで表示設定が true の時
      echo '<li class="c-paging__list">1</li>';
      return;
  }

  if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

  if ( 1 !== $pages ) {
      //２ページ以上の時
    //   if ( $paged > $range + 1 ) {
    //       // 「最初へ」 の表示
    //       echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
    //   }
      if ( $paged > 1 ) {
          // 「前へ」 の表示
          echo '<a class="c-pagingnavi c-pagingnavi--left" href="', get_pagenum_link( $paged - 1 ) ,'">', $text_before ,'</a>';
      }
      else {
        echo '<a class="c-pagingnavi c-pagingnavi--left"></a>';
      }
      echo '<ul class="c-paging">';
      for ( $i = 1; $i <= $pages; $i++ ) {

          if ( $i <= $paged + $range && $i >= $paged - $range ) {
              // $paged +- $range 以内であればページ番号を出力
              if ( $paged === $i ) {
                  echo '<li class="c-paging__list">', $i ,'</li>';
              } else {
                  echo '<li class="c-paging__list"><a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a></li>';
              }
          }

      }
      echo '</ul>';
      if ( $paged < $pages ) {
          // 「次へ」 の表示
          echo '<a class="c-pagingnavi c-pagingnavi--right" href="', get_pagenum_link( $paged + 1 ) ,'">', $text_next ,'</a>';
      }
      else {
          echo '<a class="c-pagingnavi c-pagingnavi--right"></a>';
      }
    //   if ( $paged + $range < $pages ) {
    //       // 「最後へ」 の表示
    //       echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
    //   }
      echo '</div>';
  }

}
