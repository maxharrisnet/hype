<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

function hr_register_theme()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'hr_register_theme');


/* Styles and Scripts */
function hr_enqueue_global_styles()
{
  wp_enqueue_style('hr-style', get_stylesheet_uri());
  wp_enqueue_style('montserrat-font', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap', false);
}
add_action('wp_enqueue_scripts', 'hr_enqueue_global_styles');

function hr_enqueue_scripts()
{
  wp_enqueue_script('hr-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'hr_enqueue_scripts');

// Nav menus
function hr_register_menus()
{
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'hype-relations'),
    'footer'  => __('Footer Menu', 'hype-relations'),
  ));
}
add_action('init', 'hr_register_menus');
