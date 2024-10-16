<?php
/*
Template Name: autores
*/
get_header();
?>
<div class="hero">
  <h1 class="hero__title">Lista de autores</h1>
  <div class="hero__description">Gracias a todos/as.</div>
</div>

<div class="wrap">
<?php 
function wp_list_authors( $args = '' ) {
	global $wpdb;

	$defaults = array(
		'orderby'       => 'name',
		'order'         => 'ASC',
		'number'        => '',
		'optioncount'   => false,
		'exclude_admin' => true,
		'show_fullname' => false,
		'hide_empty'    => true,
		'feed'          => '',
		'feed_image'    => '',
		'feed_type'     => '',
		'echo'          => true,
		'style'         => 'list',
		'html'          => true,
		'exclude'       => '',
		'include'       => '',
	);

	$parsed_args = wp_parse_args( $args, $defaults );

	$return = '';

	$query_args           = wp_array_slice_assoc( $parsed_args, array( 'orderby', 'order', 'number', 'exclude', 'include' ) );
	$query_args['fields'] = 'ids';

	/**
	 * Filters the query arguments for the list of all authors of the site.
	 *
	 * @since 6.1.0
	 *
	 * @param array $query_args  The query arguments for get_users().
	 * @param array $parsed_args The arguments passed to wp_list_authors() combined with the defaults.
	 */
	$query_args = apply_filters( 'wp_list_authors_args', $query_args, $parsed_args );

	$authors     = get_users( $query_args );
	$post_counts = array();

	/**
	 * Filters whether to short-circuit performing the query for author post counts.
	 *
	 * @since 6.1.0
	 *
	 * @param int[]|false $post_counts Array of post counts, keyed by author ID.
	 * @param array       $parsed_args The arguments passed to wp_list_authors() combined with the defaults.
	 */
	$post_counts = apply_filters( 'pre_wp_list_authors_post_counts_query', false, $parsed_args );

	if ( ! is_array( $post_counts ) ) {
		$post_counts       = array();
		$post_counts_query = $wpdb->get_results(
			"SELECT DISTINCT post_author, COUNT(ID) AS count
			FROM $wpdb->posts
			WHERE " . get_private_posts_cap_sql( 'post' ) . '
			GROUP BY post_author'
		);

		foreach ( (array) $post_counts_query as $row ) {
			$post_counts[ $row->post_author ] = $row->count;
		}
	}

	foreach ( $authors as $author_id ) {
		$posts = isset( $post_counts[ $author_id ] ) ? $post_counts[ $author_id ] : 0;

		if ( ! $posts && $parsed_args['hide_empty'] ) {
			continue;
		}

		$author = get_userdata( $author_id );

		if ( $parsed_args['exclude_admin'] && 'admin' === $author->display_name ) {
			continue;
		}

		if ( $parsed_args['show_fullname'] && $author->first_name && $author->last_name ) {
			$name = sprintf(
				/* translators: 1: User's first name, 2: Last name. */
				_x( '%1$s %2$s', 'Display name based on first name and last name' ),
				$author->first_name,
				$author->last_name
			);
		} else {
			$name = $author->display_name;
		}

		if ( ! $parsed_args['html'] ) {
			$return .= $name . ', ';

			continue; // No need to go further to process HTML.
		}

		if ( 'list' === $parsed_args['style'] ) {
			$return .= '<li>';
		}

		$link = sprintf(
			'<a href="%1$s" title="%2$s">%3$s</a>',
			esc_url( get_author_posts_url( $author->ID, $author->user_nicename ) ),
			/* translators: %s: Author's display name. */
			esc_attr( sprintf( __( 'Posts by %s' ), $author->display_name ) ),
			$name
		);

		if ( ! empty( $parsed_args['feed_image'] ) || ! empty( $parsed_args['feed'] ) ) {
			$link .= ' ';
			if ( empty( $parsed_args['feed_image'] ) ) {
				$link .= '(';
			}

			$link .= '<a href="' . get_author_feed_link( $author->ID, $parsed_args['feed_type'] ) . '"';

			$alt = '';
			if ( ! empty( $parsed_args['feed'] ) ) {
				$alt  = ' alt="' . esc_attr( $parsed_args['feed'] ) . '"';
				$name = $parsed_args['feed'];
			}

			$link .= '>';

			if ( ! empty( $parsed_args['feed_image'] ) ) {
				$link .= '<img src="' . esc_url( $parsed_args['feed_image'] ) . '" style="border: none;"' . $alt . ' />';
			} else {
				$link .= $name;
			}

			$link .= '</a>';

			if ( empty( $parsed_args['feed_image'] ) ) {
				$link .= ')';
			}
		}

		if ( $parsed_args['optioncount'] ) {
			$link .= ' (' . $posts . ')';
		}

		$return .= $link;
		$return .= ( 'list' === $parsed_args['style'] ) ? '</li>' : ', ';
	}

	$return = rtrim( $return, ', ' );

	if ( $parsed_args['echo'] ) {
		echo $return;
	} else {
		return $return;
	}
}

?>

</div>

<?php get_footer(); ?>
