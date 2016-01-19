<?php

namespace Drupal\plugable_hooks;

class PlugableHook {

  /**
   * @param $hook
   * @return PluggedHookBase
   */
  static public function loadPlug($hook) {
    $config = \Drupal::service('plugin.manager.plugged_hook.processor');
    $plugable_hooks = $config->getDefinitions();

    if (isset($plugable_hooks[$hook])) {
      return $config->createInstance($hook);
    }
  }
}
