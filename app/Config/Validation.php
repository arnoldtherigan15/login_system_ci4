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
				'required' => 'Password is required',
				'min_length' => 'Password is to short'
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

	public $login = [
		'email'    => [
			'rules'  => 'required|valid_email',
			'errors' => [
				'required' => 'Email is required',
				'valid_email' => 'Please check the Email field. It does not appear to be valid'
			]
		],
		'password' => [
			'rules'  => 'required',
			'errors' => [
				'required' => 'Password is required'
			]
		]
	];

	public $movie = [
		'title'    => [
			'rules'  => 'required',
			'errors' => [
				'required' => 'Title is required'
			]
		],
		'year'    => [
			'rules'  => 'required',
			'errors' => [
				'required' => 'Year is required'
			]
		],
		'genre'    => [
			'rules'  => 'required',
			'errors' => [
				'required' => 'Genre is required'
			]
		],
		'rating'    => [
			'rules'  => 'required',
			'errors' => [
				'required' => 'Rating is required'
			]
		],
		'description'    => [
			'rules'  => 'required',
			'errors' => [
				'required' => 'Description is required'
			]
		],
		'poster'    => [
			'rules' => 'max_size[poster,1024]|is_image[poster]',
			'errors' => [
				'max_size' => 'too large file size',
				'is_image' => 'file is not an image',
			]
		],
	];
}
