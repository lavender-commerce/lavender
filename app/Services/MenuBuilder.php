<?php namespace App\Services;

use Lavender\Support\ContentHierarchy;

class MenuBuilder extends ContentHierarchy
{
    protected $layout = 'layouts.partials.menu';


    public function view()
    {
        return view($this->layout);
    }

    public function prepare($data)
    {
        $item = new \stdClass();

        $data = recursive_merge([
            'href' => null,
            'text' => null,
            'children' => [],
        ], $data);

        foreach($data as $key => $value){

            if($key == 'children' && $value){

                foreach($value as $index => $child){

                    $value[$index] = $this->prepare($child);

                }

            }

            $item->$key = $value;

        }

        return $item;
    }
}
