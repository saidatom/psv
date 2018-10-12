<?php

namespace Drupal\psv\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * A psv base controller.
 */
class PSVController extends ControllerBase {

  /**
   * Returns a config user settings.
   */
  public static function configUser() {
    $config = \Drupal::config('user.settings');
    return $config;
  }

  /**
   * Returns a TRUE or FALSE password_strength validation.
   */
  public static function register() {
    $config = self::configUser();
    $state = FALSE;
    if ($config->get('password_strength')) {
      $state = TRUE;
    }
    return $state;
  }

  /**
   * Returns a TRUE or FALSE who can register accounts validation.
   */
  public static function passwordStrength() {
    $config = self::configUser();
    $state = FALSE;
    if ($config->get('register') != 'admin_only') {
      $state = TRUE;
    }
    return $state;
  }

  /**
   * Returns a TRUE or FALSE Required email verification.
   */
  public static function requiredEmail() {
    $config = self::configUser();
    $state = TRUE;
    if ($config->get('verify_mail')) {
      $state = FALSE;
    }
    return $state;
  }

}
