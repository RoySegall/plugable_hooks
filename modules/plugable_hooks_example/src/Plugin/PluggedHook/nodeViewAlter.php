<?php

namespace Drupal\plugable_hooks_example\Plugin\PluggedHook;

use Drupal\plugable_hooks\PluggedHookBase;

/**
 * @PluggedHook(
 *  id = "node_load"
 * )
 */
class nodeViewAlter extends PluggedHookBase {

  public function invoke() {
    dpm('a');
  }

}
