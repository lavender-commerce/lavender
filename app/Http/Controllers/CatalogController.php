<?php
namespace App\Http\Controllers;

use App\Http\Controller\Frontend;
use Lavender\Support\Facades\Form;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CatalogController extends Frontend
{

	public function __construct()
	{
        $this->loadLayout();
	}

	public function getCategory($url_key)
	{
        $category = entity('category')
            ->findByAttribute('url', $url_key);

        if($category){

            $products = $category->products()
                ->paginate(config('store.product_count'));

            return view('catalog.category.view')
                ->withCategory($category)
                ->withProducts($products);

        }

        throw new HttpException(404, 'Category not found.');
	}

    public function getProduct($url_key)
    {
        $product = entity('product')
            ->findByAttribute('url', $url_key);

        if($product){

            return view('catalog.product.view')
                ->withProduct($product);

        }

        throw new HttpException(404, 'Product not found.');
    }

}
