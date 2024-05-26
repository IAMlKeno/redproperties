<?php

namespace Drupal\red_properties\Plugin\FormAlter;

use Drupal\Core\Form\FormStateInterface;
use Drupal\pluginformalter\Annotation\FormAlter;
use Drupal\pluginformalter\Plugin\FormAlterBase;

/**
 * Class MyModuleBaseFormAlter.
 *
 * @FormAlter(
 *   id = "red_properties_form_alter",
 *   label = @Translation("Altering registration form."),
 *   form_id = {
 *    "user_register_form"
 *   },
 * )
 *
 * @package Drupal\red_properties\Plugin\FormAlter
 */
class UserRegistrationForm extends FormAlterBase {

  /**
   * {@inheritdoc}
   */
  public function formAlter(array &$form, FormStateInterface &$form_state, $form_id) {
    var_dump($form);
    $form['#markup'] = '<h2>Edit butts</h2>';

  }

}