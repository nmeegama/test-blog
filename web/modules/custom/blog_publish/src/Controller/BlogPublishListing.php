<?php

namespace Drupal\blog_publish\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\views\Views;

/**
 * Class BlogPublishListing.
 *
 * @package Drupal\blog_publish\Controller
 */
class BlogPublishListing extends ControllerBase {

  /**
   * Gets the listing view if possible.
   */
  public static function viewListing() {
    if (blog_publish_get_node_fields()) {
      $view = Views::getView('blog_publish');
      $view->setDisplay('block_1');
      return $view->buildRenderable();
    }

    return [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => t('A blog publish field has to be added to a content type before this functionality can be used.'),
    ];
  }

}
