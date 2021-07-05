<?php
function load_stylesheets()
{
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style('stylesheet', get_template_directory_uri() . "/style.css", array('bootstrap'), $version, 'all');
  wp_enqueue_style('bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css", array(), '5.0.2', 'all');
  wp_enqueue_style('fontawesome', "https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css", array(), '5.15.3', 'all');

}

add_action('wp_enqueue_scripts', 'load_stylesheets');



function load_scripts(){
  wp_enqueue_script('bootstrap', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
  wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
  wp_enqueue_script('bootstrapcdn', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
  wp_enqueue_script('main-js', get_template_directory_uri()."/assets/js/main.js", array(), '1.0', true);

}

add_action('wp_enqueue_scripts', 'load_scripts');


function wp_maintenance_mode() {
if (!current_user_can('edit_themes') || !is_user_logged_in()) {
wp_die('<h1>Under Maintenance</h1><br />Website under planned maintenance. Please check back later.');
}
}
add_action('wp_enqueue_scripts', 'wp_maintenance_mode');


?>