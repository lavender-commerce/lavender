<?php
namespace App\Form;

use App\Support\Facades\Message;
use Lavender\Contracts\Form;
use Lavender\Form\Kernel as FormKernel;

class Kernel extends FormKernel
{
    protected $template = 'layouts.partials.form';


    protected $fields = [

        'label'     => 'App\Html\Form\Html',
        'error'     => 'App\Html\Form\Html',
        'comment'   => 'App\Html\Form\Html',
        'button'    => 'App\Html\Form\Html',
        'tree'      => 'App\Html\Form\Tree',

        'checkbox'  => 'App\Html\Form\Input',
        'radio'     => 'App\Html\Form\Input',
        'file'      => 'App\Html\Form\Input',
        'image'     => 'App\Html\Form\Input',
        'text'      => 'App\Html\Form\Input',
        'hidden'    => 'App\Html\Form\Input',
        'email'     => 'App\Html\Form\Input',
        'url'       => 'App\Html\Form\Input',
        'number'    => 'App\Html\Form\Input',
        'password'  => 'App\Html\Form\Input',
        'textarea'  => 'App\Html\Form\Input',
        'submit'    => 'App\Html\Form\Input',
        'reset'     => 'App\Html\Form\Input',

        'select'    => 'App\Html\Form\Select@dropdown',
        'list'      => 'App\Html\Form\ListType@multiple',
        'radiolist' => 'App\Html\Form\ListType@single',

    ];

    protected $resources = [

        'yesno'             => 'App\Resources\YesNo',
        'themes'            => 'App\Resources\Themes',
        'root_categories'   => 'App\Resources\RootCategories',
        'category_tree'     => 'App\Resources\CategoryTree',
        'category_children' => 'App\Resources\CategoryTree@toChildren',
        'shipment_methods'  => 'App\Resources\ShipmentMethods',
        'payment_methods'   => 'App\Resources\PaymentMethods',

    ];


    public function register()
    {
        try{

            parent::register();

        } catch(\Exception $e){

            Message::addError($e->getMessage());

        }
    }

}