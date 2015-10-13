<?php

/**
 * @file
 * Contains Drupal\plugable_hooks\PluggedHookManager.
 */

namespace Drupal\plugable_hooks;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Plugged hook plugin manager.
 */
class PluggedHookManager extends DefaultPluginManager {

  /**
   * Constructor for PluggedHookManager objects.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/PluggedHook', $namespaces, $module_handler, NULL, 'Drupal\plugable_hooks\Annotation\PluggedHook');
//    parent::__construct('Plugin/OgFields', $namespaces, $module_handler, NULL, 'Drupal\og\Annotation\OgFields');

    $this->alterInfo('plugable_hooks_plugged_hook_info');
    $this->setCacheBackend($cache_backend, 'plugable_hooks_plugged_hook_plugins');
  }

}
