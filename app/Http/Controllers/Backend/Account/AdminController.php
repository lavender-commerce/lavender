<?php
namespace App\Http\Controllers\Backend\Account;

use App\Http\Controller\BackendEntity;

class AdminController extends BackendEntity
{

	public function getIndex()
	{
        if($model = $this->validateEntity('admin')){

            $columns =  [
                'Admin Id'       => 'id',
                'Admin Email'    => 'email',
            ];

            $this->loadLayout();

            return view('backend.grid')
                ->with('title',    'Administrators')
                ->with('rows',      $model->all($columns))
                ->with('headers',   $this->tableHeaders($model, $columns));
        }

        return redirect('backend');
	}

}