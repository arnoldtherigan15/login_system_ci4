<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'NetflixFake | Welcome to Portal'
		];
		return view('pages/welcome', $data);
	}

	//--------------------------------------------------------------------

}
