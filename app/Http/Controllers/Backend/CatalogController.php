<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controller\Backend;

class CatalogController extends Backend
{

	public function getIndex()
	{
        $this->loadLayout();

        return view('backend.catalog');
	}

}