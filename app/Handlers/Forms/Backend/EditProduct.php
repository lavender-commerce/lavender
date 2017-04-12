<?php
namespace App\Handlers\Forms\Backend;

use App\Support\Facades\Message;
use Lavender\Contracts\Form;

class EditProduct
{

    /**
     * @param Form $form
     */
    public function handle_product(Form $form)
    {
        $request = $form->request->all();

        $product = $request->product;
        $category = $request->category;

        $product->fill($request);

        $product->save();

        $product->update(['categories' => ['category' => $request['category']]]);

        Message::addSuccess(sprintf(
            "Product \"%s\" was saved successfully.",
            $product->id
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