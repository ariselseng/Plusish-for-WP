<?php
load_theme_textdomain('plusish');
// Post thumbnails support for post
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails', array( 'post' ) ); // Add it for posts
	set_post_thumbnail_size( 220, 165, true ); // Normal post thumbnails
	}

// Set the content width based on the theme's design and stylesheet.
	if ( ! isset( $content_width ) )
	$content_width = 620;

//feed 
 	add_theme_support('automatic-feed-links'); 
 		
// Generates semantic classes for BODY and POST element
function plusish_category_id_class($classes) {
	global $post;
	if (!is_404() && isset($post))
	foreach((get_the_category($post->ID)) as $category)
		$classes[] = $category->category_nicename;
	return $classes;
}
add_filter('body_class', 'plusish_category_id_class');

function plusish_tag_id_class($classes) {
	global $post;
	if (!is_404() && isset($post))
	if ( $tags = get_the_tags() )
		foreach ( $tags as $tag )
			$classes[] = 'tag-' . $tag->slug;
	return $classes;
}
add_filter('body_class', 'plusish_tag_id_class');

function plusish_author_id_class($classes) {
	global $post;
	if (!is_404() && isset($post))
		$classes[] = 'author-' . sanitize_title_with_dashes(strtolower(get_the_author_meta('login')));
	return $classes;
}
add_filter('post_class', 'plusish_author_id_class');


// Generates time- and date-based classes for BODY, post DIVs, and comment LIs; relative to GMT (UTC)
function plusish_date_classes( $t, &$c, $p = '' ) {
	$t = $t + ( get_option('gmt_offset') * 3600 );
	$c[] = $p . 'y' . gmdate( 'Y', $t ); // Year
	$c[] = $p . 'm' . gmdate( 'm', $t ); // Month
	$c[] = $p . 'd' . gmdate( 'd', $t ); // Day
	$c[] = $p . 'h' . gmdate( 'H', $t ); // Hour
}

// For category lists on category archives: Returns other categories except the current one (redundant)
function plusish_cats_meow($glue) {
	$current_cat = single_cat_title( '', false );
	$separator = "\n";
	$cats = explode( $separator, get_the_category_list($separator) );
	foreach ( $cats as $i => $str ) {
		if ( strstr( $str, ">$current_cat<" ) ) {
			unset($cats[$i]);
			break;
		}
	}
	if ( empty($cats) )
		return false;

	return trim(join( $glue, $cats ));
}

// For tag lists on tag archives: Returns other tags except the current one (redundant)
function plusish_tag_ur_it($glue) {
	$current_tag = single_tag_title( '', '',  false );
	$separator = "\n";
	$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
	foreach ( $tags as $i => $str ) {
		if ( strstr( $str, ">$current_tag<" ) ) {
			unset($tags[$i]);
			break;
		}
	}
	if ( empty($tags) )
		return false;

	return trim(join( $glue, $tags ));
}

if ( ! function_exists( 'plusish_posted_on' ) ) :
// data before post
function plusish_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s.', 'plusish' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'plusish' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'plusish_posted_in' ) ) :
// data after post
function plusish_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s.', 'plusish' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s.', 'plusish' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.');
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;


// Widgets plugin: intializes the plugin after the widgets above have passed snuff
function plusish_widgets_init() {

		if ( function_exists('register_sidebar') )
		register_sidebar(array(
		'name' => 'Left Sidebar',
		'description' => 'Left sidebar',
		'before_widget' => "\n\t\t\t" . '<li id="%1$s" class="widget %2$s"><div class="widgetblock">',
		'after_widget' => "\n\t\t\t</div></li>\n",
		'before_title' => "\n\t\t\t\t". '<div class="widgettitleb"><h3 class="widgettitle">',
		'after_title' => "</h3></div>\n" .''
		));
		
		if ( function_exists('register_sidebar') )
		register_sidebar(array(
		'name' => 'Right Sidebar',
		'description' => 'Right sidebar',
		'before_widget' => "\n\t\t\t" . '<li id="%1$s" class="widget %2$s"><div class="widgetblock">',
		'after_widget' => "\n\t\t\t</div></li>\n",
		'before_title' => "\n\t\t\t\t". '<div class="widgettitleb"><h3 class="widgettitle">',
		'after_title' => "</h3></div>\n" .''
		));
		
	}

// Changes default [...] in excerpt to a real link
function plusish_excerpt_more($more) {
       global $post;
       $readmore = __(' read more <span class="meta-nav">&raquo;</span>', 'plusish' );
	return ' <a href="'. get_permalink($post->ID) . '">' . $readmore . '</a>';
}
add_filter('excerpt_more', 'plusish_excerpt_more');


// Runs our code at the end to check that everything needed has loaded
add_action( 'init', 'plusish_widgets_init' );


// Adds filters for the description/meta content in archives.php
add_filter( 'archive_meta', 'wptexturize' );
add_filter( 'archive_meta', 'convert_smilies' );
add_filter( 'archive_meta', 'convert_chars' );
add_filter( 'archive_meta', 'wpautop' );

// Remember: the plusish is for play.

// footer link 
add_action('wp_footer', 'footer_link');

function footer_link() {	
	//$weburl = $_SERVER["SERVER_NAME"];
	//$weburlcount = strlen($weburl);
	$anchorthemeowner='<a href="https://github.com/cowai/Plusish-for-WP" title="Plushish for WP on Github" target="blank">Source at Github</a>, ';
  	//$textfooter = __('supported by <a href="http://slodive.com/" title="Slodive" target="blank">SloDive</a>' );
  	$content = '<div id="footerlink"><div class="center"><p>' .$anchorthemeowner. $textfooter.'</p></div><div class="clear"></div></div></div>';
  	echo $content;
}

//Remove <p> in excerpt
function plusish_strip_para_tags ($content) {
if ( is_home() && ($paged < 2 )) {
  $content = str_replace( '<p>', '', $content );
  $content = str_replace( '</p>', '', $content );
  return $content;
}
} 

if ( ! function_exists( 'plusish_comment' ) ) :
//Comment function
function plusish_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
   <li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
      <div class="comment-author vcard">
        <?php echo get_avatar( $comment, 48 ); ?>
		<?php printf(__('<div class="fn">%s</div> '), get_comment_author_link()) ?>
      </div>
        
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is in moderation.', 'plusish') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta"><?php printf(__('%1$s - %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'plusish'),
										get_comment_date(),
										get_comment_time(),
										'#comment-' . get_comment_ID() );
										edit_comment_link(__('Edit'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
	  <div class="clear"></div>	
			
      <div class="comment-body"><?php comment_text(); ?></div>
      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
      <?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;
       
//custom menu support
add_action( 'init', 'plusish_register_my_menu' );

function plusish_register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}  
      


 		

//LoadMore
 function pbd_alp_init() {
 	global $wp_query;
	
 	// Add code to index pages.
 	if( !is_singular() ) {	
 		// Queue JS and CSS
 		wp_enqueue_script(
 			'pbd-alp-load-posts',
 			get_template_directory_uri() . '/js/load-posts.js',
 			array('jquery'),
 			'1.0',
 			true
		);
  		

 		wp_enqueue_style(
 			'pbd-alp-style',
 			get_template_directory_uri() . '/css/style.css',
 			false,
 			'1.0',
 			'all'
 		);
 		
 	 	
 		// What page are we on? And what is the pages limit?
 		$max = $wp_query->max_num_pages;
 		$paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
 		
 		
 		// Add some parameters for the JS.
 		
 		wp_localize_script(
 			'pbd-alp-load-posts',
 			'pbd_alp',
 			
 			array(
 				
  				'moreZ' => __( 'More', 'plusish' ),
       				'nomoreZ' => __('No more pages to load', 'plusish' ),
       				'loadingZ' => __('Loading...', 'plusish' ),
 				'startPage' => $paged,
 				'maxPages' => $max,
 				'nextLink' => next_posts($max, false)
 			)

 		);
 		
 		 	}
 }
 add_action('template_redirect', 'pbd_alp_init');
 
 ?>
