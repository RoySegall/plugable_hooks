<?php

/**
 * @file
 * Contains Drupal\plugable_hooks_example\Controller\PlugableHookExample.
 */

namespace Drupal\plugable_hooks_example\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class PlugableHookExample.
 *
 * @package Drupal\plugable_hooks_example\Controller
 */
class PlugableHookExample extends ControllerBase {
  /**
   * Index.
   *
   * @return string
   *   Return Hello string.
   */
  public function index() {

    return [
        '#type' => 'markup',
        '#markup' => $this->t('Implement method: index')
    ];
  }

}
