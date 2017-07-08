<?php

namespace Cvs\Fabrication\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Cvs\Fabrication\Interfaces\ProductRepositoryInterface;

class ProductPublicController extends BaseController
{
    // use ProductWorkflow;

    /**
     * Constructor.
     *
     * @param type \Cvs\Product\Interfaces\ProductRepositoryInterface $product
     *
     * @return type
     */
    public function __construct(ProductRepositoryInterface $product)
    {
        $this->repository = $product;
        parent::__construct();
    }

    /**
     * Show product's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $products = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('fabrication::public.product.index', compact('products'))->render();
    }

    /**
     * Show product.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $product = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('fabrication::public.product.show', compact('product'))->render();
    }

}
