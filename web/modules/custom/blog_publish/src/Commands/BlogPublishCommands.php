<?php

namespace Drupal\blog_publish\Commands;

use Drupal\blog_publish\Service\BlogPublishCron;
use Drush\Commands\DrushCommands;

/**
 * Class BlogPublishCommands
 *
 * @package Drupal\blog_publish\Commands
 */
class BlogPublishCommands extends DrushCommands {

  /**
   * @var \Drupal\blog_publish\Service\BlogPublishCron
   */
  private $publishCron;

  /**
   * BlogPublishCommands constructor.
   *
   * @param \Drupal\blog_publish\Service\BlogPublishCron $publishCron
   */
  public function __construct(BlogPublishCron $publishCron) {
    parent::__construct();
    $this->publishCron = $publishCron;
  }

  /**
   * @command blog_publish:doUpdate
   * @aliases schp
   */
  public function doUpdate() {
    $this->publishCron->doUpdate();
    $this->logger()->notice(t('Blog publish updates done.'));
  }
}
