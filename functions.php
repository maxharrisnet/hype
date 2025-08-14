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

/**
 * Register Custom Post Type: Talent
 */
function hr_register_talent_cpt()
{

  $labels = array(
    'name'                  => 'Talent',
    'singular_name'         => 'Talent Profile',
    'menu_name'             => 'Talent',
    'name_admin_bar'        => 'Talent Profile',
    'add_new'               => 'Add New',
    'add_new_item'          => 'Add New Talent Profile',
    'new_item'              => 'New Talent Profile',
    'edit_item'             => 'Edit Talent Profile',
    'view_item'             => 'View Talent Profile',
    'all_items'             => 'All Talent',
    'search_items'          => 'Search Talent',
    'not_found'             => 'No Talent found.',
    'not_found_in_trash'    => 'No Talent found in Trash.',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'rewrite'            => array('slug' => 'talent'),
    'supports'           => array('title', 'editor', 'thumbnail'),
    'show_in_rest'       => false, // Not using block editor for CPT
    'menu_icon'          => 'dashicons-groups',
  );

  register_post_type('talent', $args);
}
add_action('init', 'hr_register_talent_cpt');

/**
 * Register Growth Stage Taxonomy
 */
function hr_register_growth_stage_taxonomy()
{

  $labels = array(
    'name'              => 'Growth Stages',
    'singular_name'     => 'Growth Stage',
    'search_items'      => 'Search Growth Stages',
    'all_items'         => 'All Growth Stages',
    'edit_item'         => 'Edit Growth Stage',
    'update_item'       => 'Update Growth Stage',
    'add_new_item'      => 'Add New Growth Stage',
    'new_item_name'     => 'New Growth Stage Name',
    'menu_name'         => 'Growth Stages',
  );

  $args = array(
    'hierarchical'      => true, // Category-like
    'labels'            => $labels,
    'show_ui'           => true,
    'show_in_rest'      => false,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'growth_stage'),
  );

  register_taxonomy('growth_stage', array('talent'), $args);
}
add_action('init', 'hr_register_growth_stage_taxonomy');

/**
 * Register Specialty Taxonomy
 */
function hr_register_specialty_taxonomy()
{

  $labels = array(
    'name'              => 'Specialties',
    'singular_name'     => 'Specialty',
    'search_items'      => 'Search Specialties',
    'all_items'         => 'All Specialties',
    'edit_item'         => 'Edit Specialty',
    'update_item'       => 'Update Specialty',
    'add_new_item'      => 'Add New Specialty',
    'new_item_name'     => 'New Specialty Name',
    'menu_name'         => 'Specialties',
  );

  $args = array(
    'hierarchical'      => true, // Category-like
    'labels'            => $labels,
    'show_ui'           => true,
    'show_in_rest'      => false,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'specialty'),
  );

  register_taxonomy('specialty', array('talent'), $args);
}
add_action('init', 'hr_register_specialty_taxonomy');
