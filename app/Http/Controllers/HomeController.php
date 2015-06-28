<?php
namespace App\Http\Controllers;

use App\Http\Controller\Frontend;

class HomeController extends Frontend
{
	public function __construct()
	{
        $this->loadLayout();
	}

	public function index()
	{
		return view('page.home');
	}

}
