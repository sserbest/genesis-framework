<?php
/*
Template Name: Page Blocks Template
*/
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' ); //* Force full width content layout
add_filter( 'body_class', 'altitude_add_body_class' ); //* Add custom body class to the head
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

function altitude_add_body_class( $classes ) {
    $classes[] = 'body_class';
    return $classes;
}

function hero_banner(){
    if( have_rows('content_blocks') ){
        while( have_rows('content_blocks')){ the_row();
            if( get_row_layout() == 'hero_banner' ){
                $sectionID      = get_sub_field('section_id');
                $sectionClass   = get_sub_field('section_class');
                $hero_image     = get_sub_field('hero_image');
                $hero_headline  = get_sub_field('hero_headline');
                $hero_subhead   = get_sub_field('hero_subhead');
                //Output to Page
                echo '<section id="'.$sectionID.'" class="content-block '.$sectionClass.'">';
                echo '<div class="site-inner"><div class="wrap">'; //html start
                echo '<div class="secondary-hero image-section" style="background: url(' ;
                echo $hero_image;
                echo '); background-repeat: no-repeat; background-position: center center; background-size: cover; background-color: #FFFFFF;"><div class="hero-heads"><div class="wrap"><section class="hero-heads-rel"><div class="hero-heads-fixed">';
                echo '<div class="page-header"><h1>' . $hero_headline . '</h1></div>';
                echo '<h2>' . $hero_subhead . '</h2>';
                echo '</div></section></div></div></div>';
                echo '</div></div>'; //html end
                echo '</section>';
            }
        }
    }
}

function content_blocks() {

    if( have_rows('content_blocks') ) {
        while (have_rows('content_blocks')) { the_row();

            if (get_row_layout() == 'full_width_text_block') {
                $sectionID = get_sub_field('section_id');
                $sectionClass = get_sub_field('section_class');
                $full_width_headline = get_sub_field('full_width_headline');
                $full_width_paragraph = get_sub_field('full_width_paragraph');
                echo '<section id="' . $sectionID . '" class="content-block ' . $sectionClass . '"><div class="wrap">';
                echo '<h2>' . $full_width_headline . '</h2>';
                echo '<div>' . $full_width_paragraph . '</div>';
                echo '</div></section>';
            }

            if (get_row_layout() == 'cta_block') {
                $sectionID = get_sub_field('section_id');
                $sectionClass = get_sub_field('section_class');
                $headline = get_sub_field('headline');
                $paragraph = get_sub_field('full_width_paragraph');
                echo '<section id="' . $sectionID . '" class="' . $sectionClass . '"><div class="wrap">';
                echo '<h2>' . $headline . '</h2>';
                echo '<div>' . $paragraph . '</div>';
                echo '</div></section>';
            }

            if( get_row_layout() == 'team_block' ){
                $sectionID = get_sub_field('section_id');
                $sectionClass =  get_sub_field('section_class');
                $team_block_intro = get_sub_field('team_block_intro');
                echo '<section id="' . $sectionID . '" class="content-block '. $sectionClass . '"><div class="flexible-widgets"><div class="wrap">';
                echo '<header>' . $team_block_intro . '</header>';
                if( have_rows('team_member') ){
                    while ( have_rows('team_member') ) { the_row();
                        // $author_id = get_the_author_meta('ID');
                        $team_member_image = get_sub_field('team_member_image');
                        $team_member_name = get_sub_field('team_member_name');
                        $team_member_title = get_sub_field('team_member_title');
                        $team_member_story = get_sub_field('team_member_story');
                        $team_member_social = get_sub_field('team_member_social');
                        $author_id = get_sub_field('author_id');
                        $author_link = $author_id[ID];
                        $profile_link = get_author_posts_url($author_link);
                        $team_member_phone = get_sub_field('phone');
                        $team_member_email = get_sub_field('email');
                        echo '<article class="team-member">';
                        echo '<a href="' . $profile_link . '">';
                        echo '<img src="' . $team_member_image . '"/></a>';
                        echo '<div class="team-header"><h3>' . $team_member_name . '</h3>';
                        echo '<h4>' . $team_member_title . '</h4></div>';
                        echo '<div id="social">'.$team_member_social.'</div>';
                        echo '<div id="contact"><span>'.$team_member_email. '</span><span>' .$team_member_phone.'</span></div>';
                        echo '<div class="team-content"><p>' . $team_member_story . '</p><p>' . $author_link[ID] . '</p></div>';
                        echo '</article>';
                    }
                }
                echo '</div></div></section>';
            }

            if( get_row_layout() == 'full_width_image' ){
                $sectionID = get_sub_field('section_id');
                $sectionClass =  get_sub_field('section_class');
                $image = get_sub_field('image_full_width');
                echo '<section id="' . $sectionID . '" class="content-block '. $sectionClass . ' secondary-full-width-image image-section" style="background: url(' ;
                echo $image;
                echo '); background-repeat: no-repeat; background-position: center center; background-size: cover; background-color: #FFFFFF;"><div class="wrap">';
                echo '</div></section>';
            }

            if( get_row_layout() == 'two_column_text_block' ){
                $sectionID = get_sub_field('section_id');
                $sectionClass =  get_sub_field('section_class');
                $headline = get_sub_field('full_width_headline');
                $first_column = get_sub_field('first_column');
                $second_column = get_sub_field('second_column_again');
                echo '<section id="' . $sectionID . '" class="content-block '. $sectionClass . ' flexible-widgets"><div class="wrap">';
                echo '<h2>' . $headline . '</h2>';
                echo '<div class="one-half first">' . $first_column . '</div>';
                echo '<div class="one-half">' . $second_column . '</div>';
                echo '</div></section>';
            }

            if( get_row_layout() == 'three_column_text_block' ){
                $sectionID = get_sub_field('section_id');
                $sectionClass =  get_sub_field('section_class');
                $headline = get_sub_field('full_width_headline');
                $first_column = get_sub_field('first_column');
                $second_column = get_sub_field('second_column_again');
                $third_column = get_sub_field('third_column_again');

                echo '<section id="' . $sectionID . '" class="content-block '. $sectionClass . '"><div class="wrap">';
                echo '<h2>' . $headline . '</h2>';
                echo '<div class="one-third first">' . $first_column . '</div>';
                echo '<div class="one-third">' . $second_column . '</div>';
                echo '<div class="one-third">' . $third_column . '</div>';
                echo '</div></section>';
            }

            if( get_row_layout() == 'content_block' ){
                $sectionId =  get_sub_field('section_id');
                $sectionClass =  get_sub_field('section_class');

                if( have_rows('content_text_block') ){
                    $count = 0;
                    while ( have_rows('content_text_block') ) { the_row();
                        $count = $count + 1;

                        $class = '';

                        if( $count == 1 ) {
                            $class .= ' widget-full';
                        } elseif( $count % 3 == 1 ) {
                            $class .= ' widget-thirds';
                        } elseif( $count % 4 == 1 ) {
                            $class .= ' widget-fourths';
                        } elseif( $count % 2 == 0 ) {
                            $class .= ' widget-halves uneven';
                        } else {
                            $class .= ' widget-halves';
                        }
                        // return $class;
                    }

                    echo '<section id="'. $sectionId . '" class="content-block '. $sectionClass . '"><div class="flexible-widgets widget-area'. $class . '"><div class="wrap">';
                    while ( have_rows('content_text_block') ) { the_row();
                        echo '<article class="widget ">';
                        the_sub_field('text_block');
                        echo '</article>';
                    }
                    echo '</div></div></section>';
                }
            }

            if( get_row_layout() == 'google_map' ){
                $sectionID = get_sub_field('section_id');
                $sectionClass =  get_sub_field('section_class');
                $map_text = get_sub_field('map_text');
                $location = get_field('map');
                //echo '<section class="secondary-full-width-map">';
                echo '<section id="' . $sectionID . '" class="content-block '. $sectionClass . '">';
                echo '<article class="secondary-full-width-map widget">';
                echo '<h3>'.$map_text.'</h3>';
                echo '<p>'.$location['address'].'</p>';
                echo '<div id="map" style="width: 100%; height: 350px;"></div>
                    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>';
                echo '<script type="text/javascript">
                  //<![CDATA[
                    function load() {
                    var lat ='. $location['lat'] .';
                    var lng ='. $location['lng'] .';
                // coordinates to latLng
                    var latlng = new google.maps.LatLng(lat, lng);
                // map Options
                    var myOptions = {
                    scrollwheel: false,
                    zoom: 14,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                   };
                //draw a map
                    var map = new google.maps.Map(document.getElementById("map"), myOptions);
                    var marker = new google.maps.Marker({
                    position: map.getCenter(),
                    map: map
                   });
                }
                // call the function
                   load();
                //]]>
                </script>';
                //echo '</section>';
                echo '</article>';
                echo '</section>';
            }
        }
    }
}

add_action('genesis_after_header','hero_banner', 12);
add_action('content_area','content_blocks');

get_header();
do_action( 'content_area' );
get_footer();
