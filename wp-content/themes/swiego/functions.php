<?php
/**
 * Created by PhpStorm.
 * User: evgeni
 * Date: 08.02.18
 * Time: 15:33
 */

function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );
add_action( 'init', 'wpb_custom_new_menu' );