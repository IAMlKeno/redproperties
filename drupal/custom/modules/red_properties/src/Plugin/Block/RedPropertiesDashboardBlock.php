<?php

declare(strict_types=1);

namespace Drupal\red_properties\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Render\RendererInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides an user dashboard block.
 *
 * @Block(
 *   id = "red_properties_dashboard",
 *   admin_label = @Translation("User Dashboard"),
 *   category = @Translation("Custom"),
 * )
 */
final class RedPropertiesDashboardBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Constructs the plugin instance.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    private readonly EntityTypeManagerInterface $entityTypeManager,
    private readonly ConfigFactoryInterface $configFactory,
    private readonly RendererInterface $renderer,
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): self {
    return new self(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('config.factory'),
      $container->get('renderer'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $o = $this->entityTypeManager->getStorage('dashboard')->load('landlord_cockpit');
    $vb = $this->entityTypeManager->getViewBuilder('dashboard');
    $pr = $vb->view($o, 'full');
    // dsm($pr);
    $build['content'] = [
      '#markup' => $this->renderer->render($pr),
    ];
    return $build;
  }

}
