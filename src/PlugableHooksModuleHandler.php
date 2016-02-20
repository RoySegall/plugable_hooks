<?php

/**
 * @file
 * Contains \Drupal\plugable_hooks\PlugableHooksModuleHandler.
 */

namespace Drupal\plugable_hooks;

use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Extension\ModuleHandler;

/**
 * Class that manages modules in a Drupal installation.
 */
class PlugableHooksModuleHandler extends ModuleHandler {

  /**
   * {@inheritdoc}
   */
  public function invokeAll($hook, array $args = array()) {

    $return = parent::invokeAll($hook, $args);

    return $this->searchForMatchingHooks($hook, $args, $return);
  }

  /**
   * Search for matching plugins.
   *
   * @param $hook
   *   The name of the hook.
   * @param $args
   *   The args provided by the module invoker.
   * @param $return
   *   The returned values of the parent class method.
   * @return array
   *   An array of return values of the hook implementations. If modules return
   *   arrays from their implementations, those are merged into one array
   *   recursively. Note: integer keys in arrays will be lost, as the merge is
   *   done using array_merge_recursive().
   */
  protected function searchForMatchingHooks($hook, $args, $return) {
    /** @var PluggedHookManager $plugin_manager */
    $plugin_manager = \Drupal::service('plugin.manager.plugged_hook.processor');

    foreach ($plugin_manager->getDefinitions() as $definition) {

      if ($definition['hook'] == $hook) {
        /** @var PluggedHookBase $plugin */
        $plugin = $plugin_manager->createInstance($definition['id']);
        $return[] = $plugin->invoke($args);
      }
    }

    return $return;
  }

}
