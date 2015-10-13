<?php

namespace Drupal\plugable_hooks_example\PluggedHook;

use Drupal\plugable_hooks\PluggedHookBase;

/**
 * @PluggedHook(
 *  id = "node_view_alter"
 * )
 */
class NodeLoad  extends PluggedHookBase {

  public function invoke() {
    dpm('a');
  }

}
