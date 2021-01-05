<?php
function fre_custom_header_menu() {
    global $user_ID;
	$theme_location ='visitor_menu';


    if( ! is_user_logged_in() ){
        $theme_location = 'visitor_menu';
    } else {
        $user_role = ae_user_role( $user_ID );
        if($user_role == FREELANCER){
            $theme_location = 'freelancer_menu';
        } else{
            $theme_location = 'employer_menu';
        }
    }

    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
        $css_class = 'fre-custom-menu  fre-user-role-'.$user_role.'-menu fre-menu-lation-'.$theme_location;
    	echo '<div class="fre-menu-top">';
        wp_nav_menu(
        	array(
        		'container' => 0,
        		'theme_location' => $theme_location,
        		'menu_class' =>'fre-menu-main '.$css_class,
        	)
        );
        echo '</div>';
    } else{
    	get_template_part( 'template/header', 'menu' );
    }

}