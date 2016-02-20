<?php

/**
 * @file
 * Contains Drupal\plugable_hooks\PlugableHooksServiceProvider
 */

namespace Drupal\plugable_hooks;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;

/**
 * Modifies the language manager service.
 */
class PlugableHooksServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    $definition = $container->getDefinition('module_handler');
    $definition->setClass('\Drupal\plugable_hooks\PlugableHooksModuleHandler');
  }
}
