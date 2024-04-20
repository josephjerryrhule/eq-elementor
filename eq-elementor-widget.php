<?php

/**
 * Plugin Name: EQ Elementor
 * Author: Effect Studios
 * Author URI: https://effectstudios.co
 * Description: EQ Elementor Widget Addons
 * Version: 0.1.0
 * text-domain: eqelementor
 * 
 * @package eqelementor
 */

namespace EQELEMENTOR\ElementorWidgets;

use EQELEMENTOR\ElementorWidgets\Widgets\form_slider;
use EQELEMENTOR\ElementorWidgets\Widgets\slider;

if (!defined('ABSPATH')) {
  exit;
}

final class eq_elementor_widget
{

  private static $_instance = null;

  public static function get_instance()
  {
    if (is_null(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }


  public function __construct()
  {
    add_action('elementor/init', [$this, 'init']);
  }

  public function init()
  {
    add_action('elementor/elements/categories_registered', [$this, 'create_new_category']);
    add_action('elementor/widgets/register', [$this, 'init_widgets']);
  }

  public function create_new_category($elements_manager)
  {
    $elements_manager->add_category(
      'eq-elementor',
      [
        'title' => __('EQ Elementor', 'eqelementor')
      ]
    );
  }


  public function init_widgets($widgets_manager)
  {

    //Require Widgets
    require_once __DIR__ . '/widgets/slider.php';
    require_once __DIR__ . '/widgets/form-slider.php';

    //Instantiate Widgets
    $widgets_manager->register(new slider());
    $widgets_manager->register(new form_slider());
  }
}

eq_elementor_widget::get_instance();
