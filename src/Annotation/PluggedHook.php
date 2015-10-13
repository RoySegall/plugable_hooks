<?php

/**
 * @file
 * Contains Drupal\plugable_hooks\Annotation\PluggedHook.
 */

namespace Drupal\plugable_hooks\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Plugged hook item annotation object.
 *
 * @see \Drupal\plugable_hooks\Plugin\PluggedHookManager
 * @see plugin_api
 *
 * @Annotation
 */
class PluggedHook extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
