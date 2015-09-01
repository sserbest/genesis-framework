/* Move Entry Headline into Entry Content */

remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

add_action( 'genesis_entry_content', 'genesis_do_post_image', 1 );
add_action( 'genesis_entry_content', 'genesis_entry_header_markup_open', 5 );
add_action( 'genesis_entry_content', 'genesis_do_post_title', 6 );
add_action( 'genesis_entry_content', 'genesis_entry_header_markup_close', 7 );
