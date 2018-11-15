<?php

/**
*	@file
*	Contents \Drupal\message_time\Form\MessageTimeSettingsForm
*/

namespace Drupal\message_time\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
*	Class MessageTimeSettingsForm
*	@package Drupal\message_time\Form
*/
class MessageTimeSettingsForm extends ConfigFormBase {

	/**
	*	{@inheritdoc}
	*/
	public function getFormId() {
		return 'message_time_settings_form';
	}

	/**
	*	{@inheritdoc}
	*/
	protected function getEditableConfigNames() {
		return ['message_time.settings'];
	}

	/**
	*	{@inheritdoc}
	*/
	public function buildForm(array $form, FormStateInterface $form_state) {
		$settings = $this->config('message_time.settings');

		// General message time form settings.
		$form['message_time_settings'] = array(
			'#type' => 'details',
			'#title' => $this->t('Message Time Settings'),
			'#open' => TRUE,
		);
		$form['message_time_settings']['message_time'] = array(
			'#type' => 'textfield',
			'#title' => $this->t('Message Time'),
			'#description' => $this->t('Now the message box will disappear after 10 seconds, as we hardcoded the duration (10000ms = 10 sec)<br> Help: http://www.faichi.com/blog/what-are-drupal-behaviors'),
			'#default_value' => $settings->get('message_time'),
		);

		return parent::buildForm($form, $form_state);
	}

	/**
	*	{@inheritdoc}
	*/
	public function validateForm(array &$form, FormStateInterface $form_state) {
		
	}

	/**
	*	{@inheritdoc}
	*/
	public function submitForm(array &$form, FormStateInterface $form_state) {
		$this->config('message_time.settings')
			->set('message_time', $form_state->getValue('message_time'))
			->save();
			drupal_set_message('Save message time','status');
	}
}