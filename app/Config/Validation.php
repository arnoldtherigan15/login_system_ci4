<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $register = [
		'first_name' => [
			'rules'  => 'required',
			'errors' => [
				'required' => 'First name is required.'
			]
		],
		'email'    => [
			'rules'  => 'required|valid_email|is_unique[users.email]',
			'errors' => [
				'required' => 'Email is required',
				'valid_email' => 'Please check the Email field. It does not appear to be valid',
				'is_unique' => 'Email is already exists'
			]
		],
		'password' => [
			'rules'  => 'required|min_length[5]',
			'errors' => [
				'required' => 'Password is required'
			]
		],
		'rePassword' => [
			'rules'  => 'required|matches[password]',
			'errors' => [
				'required' => 'First name is required',
				'matches' => 'Password not matched'
			]
		],
	];
}
