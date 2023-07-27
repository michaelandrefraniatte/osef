<?php

/**
 * @file
 * Contains Drupal\cookiebanner\Form\SettingsForm.
 */

namespace Drupal\cookiebanner\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Datetime\DrupalDateTime;

/**
 * Class SettingsForm.
 *
 * @package Drupal\cookiebanner\Form
 */
class SettingsForm extends ConfigFormBase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new SettingsForm object.
   */
  public function __construct(ConfigFactoryInterface $config_factory, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($config_factory);

    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'cookiebanner.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'cookiebanner_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('cookiebanner.settings');

    $form['openclosebutton'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Texte du boutton d\'ouverture/fermeture de la bannière :'),
      '#description' => $this->t('Boutton qui apparait avec le curseur de souris en bas.'),
      '#default_value' => $config->get('openclosebutton'),
    ];

    $form['informationtitle'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre pour l\'information sur les cookies :'),
      '#description' => $this->t('Premier titre de la bannière.'),
      '#default_value' => $config->get('informationtitle'),
    ];

    $form['information'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Information sur les cookies :'),
      '#description' => $this->t('Information dans le bannière.'),
      '#rows' => 5,
      '#default_value' => $config->get('information'),
    ];

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre pour les cookies :'),
      '#description' => $this->t('Second titre de la bannière.'),
      '#default_value' => $config->get('title'),
    ];

    $form['cookie1'] = array(
      '#type' => 'fieldset',
      '#title' => t('Cookie 1'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,  
    );

    $form['cookie1']['cookieactive1'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Actif'),
      '#description' => $this->t('La case doit être cochée pour que le cookie 1 s\'affiche.'),
      '#default_value' => $config->get('cookieactive1'),
    ];

    $form['cookie1']['cookiename1'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom informatique du cookie 1 à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs cookies à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiename1'),
    ];

    $form['cookie1']['cookiefct1'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom de la fonction d\'un script à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs scripts à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiefct1'),
    ];

    $form['cookie1']['cookiecheck1'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Obligatoire'),
      '#description' => $this->t('La case doit être cochée quand le cookie 1 est obligatoire.'),
      '#default_value' => $config->get('cookiecheck1'),
    ];
    
    $form['cookie1']['cookietitle1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre pour le cookie 1 :'),
      '#description' => $this->t('Titre du cookie en position 1.'),
      '#default_value' => $config->get('cookietitle1'),
    ];
    
    $form['cookie1']['cookiedescription1'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description pour le cookie 1 :'),
      '#description' => $this->t('Description du cookie en position 1.'),
      '#rows' => 5,
      '#default_value' => $config->get('cookiedescription1'),
    ];

    $form['cookie2'] = array(
      '#type' => 'fieldset',
      '#title' => t('Cookie 2'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,  
    );

    $form['cookie2']['cookieactive2'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Actif'),
      '#description' => $this->t('La case doit être cochée pour que le cookie 2 s\'affiche.'),
      '#default_value' => $config->get('cookieactive2'),
    ];

    $form['cookie2']['cookiename2'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom informatique du cookie 2 à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs cookies à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiename2'),
    ];

    $form['cookie2']['cookiefct2'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom de la fonction d\'un script à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs scripts à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiefct2'),
    ];

    $form['cookie2']['cookiecheck2'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Obligatoire'),
      '#description' => $this->t('La case doit être cochée quand le cookie 2 est obligatoire.'),
      '#default_value' => $config->get('cookiecheck2'),
    ];
    
    $form['cookie2']['cookietitle2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre pour le cookie 2 :'),
      '#description' => $this->t('Titre du cookie en position 2.'),
      '#default_value' => $config->get('cookietitle2'),
    ];
    
    $form['cookie2']['cookiedescription2'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description pour le cookie 2 :'),
      '#description' => $this->t('Description du cookie en position 2.'),
      '#rows' => 5,
      '#default_value' => $config->get('cookiedescription2'),
    ];

    $form['cookie3'] = array(
      '#type' => 'fieldset',
      '#title' => t('Cookie 3'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,  
    );

    $form['cookie3']['cookieactive3'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Actif'),
      '#description' => $this->t('La case doit être cochée pour que le cookie 3 s\'affiche.'),
      '#default_value' => $config->get('cookieactive3'),
    ];

    $form['cookie3']['cookiename3'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom informatique du cookie 3 à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs cookies à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiename3'),
    ];

    $form['cookie3']['cookiefct3'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom de la fonction d\'un script à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs scripts à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiefct3'),
    ];

    $form['cookie3']['cookiecheck3'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Obligatoire'),
      '#description' => $this->t('La case doit être cochée quand le cookie 3 est obligatoire.'),
      '#default_value' => $config->get('cookiecheck3'),
    ];
    
    $form['cookie3']['cookietitle3'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre pour le cookie 3 :'),
      '#description' => $this->t('Titre du cookie en position 3.'),
      '#default_value' => $config->get('cookietitle3'),
    ];
    
    $form['cookie3']['cookiedescription3'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description pour le cookie 3 :'),
      '#description' => $this->t('Description du cookie en position 3.'),
      '#rows' => 5,
      '#default_value' => $config->get('cookiedescription3'),
    ];

    $form['cookie4'] = array(
      '#type' => 'fieldset',
      '#title' => t('Cookie 4'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,  
    );

    $form['cookie4']['cookieactive4'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Actif'),
      '#description' => $this->t('La case doit être cochée pour que le cookie 4 s\'affiche.'),
      '#default_value' => $config->get('cookieactive4'),
    ];

    $form['cookie4']['cookiename4'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom informatique du cookie 4 à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs cookies à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiename4'),
    ];

    $form['cookie4']['cookiefct4'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom de la fonction d\'un script à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs scripts à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiefct4'),
    ];

    $form['cookie4']['cookiecheck4'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Obligatoire'),
      '#description' => $this->t('La case doit être cochée quand le cookie 4 est obligatoire.'),
      '#default_value' => $config->get('cookiecheck4'),
    ];
    
    $form['cookie4']['cookietitle4'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre pour le cookie 4 :'),
      '#description' => $this->t('Titre du cookie en position 4.'),
      '#default_value' => $config->get('cookietitle4'),
    ];
    
    $form['cookie4']['cookiedescription4'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description pour le cookie 4 :'),
      '#description' => $this->t('Description du cookie en position 4.'),
      '#rows' => 5,
      '#default_value' => $config->get('cookiedescription4'),
    ];

    $form['cookie5'] = array(
      '#type' => 'fieldset',
      '#title' => t('Cookie 5'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,  
    );

    $form['cookie5']['cookieactive5'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Actif'),
      '#description' => $this->t('La case doit être cochée pour que le cookie 5 s\'affiche.'),
      '#default_value' => $config->get('cookieactive5'),
    ];

    $form['cookie5']['cookiename5'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom informatique du cookie 5 à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs cookies à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiename5'),
    ];

    $form['cookie5']['cookiefct5'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom de la fonction d\'un script à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs scripts à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiefct5'),
    ];

    $form['cookie5']['cookiecheck5'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Obligatoire'),
      '#description' => $this->t('La case doit être cochée quand le cookie 5 est obligatoire.'),
      '#default_value' => $config->get('cookiecheck5'),
    ];
    
    $form['cookie5']['cookietitle5'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre pour le cookie 5 :'),
      '#description' => $this->t('Titre du cookie en position 5.'),
      '#default_value' => $config->get('cookietitle5'),
    ];
    
    $form['cookie5']['cookiedescription5'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description pour le cookie 5 :'),
      '#description' => $this->t('Description du cookie en position 5.'),
      '#rows' => 5,
      '#default_value' => $config->get('cookiedescription5'),
    ];

    $form['cookie6'] = array(
      '#type' => 'fieldset',
      '#title' => t('Cookie 6'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,  
    );

    $form['cookie6']['cookieactive6'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Actif'),
      '#description' => $this->t('La case doit être cochée pour que le cookie 6 s\'affiche.'),
      '#default_value' => $config->get('cookieactive6'),
    ];

    $form['cookie6']['cookiename6'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom informatique du cookie 6 à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs cookies à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiename6'),
    ];

    $form['cookie6']['cookiefct6'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom de la fonction d\'un script à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs scripts à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiefct6'),
    ];

    $form['cookie6']['cookiecheck6'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Obligatoire'),
      '#description' => $this->t('La case doit être cochée quand le cookie 6 est obligatoire.'),
      '#default_value' => $config->get('cookiecheck6'),
    ];
    
    $form['cookie6']['cookietitle6'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre pour le cookie 6 :'),
      '#description' => $this->t('Titre du cookie en position 6.'),
      '#default_value' => $config->get('cookietitle6'),
    ];
    
    $form['cookie6']['cookiedescription6'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description pour le cookie 6 :'),
      '#description' => $this->t('Description du cookie en position 6.'),
      '#rows' => 5,
      '#default_value' => $config->get('cookiedescription6'),
    ];

    $form['cookie7'] = array(
      '#type' => 'fieldset',
      '#title' => t('Cookie 7'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,  
    );

    $form['cookie7']['cookieactive7'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Actif'),
      '#description' => $this->t('La case doit être cochée pour que le cookie 7 s\'affiche.'),
      '#default_value' => $config->get('cookieactive7'),
    ];

    $form['cookie7']['cookiename7'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom informatique du cookie 7 à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs cookies à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiename7'),
    ];

    $form['cookie7']['cookiefct7'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom de la fonction d\'un script à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs scripts à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiefct7'),
    ];

    $form['cookie7']['cookiecheck7'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Obligatoire'),
      '#description' => $this->t('La case doit être cochée quand le cookie 7 est obligatoire.'),
      '#default_value' => $config->get('cookiecheck7'),
    ];
    
    $form['cookie7']['cookietitle7'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre pour le cookie 7 :'),
      '#description' => $this->t('Titre du cookie en position 7.'),
      '#default_value' => $config->get('cookietitle7'),
    ];
    
    $form['cookie7']['cookiedescription7'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description pour le cookie 7 :'),
      '#description' => $this->t('Description du cookie en position 7.'),
      '#rows' => 5,
      '#default_value' => $config->get('cookiedescription7'),
    ];

    $form['cookie8'] = array(
      '#type' => 'fieldset',
      '#title' => t('Cookie 8'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,  
    );

    $form['cookie8']['cookieactive8'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Actif'),
      '#description' => $this->t('La case doit être cochée pour que le cookie 8 s\'affiche.'),
      '#default_value' => $config->get('cookieactive8'),
    ];

    $form['cookie8']['cookiename8'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom informatique du cookie 8 à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs cookies à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiename8'),
    ];

    $form['cookie8']['cookiefct8'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom de la fonction d\'un script à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs scripts à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiefct8'),
    ];

    $form['cookie8']['cookiecheck8'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Obligatoire'),
      '#description' => $this->t('La case doit être cochée quand le cookie 8 est obligatoire.'),
      '#default_value' => $config->get('cookiecheck8'),
    ];
    
    $form['cookie8']['cookietitle8'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre pour le cookie 8 :'),
      '#description' => $this->t('Titre du cookie en position 8.'),
      '#default_value' => $config->get('cookietitle8'),
    ];
    
    $form['cookie8']['cookiedescription8'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description pour le cookie 8 :'),
      '#description' => $this->t('Description du cookie en position 8.'),
      '#rows' => 5,
      '#default_value' => $config->get('cookiedescription8'),
    ];

    $form['cookie9'] = array(
      '#type' => 'fieldset',
      '#title' => t('Cookie 9'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,  
    );

    $form['cookie9']['cookieactive9'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Actif'),
      '#description' => $this->t('La case doit être cochée pour que le cookie 9 s\'affiche.'),
      '#default_value' => $config->get('cookieactive9'),
    ];

    $form['cookie9']['cookiename9'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom informatique du cookie 9 à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs cookies à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiename9'),
    ];

    $form['cookie9']['cookiefct9'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom de la fonction d\'un script à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs scripts à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiefct9'),
    ];

    $form['cookie9']['cookiecheck9'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Obligatoire'),
      '#description' => $this->t('La case doit être cochée quand le cookie 9 est obligatoire.'),
      '#default_value' => $config->get('cookiecheck9'),
    ];
    
    $form['cookie9']['cookietitle9'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre pour le cookie 9 :'),
      '#description' => $this->t('Titre du cookie en position 9.'),
      '#default_value' => $config->get('cookietitle9'),
    ];
    
    $form['cookie9']['cookiedescription9'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description pour le cookie 9 :'),
      '#description' => $this->t('Description du cookie en position 9.'),
      '#rows' => 5,
      '#default_value' => $config->get('cookiedescription9'),
    ];

    $form['cookie10'] = array(
      '#type' => 'fieldset',
      '#title' => t('Cookie 10'),
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,  
    );

    $form['cookie10']['cookieactive10'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Actif'),
      '#description' => $this->t('La case doit être cochée pour que le cookie 10 s\'affiche.'),
      '#default_value' => $config->get('cookieactive10'),
    ];

    $form['cookie10']['cookiename10'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom informatique du cookie 10 à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs cookies à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiename10'),
    ];

    $form['cookie10']['cookiefct10'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Nom de la fonction d\'un script à bloquer :'),
      '#description' => $this->t('Chaque nom doit être espacé avec un simple espace si plusieurs scripts à bloquer.'),
      '#rows' => 1,
      '#default_value' => $config->get('cookiefct10'),
    ];

    $form['cookie10']['cookiecheck10'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Obligatoire'),
      '#description' => $this->t('La case doit être cochée quand le cookie 10 est obligatoire.'),
      '#default_value' => $config->get('cookiecheck10'),
    ];
    
    $form['cookie10']['cookietitle10'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre pour le cookie 10 :'),
      '#description' => $this->t('Titre du cookie en position 10.'),
      '#default_value' => $config->get('cookietitle10'),
    ];
    
    $form['cookie10']['cookiedescription10'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description pour le cookie 10 :'),
      '#description' => $this->t('Description du cookie en position 10.'),
      '#rows' => 5,
      '#default_value' => $config->get('cookiedescription10'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $date = new DrupalDateTime();
    $current_timestamp = $date->getTimestamp();

    $this->config('cookiebanner.settings')
      ->set('openclosebutton', $form_state->getValue('openclosebutton'))
      ->set('informationtitle', $form_state->getValue('informationtitle'))
      ->set('information', $form_state->getValue('information'))
      ->set('title', $form_state->getValue('title'))
      ->set('cookieactive1', $form_state->getValue('cookieactive1'))
      ->set('cookiename1', $form_state->getValue('cookiename1'))
      ->set('cookiefct1', $form_state->getValue('cookiefct1'))
      ->set('cookiecheck1', $form_state->getValue('cookiecheck1'))
      ->set('cookietitle1', $form_state->getValue('cookietitle1'))
      ->set('cookiedescription1', $form_state->getValue('cookiedescription1'))
      ->set('cookieactive2', $form_state->getValue('cookieactive2'))
      ->set('cookiename2', $form_state->getValue('cookiename2'))
      ->set('cookiefct2', $form_state->getValue('cookiefct2'))
      ->set('cookiecheck2', $form_state->getValue('cookiecheck2'))
      ->set('cookietitle2', $form_state->getValue('cookietitle2'))
      ->set('cookiedescription2', $form_state->getValue('cookiedescription2'))
      ->set('cookieactive3', $form_state->getValue('cookieactive3'))
      ->set('cookiename3', $form_state->getValue('cookiename3'))
      ->set('cookiefct3', $form_state->getValue('cookiefct3'))
      ->set('cookiecheck3', $form_state->getValue('cookiecheck3'))
      ->set('cookietitle3', $form_state->getValue('cookietitle3'))
      ->set('cookiedescription3', $form_state->getValue('cookiedescription3'))
      ->set('cookieactive4', $form_state->getValue('cookieactive4'))
      ->set('cookiename4', $form_state->getValue('cookiename4'))
      ->set('cookiefct4', $form_state->getValue('cookiefct4'))
      ->set('cookiecheck4', $form_state->getValue('cookiecheck4'))
      ->set('cookietitle4', $form_state->getValue('cookietitle4'))
      ->set('cookiedescription4', $form_state->getValue('cookiedescription4'))
      ->set('cookieactive5', $form_state->getValue('cookieactive5'))
      ->set('cookiename5', $form_state->getValue('cookiename5'))
      ->set('cookiefct5', $form_state->getValue('cookiefct5'))
      ->set('cookiecheck5', $form_state->getValue('cookiecheck5'))
      ->set('cookietitle5', $form_state->getValue('cookietitle5'))
      ->set('cookiedescription5', $form_state->getValue('cookiedescription5'))
      ->set('cookieactive6', $form_state->getValue('cookieactive6'))
      ->set('cookiename6', $form_state->getValue('cookiename6'))
      ->set('cookiefct6', $form_state->getValue('cookiefct6'))
      ->set('cookiecheck6', $form_state->getValue('cookiecheck6'))
      ->set('cookietitle6', $form_state->getValue('cookietitle6'))
      ->set('cookiedescription6', $form_state->getValue('cookiedescription6'))
      ->set('cookieactive7', $form_state->getValue('cookieactive7'))
      ->set('cookiename7', $form_state->getValue('cookiename7'))
      ->set('cookiefct7', $form_state->getValue('cookiefct7'))
      ->set('cookiecheck7', $form_state->getValue('cookiecheck7'))
      ->set('cookietitle7', $form_state->getValue('cookietitle7'))
      ->set('cookiedescription7', $form_state->getValue('cookiedescription7'))
      ->set('cookieactive8', $form_state->getValue('cookieactive8'))
      ->set('cookiename8', $form_state->getValue('cookiename8'))
      ->set('cookiefct8', $form_state->getValue('cookiefct8'))
      ->set('cookiecheck8', $form_state->getValue('cookiecheck8'))
      ->set('cookietitle8', $form_state->getValue('cookietitle8'))
      ->set('cookiedescription8', $form_state->getValue('cookiedescription8'))
      ->set('cookieactive9', $form_state->getValue('cookieactive9'))
      ->set('cookiename9', $form_state->getValue('cookiename9'))
      ->set('cookiefct9', $form_state->getValue('cookiefct9'))
      ->set('cookiecheck9', $form_state->getValue('cookiecheck9'))
      ->set('cookietitle9', $form_state->getValue('cookietitle9'))
      ->set('cookiedescription9', $form_state->getValue('cookiedescription9'))
      ->set('cookieactive10', $form_state->getValue('cookieactive10'))
      ->set('cookiename10', $form_state->getValue('cookiename10'))
      ->set('cookiefct10', $form_state->getValue('cookiefct10'))
      ->set('cookiecheck10', $form_state->getValue('cookiecheck10'))
      ->set('cookietitle10', $form_state->getValue('cookietitle10'))
      ->set('cookiedescription10', $form_state->getValue('cookiedescription10'))
      ->set('current_timestamp', $current_timestamp)
      ->save();
  }

}
