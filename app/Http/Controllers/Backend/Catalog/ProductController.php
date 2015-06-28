<?php
namespace App\Http\Controllers\Backend\Catalog;

use App\Http\Controller\BackendEntity;
use Lavender\Contracts\Entity;
use Lavender\Http\FormRequest;

class ProductController extends BackendEntity
{
	public function getEdit($id)
    {
        if($model = $this->validateEntity('product', $id)){

            $this->loadLayout();

            $tabs[] = [
                'label' => "General",
                'content' => form('edit_product', ['entity' => $model])
            ];

            if($model->exists){

                $tabs[] = [
                    'label'   => "Categories",
                    'content' => form('edit_product_categories', ['entity' => $model])
                ];

            }
            return view('backend.tabs')
                ->with('title', $model->getEntityName())
                ->with('tabs', $tabs);
        }

        return redirect('backend');
    }

	public function getIndex()
	{
        if($model = $this->validateEntity('product')){

            $columns =  [
                'Id'            => 'id',
                'Product Name'  => 'name',
                'Product Sku'   => 'sku',
                'Last Updated'  => 'updated_at'
            ];

            $this->loadLayout();

            $new_button = url('backend/product/edit/new');

            compose_section(
                'backend.grid',
                'new_button',
                "<button onclick=\"window.location='{$new_button}';\">Add new product</button>"
            );

            compose_section(
                'backend.grid',
                'mass_actions',
                "<select><option>Action</option></select>"
            );

            return view('backend.grid')
                ->with('title',    'Product')
                ->with('edit_url', 'backend/product/edit')
                ->with('rows',      $model->all($columns))
                ->with('headers',   $this->tableHeaders($model, $columns));
        }

        return redirect('backend');
	}


    /**
     * Update a product model
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEdit(FormRequest $request, $id)
    {
        if($model = $this->validateEntity('product', $id)){

            $new = !$model->exists;

            form('edit_product', ['entity' => $model])->handle($request);

            if($new && $model->exists) return redirect()->to('backend/product/edit/'.$model->id);

        }

        return redirect()->back();
    }


    /**
     * Update product categories
     *
     * @param  FormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function postCategories(FormRequest $request, $id)
    {
        if($model = $this->validateEntity('product', $id)){

            form('edit_product_categories', ['entity' => $model])->handle($request);

        }

        return redirect()->back();
    }

}