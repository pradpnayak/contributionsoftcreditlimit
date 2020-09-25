<?php

require_once 'contributionsoftcreditlimit.civix.php';
// phpcs:disable
use CRM_Contributionsoftcreditlimit_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function contributionsoftcreditlimit_civicrm_config(&$config) {
  _contributionsoftcreditlimit_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function contributionsoftcreditlimit_civicrm_xmlMenu(&$files) {
  _contributionsoftcreditlimit_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function contributionsoftcreditlimit_civicrm_install() {
  _contributionsoftcreditlimit_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function contributionsoftcreditlimit_civicrm_postInstall() {
  _contributionsoftcreditlimit_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function contributionsoftcreditlimit_civicrm_uninstall() {
  _contributionsoftcreditlimit_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function contributionsoftcreditlimit_civicrm_enable() {
  _contributionsoftcreditlimit_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function contributionsoftcreditlimit_civicrm_disable() {
  _contributionsoftcreditlimit_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function contributionsoftcreditlimit_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _contributionsoftcreditlimit_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function contributionsoftcreditlimit_civicrm_managed(&$entities) {
  _contributionsoftcreditlimit_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function contributionsoftcreditlimit_civicrm_caseTypes(&$caseTypes) {
  _contributionsoftcreditlimit_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function contributionsoftcreditlimit_civicrm_angularModules(&$angularModules) {
  _contributionsoftcreditlimit_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function contributionsoftcreditlimit_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _contributionsoftcreditlimit_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function contributionsoftcreditlimit_civicrm_entityTypes(&$entityTypes) {
  _contributionsoftcreditlimit_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function contributionsoftcreditlimit_civicrm_themes(&$themes) {
  _contributionsoftcreditlimit_civix_civicrm_themes($themes);
}

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
function contributionsoftcreditlimit_civicrm_preProcess($formName, &$form) {
  if ($formName == 'CRM_Contribute_Form_Contribution') {
    $form->setVar('_softCreditItemCount', Civi::settings()->get('contributionsoftcredit_limit'));
  }
}

/**
 * Implements hook_civicrm_alterSettingsMetaData().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsMetaData
 *
 */
function contributionsoftcreditlimit_civicrm_alterSettingsMetaData(&$settingsMetadata, $domainID, $profile) {
  $settingsMetadata['contributionsoftcredit_limit'] = [
    'group_name' => 'CiviCRM Preferences',
    'group' => 'core',
    'name' => 'contributionsoftcredit_limit',
    'type' => 'String',
    'quick_form_type' => 'Element',
    'html_type' => 'text',
    'html_attributes' => [
      'size' => 2,
      'maxlength' => 8,
    ],
    'default' => 11,
    'title' => ts('Contribution Soft credit Limit'),
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => ts(''),
    'help_text' => NULL,
  ];
}
