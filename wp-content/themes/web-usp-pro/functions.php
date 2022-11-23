<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @since 1.0
 * @version 1.0
 */

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page([
    'page_title' 	=> 'Informações Gerais',
		'menu_title'	=> 'Informações Gerais',
		'menu_slug' 	=> 'Informações Gerais',
  ]);
}

function shortener($limit, $source = null){
  $otherSource = $source;
  $otherSource = trim(preg_replace( '/\s+/', ' ', substr($otherSource, 0, $limit)));
  $otherSource = strip_tags($otherSource);
  return $otherSource;
}

add_theme_support( 'post-thumbnails');

/* PAGINAÇÃO DO ARQUIVO */
function wpbeginner_numeric_posts_nav() {

  if( is_singular() )
      return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
      return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 )
      $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
      $links[] = $paged - 1;
      $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
      $links[] = $paged + 2;
      $links[] = $paged + 1;
  }

  echo '<div class="pagination">' . "\n";

  /** Previous Post Link */
  if ( get_previous_posts_link() )
      printf( '<li class="page-item grey">%s</li>' . "\n", get_previous_posts_link('Anterior') );

  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
      $class = 1 == $paged ? ' class=""' : '';

      printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

      if ( ! in_array( 2, $links ) )
          echo '<li>…</li>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
      $class = $paged == $link ? ' class="page-item active"' : '';
      printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
      if ( ! in_array( $max - 1, $links ) )
          echo '<li class="page-item">…</li>' . "\n";

      $class = $paged == $max ? ' class="page-item"' : '';
      printf( '<li%s class="page-item"><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /** Next Post Link */
  if ( get_next_posts_link() )
      printf( '<li class="page-item">%s</li>' . "\n", get_next_posts_link('Próximo') );

  echo '</div>' . "\n";

}
 
function gt_get_post_view() {
  $count = get_post_meta( get_the_ID(), 'post_views_count', true );
  return "$count views";
}

function my_count_views_script() {
  if ( is_single() && 'blog' == get_post_type()) :
      ?>
      <script>
          jQuery.ajax({
            type: 'POST',
            url: '<?= admin_url('admin-ajax.php') ?>',
            data: {
              'action': 'my_count_views',
              'post_id': <?= the_ID(); ?>
            }
          });
      </script>
      <?php
  endif;
}
add_action( 'wp_footer', 'my_count_views_script' );


add_action( 'wp_ajax_my_count_views', 'my_count_views' );
add_action( 'wp_ajax_nopriv_my_count_views', 'my_count_views' );

function my_count_views() {
  if ( isset( $_POST['post_id'] ) && $_POST['post_id'] ) {
    $post_id = intval( $_POST['post_id'] );
    $views = intval( get_post_meta( $post_id, 'post_views_count', true ) ) ?: 0;
    $views += 1;
    update_post_meta( $post_id, 'post_views_count', $views );
  }

  wp_die();
}

function remove_default_post_type($args, $postType) {
    if ($postType === 'post') {
        $args['public']                = false;
        $args['show_ui']               = false;
        $args['show_in_menu']          = false;
        $args['show_in_admin_bar']     = false;
        $args['show_in_nav_menus']     = false;
        $args['can_export']            = false;
        $args['has_archive']           = false;
        $args['exclude_from_search']   = true;
        $args['publicly_queryable']    = false;
        $args['show_in_rest']          = false;
    }

    return $args;
}
add_filter('register_post_type_args', 'remove_default_post_type', 0, 2);


function my_acf_save_post( $post_id ) {
  // pegando campo referencia conforme o post_id
  $referencia = get_field('referencia', $post_id);

  //verificando se existe esse campo
  if(!empty($referencia)) {
    //transformando em minusculo
    $new_referencia = strtolower($referencia);

    //atualizando banco de dados
    update_post_meta( $post_id, 'referencia', $new_referencia );
  }
}

add_action('acf/save_post', 'my_acf_save_post');

add_filter( 'oembed_response_data', 'disable_embeds_filter_oembed_response_data_' );
function disable_embeds_filter_oembed_response_data_( $data ) {
    unset($data['author_url']);
    unset($data['author_name']);
    return $data;
}
