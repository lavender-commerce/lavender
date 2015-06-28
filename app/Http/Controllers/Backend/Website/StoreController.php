<?php
namespace App\Http\Controllers\Backend\Website;

use App\Http\Controller\BackendEntity;
use Illuminate\Support\Facades\Cookie;
use Lavender\Http\FormRequest;

class StoreController extends BackendEntity
{
	public function getIndex()
	{
        if($model = $this->validateEntity('store')){

            $columns =  [
                'Id'        => 'id',
                'Default'   => 'default',
            ];

            $this->loadLayout();

            $new_button = url('backend/store/edit/new');

            compose_section(
                'backend.grid',
                'new_button',
                "<button onclick=\"window.location='{$new_button}';\">Add new store</button>"
            );

            compose_section(
                'backend.grid',
                'mass_actions',
                "<select><option>Action</option></select>"
            );


            return view('backend.grid')
                ->with('title',    'Stores')
                ->with('edit_url', 'backend/store/edit')
                ->with('rows',      $model->all($columns))
                ->with('headers',   $this->tableHeaders($model, $columns));
        }

        return redirect()->back();
	}

    public function getEdit($id)
    {
        if($model = $this->validateEntity('store', $id)){

            $this->loadLayout();

            $tabs[] = [
                'label' => "General",
                'content' => form('edit_store', ['entity' => $model])
            ];

            return view('backend.tabs')
                ->with('title', $model->getEntityName())
                ->with('tabs', $tabs);
        }

        return redirect()->back();
    }

    public function getSwitch($id)
    {
        Cookie::queue('store', $id);

        return redirect()->back();
    }

    /**
     * Update a product model
     *
     * @param  FormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postEdit(FormRequest $request, $id)
    {
        if($model = $this->validateEntity('store', $id)){

            $new = !$model->exists;

            form('edit_store', ['entity' => $model])->handle($request);

            if($new && $model->exists) return redirect()->to('backend/store/edit/'.$model->id);

        }

        return redirect()->back();
    }

}