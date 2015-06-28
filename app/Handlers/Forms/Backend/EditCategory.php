<?php
namespace App\Handlers\Forms\Backend;

use App\Support\Facades\Message;
use Lavender\Contracts\Form;

class EditCategory
{

    /**
     * @param Form $form
     */
    public function handle_category(Form $form)
    {
        $request = $form->request->all();

        $category = $form->category;

        $new = !$category->exists;

        $parent = reset($request['category']);

        $request['parent'] = ['category' => $parent];

        unset($request['category']);

        $category->fill($request);

        $category->save();

        Message::addSuccess(sprintf(
            "Category \"%s\" was %s.",
            $category->name,
            $new ? 'created' : 'updated'
        ));
    }

}