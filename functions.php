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

/* Custom Data Structures */
// Register Talent CPT
function hr_register_talent_cpt()
{
  $labels = array(
    'name' => 'Talent Profiles',
    'singular_name' => 'Talent',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Talent',
    'edit_item' => 'Edit Talent',
    'new_item' => 'New Talent',
    'view_item' => 'View Talent',
    'search_items' => 'Search Talent',
    'not_found' => 'No talent found',
    'not_found_in_trash' => 'No talent found in trash',
    'menu_name' => 'Talent'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'rewrite' => array('slug' => 'talent'),
    'menu_icon' => 'dashicons-groups',
    'supports' => array('title', 'editor', 'thumbnail'),
    'show_in_rest' => false // Not using block editor for CPT
  );

  register_post_type('talent', $args);
}
add_action('init', 'hr_register_talent_cpt');

// Register Disciplines taxonomy
function hr_register_disciplines_tax()
{
  $labels = array(
    'name' => 'Disciplines',
    'singular_name' => 'Discipline',
    'search_items' => 'Search Disciplines',
    'all_items' => 'All Disciplines',
    'edit_item' => 'Edit Discipline',
    'update_item' => 'Update Discipline',
    'add_new_item' => 'Add New Discipline',
    'new_item_name' => 'New Discipline Name',
    'menu_name' => 'Disciplines'
  );

  register_taxonomy('discipline', 'talent', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'discipline'),
  ));
}
add_action('init', 'hr_register_disciplines_tax');

// Register Growth Stage taxonomy
function hr_register_growth_stage_tax()
{
  $labels = array(
    'name' => 'Growth Stages',
    'singular_name' => 'Growth Stage',
    'search_items' => 'Search Growth Stages',
    'all_items' => 'All Growth Stages',
    'edit_item' => 'Edit Growth Stage',
    'update_item' => 'Update Growth Stage',
    'add_new_item' => 'Add New Growth Stage',
    'new_item_name' => 'New Growth Stage Name',
    'menu_name' => 'Growth Stages'
  );

  register_taxonomy('growth_stage', 'talent', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'growth-stage'),
  ));
}
add_action('init', 'hr_register_growth_stage_tax');
