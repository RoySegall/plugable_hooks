## Plugable hooks

Move naming convention callbacks function to OOP based.

## Why I should use this module?
This module can be useful for two reasons:
  1. big MYMODULE.module file - When working with a big project the module file 
     becomes huge. Moving the callback to small plugins could be much easier
     to maintain.
  2. Extended hooks base logic - Hooks can have big logic. Module can pass their
     hooks base logic into base classes and your plugin implementation could
     benefit from it.
     
## Implementing
You can look on the example for implementing hook_entity_access via plugins:
```php
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
