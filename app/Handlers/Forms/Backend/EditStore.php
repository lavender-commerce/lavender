<?php
namespace App\Handlers\Forms\Backend;

use App\Support\Facades\Message;
use Lavender\Contracts\Form;

class EditStore
{

    /**
     * @param Form $form
     */
    public function handle_store(Form $form)
    {
        $request = $form->request->all();

        $model = $form->store;

        $model->fill($request, false);

        $model->save();

        $model->update([
            'theme'         => ['theme' => (int)$request['theme']],
            'root_category' => ['category' => (int)$request['root_category']],
        ]);

        Message::addSuccess(sprintf(
            "Store \"%s\" was saved successfully.",
            $model->id
        ));
    }


}