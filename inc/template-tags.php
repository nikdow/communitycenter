<?php
/**
 * Custom template tags for this theme.
 *
 *
 * @package rescue
 */

/*----------------------------------------------------*/
/*  Custom Walker for Foundation Nav - http://goo.gl/mTkWbg
/*----------------------------------------------------*/
class foundation_walker extends Walker_Nav_Menu {
 
    function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
        $element->has_children = !empty($children_elements[$element->ID]);
        $element->classes[] = ($element->current || $element->current_item_ancestor) ? 'active' : '';
        $element->classes[] = ($element->has_children) ? 'has-dropdown' : '';
 
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
 
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }
 
} // end custom walker

/*----------------------------------------------------*/
/*  Custom Styles
/*----------------------------------------------------*/
if ( ! function_exists( 'dynamic_css_enqueue' ) ) :

    function dynamic_css_enqueue(){
        wp_enqueue_style('dynamic-css', admin_url('admin-ajax.php').'?action=dynamic_css');
    } 

    add_action( 'wp_enqueue_scripts', 'dynamic_css_enqueue' );

endif; // end dynamic_css_enqueue

if ( ! function_exists( 'dynaminc_css' ) ) :

    function dynaminc_css() {
        require_once( get_template_directory().'/css/dynamic.css.php' );
        exit;
    }

    add_action('wp_ajax_dynamic_css', 'dynaminc_css');
    add_action('wp_ajax_nopriv_dynamic_css', 'dynaminc_css');

endif; // end dynaminc_css

/*----------------------------------------------------*/
/*	WP Admin bar & Foundation - http://goo.gl/qP9TUI
/*----------------------------------------------------*/
function foundation_wp_admin_bar() {
	if ( is_admin_bar_showing() ) {?>
		<style>
/*		.top-bar{ margin-top: 32px; } */
		.fixed{margin-top: 32px; } 
		.pace .pace-progress{margin-top: 32px; } 
		@media screen and (max-width: 600px){
			.top-bar{margin-top: 46px; } 
			.fixed{margin-top: 32px; } 
			#wpadminbar {position: fixed !important; }
		}
		</style>
	<?php }
}
add_action('wp_head', 'foundation_wp_admin_bar');

/*----------------------------------------------------*/
/*	Display Site Users - http://goo.gl/Ky6V8p
/*----------------------------------------------------*/
function rescue_contributors() {

	$display_admins = true;
	$order_by = 'registered'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'
	$role = ''; // 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all'
	$avatar_size = 95;
	$hide_empty = false; // hides authors with zero posts
	$exclude_users = of_get_option( 'exclude_users' );

	if(!empty($display_admins)) {
		$user_array = array(
			'orderby'	 => $order_by,
			'number' 	 => 10,
			'exclude'    => $exclude_users,
			'role' 		 => $role
		 );
		$blogusers = get_users($user_array);
	} 
	else {
		$admins = get_users('role=administrator');
		$exclude = array();
		foreach($admins as $ad) {
			$exclude[] = $ad->ID;
		}
		$exclude = implode(',', $exclude);
		$blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&role='.$role);
	}
	$authors = array();
	foreach ($blogusers as $bloguser) {
		$user = get_userdata($bloguser->ID);
		// Hides users that don't have any posts
		if(!empty($hide_empty)) {
			$numposts = count_user_posts($user->ID);
			if($numposts < 1) continue;
		}
		$authors[] = (array) $user;
	}

	echo '<ul class="contributors">';
	foreach($authors as $author) {
		$display_name = get_userdata($author['ID'])->display_name;
		$description = get_userdata($author['ID'])->user_description;
		$avatar = get_avatar($author['ID'], $avatar_size);
		$author_profile_url = get_author_posts_url($author['ID']);
		$bb_profile_url = bbp_get_user_profile_url($author['ID']);

		echo '<li><a href="' .$bb_profile_url. '"><span data-tooltip data-options="disable_for_touch:true" class="has-tip tip-bottom radius round" title="'.$display_name.'">'.$avatar.'</span></a></li>';
	}
	echo '</ul>';

}

/*----------------------------------------------------*/
/*	Excerpt for Home Forums Section
/*----------------------------------------------------*/
	function new_excerpt_more( $more ) {
		return ' <span class="custom_excerpt"> ...</span>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	function custom_excerpt_length( $length ) {
		return 12;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*----------------------------------------------------*/
/*  Template for comments and pingbacks.
/*----------------------------------------------------*/
if ( ! function_exists( 'rescue_comments' ) ) :
    function rescue_comments( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case '' :
        ?>
        <li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>" class=" clearfix">
                <div class="left">                    
                    <?php echo get_avatar($comment,$size='60',$default='mm' ); ?>                                       
                </div><!-- end left -->
                <div class="right-comments">
                    <div class="comment-text">                      
                        
                        <p class='comment-meta-header'>
                            <?php // Check if comment is by an admin then add badge
                                $comment = get_comment( $comment_id );
                                if ( user_can( $comment->user_id, 'administrator' ) ) : ?> 

                            <span class="rescue_staff round"><?php _e('Member', 'rescue'); ?></span>
                            <?php endif; ?>

                            <cite class="fn"><?php echo get_comment_author_link() ?></cite>                     
                            <span class="comment-meta commentmetadata"><?php comment_date(get_option('date_format')); ?></span>
                            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                        </p>
                        
                        <?php if ($comment->comment_approved == '0') : ?><p class="moderated"><?php _e('Your comment is awaiting moderation.','rescue'); ?></p><?php endif; ?>
                        <div class="comment_content">
                        <?php comment_text() ?>
                        </div>

                    </div><!--//end comment-text-->             
                </div><!--//end right-comments -->
            </div>
            
        <?php
            break;
            case 'pingback'  :
            case 'trackback' :
        ?>
            <li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>" class="clearfix">
                    <?php echo "<div class='author'><em>" . __('Trackback:','rescue') . "</em> ".get_comment_author_link()."</div>"; ?>
                    <?php echo strip_tags(substr(get_comment_text(),0, 110)) . "..."; ?>
                    <?php comment_author_url_link('', '<small>', '</small>'); ?>
             </div>
            <?php
            break;
        endswitch;
    }
    endif;

/*----------------------------------------------------*/
/*	bbpress Avatar size http://goo.gl/A9qAoM
/*----------------------------------------------------*/
function my_bbp_change_avatar_size($author_avatar, $topic_id, $size) {
    $author_avatar = '';
    if ($size == 14) {
        $size = 54;
    }
    if ($size == 80) {
        $size = 100;
    }
    $topic_id = bbp_get_topic_id( $topic_id );
    if ( !empty( $topic_id ) ) {
        if ( !bbp_is_topic_anonymous( $topic_id ) ) {
            $author_avatar = get_avatar( bbp_get_topic_author_id( $topic_id ), $size );
        } else {
            $author_avatar = get_avatar( get_post_meta( $topic_id, '_bbp_anonymous_email', true ), $size );
        }
    }
    return $author_avatar;
}

/* Add priority (default=10) and number of arguments */
add_filter('bbp_get_topic_author_avatar', 'my_bbp_change_avatar_size', 20, 3);
add_filter('bbp_get_reply_author_avatar', 'my_bbp_change_avatar_size', 20, 3);
add_filter('bbp_get_current_user_avatar', 'my_bbp_change_avatar_size', 20, 3);


/*----------------------------------------------------*/
/*  Categories Widget
/*----------------------------------------------------*/
function categories_postcount_filter ($variable) {
   $variable = str_replace('(', '<span class="post_count round"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('wp_list_categories','categories_postcount_filter');

/*----------------------------------------------------*/
/*  Archives Widget
/*----------------------------------------------------*/
function archive_postcount_filter ($variable) {
   $variable = str_replace('(', '<span class="post_count round"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('get_archives_link', 'archive_postcount_filter');


if ( ! function_exists( 'rescue_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function rescue_paging_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="pagination-centered round"><ul class="pagination round">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active round"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}
endif;

if ( ! function_exists( 'rescue_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function rescue_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation clearfix" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'rescue' ); ?></h1>
		<div class="nav-links clearfix">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<div class="meta-nav-prev"><i class="fa fa-angle-left"></i></div> <div class="nav_prev_link">%title</div>', 'Previous post link', 'rescue' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '<div class="nav_next_link">%title</div> <div class="meta-nav-next"><i class="fa fa-angle-right"></i></div>', 'Next post link',     'rescue' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'rescue_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function rescue_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">%1$s</span> by <span class="byline"> %2$s</span>', 'rescue' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function rescue_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'rescue_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'rescue_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so rescue_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so rescue_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in rescue_categorized_blog.
 */
function rescue_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'rescue_categories' );
}
add_action( 'edit_category', 'rescue_category_transient_flusher' );
add_action( 'save_post',     'rescue_category_transient_flusher' );
