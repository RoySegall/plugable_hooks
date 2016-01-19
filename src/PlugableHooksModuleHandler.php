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

    // todo: handle this issues:
    /**
     *     foreach ($this->moduleHandler()->getImplementations('entity_load') as $module) {
    $function = $module . '_entity_load';
    $function($entities, $this->entityTypeId);
    }
    // Call hook_TYPE_load().
    foreach ($this->moduleHandler()->getImplementations($this->entityTypeId . '_load') as $module) {
    $function = $module . '_' . $this->entityTypeId . '_load';
    $function($entities);
    }
     */


    $return = parent::invokeAll($hook, $args);

    return $this->searchForMatchingHooks($hook, $args, $return);
  }

  /**
   * Search for matching plugins.
   *
   * @param $hook
   * @param $args
   * @param $return
   * @return array
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
