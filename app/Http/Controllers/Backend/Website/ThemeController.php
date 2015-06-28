<?php
namespace App\Http\Controllers\Backend\Website;

use App\Http\Controller\BackendEntity;

class ThemeController extends BackendEntity
{

    //todo create new themes

	public function getIndex()
	{
        if($model = $this->validateEntity('theme')){

            $columns =  [
                'Id'            => 'id',
                'Theme Code'    => 'code',
                'Theme Name'    => 'name',
            ];

            $this->loadLayout();

            return view('backend.grid')
                ->with('title',    'Themes')
                ->with('rows',      $model->all($columns))
                ->with('headers',   $this->tableHeaders($model, $columns));
        }

        return redirect('backend');
	}

}