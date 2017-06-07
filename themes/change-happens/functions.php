<?php
/**
 *
 */

add_action( 'wp_enqueue_scripts', 'ch_enqueue_changehappens' );
function ch_enqueue_changehappens() {

    // including parent theme css
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );

    // including changehappens js
    if (is_page('thank-you-guide')) {
        wp_enqueue_script( 'changehappens_js', get_stylesheet_directory_uri() . '/js/changehappenspdf.js', array(), true );
    }
    // including changequiz js
    if (is_page('thank-you-eating-quiz')) {
        wp_enqueue_script( 'changehappens_js', get_stylesheet_directory_uri() . '/js/changequizpdf.js', array(), true );
    }


    // use my version of sticky.js instead
    wp_dequeue_script( 'hello-world-sticky-kit', get_template_directory_uri() . '/js/sticky-kit.js', array( 'jquery' ), '20150128', true );
    wp_enqueue_script('change-happens-sticky-kit', get_stylesheet_directory_uri().'/js/sticky-kit.js', array('jquery'), '20150128', true);
}

// including child theme template-tags
include( get_stylesheet_directory() . '/inc/template-tags.php' );

// change featured image size since we're not using them full-width
add_action( 'after_setup_theme', 'ch_theme_thumb', 11 );
function ch_theme_thumb() {
    set_post_thumbnail_size( 300 );
}

// add google analytics code to footer ala wpbeginner
add_action('wp_footer', 'add_googleanalytics');
function add_googleanalytics() { ?>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-79938587-1', 'auto');
  ga('send', 'pageview');

  </script>
<?php }

// get rid of the second-page sticky post (from theme dev takao)
add_action( 'pre_get_posts', 'remove_sticky_posts_from_the_loop' );
function remove_sticky_posts_from_the_loop( $q ) {
   if ( $q->is_home() && $q->is_main_query() && $q->get( 'paged' ) > 1 ) {
       $q->set( 'post__not_in', get_option( 'sticky_posts' ) );
   }
}

// get rid of the second-page sticky post (from tim)
// add_action( 'pre_get_posts', function ( WP_Query $query ) {

//     if ( ! $query->is_main_query() ) {
//         return;
//     }

//     if ( ! $query->is_home() ) {
//         return;
//     }

//     if ( $query->get( 'paged', 1 ) == 1 ) {
//         return;
//     }

//     $query->set ( 'post__not_in', array( 658 ) );

// });

// add_action( 'pre_get_posts', function ( WP_Query $query ) {

//     if ( $query->get( 'paged', 1 ) == 1 ) {
//        $query->set ( 'post__not_in', array( 658 ) );
//         return;
//     }

// });
