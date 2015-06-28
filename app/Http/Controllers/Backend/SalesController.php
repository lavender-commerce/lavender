<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controller\Backend;

class SalesController extends Backend
{

	public function getIndex()
	{
        $this->loadLayout();

        return view('backend.sales');
	}

}