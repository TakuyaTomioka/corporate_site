<?php
/**
 * functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Preseed Japan
 */


function add_css_js() {//関数名add_css_js()を作成
	//CSSの読み込みはここから
  //全てのページにstyle.cssを読み込み
  wp_enqueue_style('swiper',get_template_directory_uri().'/assets/css/swiper.min.css' );
  wp_enqueue_style('style',get_template_directory_uri().'/style.css' );
  wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true );
	wp_enqueue_script( 'vendar', get_template_directory_uri() . '/assets/js/vendor.js', array(), '1.0.0', true );
}
//関数名add_scripts()を表側で呼び出す
add_action('wp_enqueue_scripts', 'add_css_js');

//バージョン表記など消す
remove_action('wp_head','wp_generator');
function remove_cssjs_ver2( $src ) {
  if ( strpos( $src, 'ver=' ) )
      $src = remove_query_arg( 'ver', $src );
  return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver2', 9999 );
add_filter( 'script_loader_src', 'remove_cssjs_ver2', 9999 );

 //?author= disable
if (!is_admin()) {
  // default URL format
  if (preg_match('/author=([0-9]*)/i', $_SERVER['QUERY_STRING'])) die();
  add_filter('redirect_canonical', 'shapeSpace_check_enum', 10, 2);
}
function shapeSpace_check_enum($redirect, $request) {
  // permalink URL format
  if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) die();
  else return $redirect;
}

//特定のプラグイン、管理画面を除外してREST APIを無効にする
function deny_restapi_except_plugins_demo( $result, $wp_rest_server, $request ){
    $namespaces = $request->get_route();

    //管理画面の除外
    if ( current_user_can( 'edit_posts' ) ) {
      return $result;
      }
    //oembedの除外
    if( strpos( $namespaces, 'oembed/' ) === 1 ){
        return $result;
    }
    //Jetpackの除外
    if( strpos( $namespaces, 'jetpack/' ) === 1 ){
        return $result;
    }

    return new WP_Error( 'rest_disabled', __( 'The REST API on this site has been disabled.' ), array( 'status' => rest_authorization_required_code() ) );
}
add_filter( 'rest_pre_dispatch', 'deny_restapi_except_plugins_demo', 10, 3 );

add_filter( 'rest_authentication_errors', function( $result ) {
  if ( ! empty( $result ) ) {
    return $result;
  }
  if ( ! is_user_logged_in() ) {
    return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
  }
  return $result;
});

//xmlrpc.phpの無効化
add_filter('xmlrpc_enabled', '__return_false');

//X-Pingbackのヘッダー情報消去
function remove_x_pingback($headers) {
	unset($headers['X-Pingback']);
	return $headers;
	}
add_filter('wp_headers', 'remove_x_pingback');

//menu remove
add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
    //remove_menu_page( 'index.php' ); //ダッシュボード
    remove_menu_page( 'edit.php' ); //投稿メニュー
    remove_menu_page( 'upload.php' ); //メディア
    //remove_menu_page( 'edit.php?post_type=page' ); //ページ追加
    remove_menu_page( 'edit-comments.php' ); //コメントメニュー
    //remove_menu_page( 'themes.php' ); //外観メニュー
    //remove_menu_page( 'plugins.php' ); //プラグインメニュー
    //remove_menu_page( 'tools.php' ); //ツールメニュー
    //remove_menu_page( 'options-general.php' ); //設定メニュー
}

//menu sorting
function custom_menu_order($menu_ord) {
  if(!$menu_ord) return true;

  return array(
      'index.php', // ダッシュボード
      'separator1', // 最初の区切り線
      'edit.php?post_type=information', // 講座情報
      'edit.php?post_type=page', // 固定ページ
  );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

//固定ページでinclude
function include_breadcrumb($params = array()) {
  extract(shortcode_atts(array(
      'file' => 'default'
  ), $params));
  ob_start();
  include(get_theme_root() . '/' . get_template() . "/template-parts/$file.php");
  return ob_get_clean();
}
add_shortcode('compornent', 'include_breadcrumb');

//固定ページのパスをFIX
function imagepassshort($arg) {
  $content = str_replace('"/assets/img/', '"' . get_bloginfo('template_directory') . '/assets/img/', $arg);
  return $content;
}
add_action('the_content', 'imagepassshort');

//固定ページでブロックエディタを無効にする
add_filter( 'use_block_editor_for_post_type', 'hide_block_editor', 10, 10 );
function hide_block_editor( $use_block_editor, $post_type ) {
  if ( $post_type === 'page' ) return false;
  return $use_block_editor;
}

//外部ファイルを読み込む
require get_template_directory() . '/functions-customposts.php';
require get_template_directory() . '/functions-paging.php';
