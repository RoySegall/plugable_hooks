<?php

namespace Drupal\plugable_hooks_example\Plugin\PluggedHook;

use Drupal\Core\Access\AccessResultNeutral;
use Drupal\plugable_hooks\PluggedHookBase;

/**
 * @PluggedHook(
 *  id = "plugable_hooks_example_entity_access",
 *  hook = "entity_access"
 * )
 */
class EntityAccess extends PluggedHookBase {

  /**
   * {@inheritdoc}
   */
  public function invoke($args) {
    // Return neutral because this is just an example.
    return AccessResultNeutral::neutral();
  }

}
