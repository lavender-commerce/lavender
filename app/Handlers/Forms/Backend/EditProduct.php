<?php
namespace App\Handlers\Forms\Backend;

use App\Support\Facades\Message;
use Lavender\Contracts\Form;

class EditProduct extends EditEntity
{

    /**
     * @param Form $form
     */
    public function handle_product(Form $form)
    {
        $entity = $this->handle_entity($form, 'product');

        Message::addSuccess(sprintf(
            "Product \"%s\" was saved successfully.",
            $entity->id
        ));
    }

    /**
     * @param Form $form
     */
    public function handle_categories(Form $form)
    {
        $request = $form->request->all();

        $product = $form->product;

        //todo fix detach / update (doesn't work sequentially without cloning entity)
        $cloned = clone $product;
        $cloned->categories()->detach();

        $product->update(['categories' => ['category' => $request['category']]]);

        Message::addSuccess(sprintf(
            "Product \"%s\" was updated.",
            $product->name
        ));
    }

}