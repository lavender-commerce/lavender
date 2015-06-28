<?php
namespace App\Http\Controllers\Backend\Account;

use App\Http\Controller\BackendEntity;

class CustomerController extends BackendEntity
{

	public function getIndex()
	{
        if($model = $this->validateEntity('customer')){

            $columns =  [
                'Customer Id'       => 'id',
                'Customer Email'    => 'email',
                'Confirmed'         => 'confirmed',
                'Join Date'         => 'created_at'
            ];

            $this->loadLayout();

            return view('backend.grid')
                ->with('title',    'Customers')
                ->with('rows',      $model->all($columns))
                ->with('headers',   $this->tableHeaders($model, $columns));
        }

        return redirect('backend');
	}

}