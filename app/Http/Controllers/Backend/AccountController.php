<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controller\Backend;

class AccountController extends Backend
{

	public function getIndex()
	{
        $this->loadLayout();

        return view('backend.account');
	}

}