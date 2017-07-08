<?php

namespace Cvs\Fabrication;

use User;

class Fabrication
{
    /**
     * $material object.
     */
    protected $material;
    /**
     * $product object.
     */
    protected $product;

    /**
     * Constructor.
     */
    public function __construct(\Cvs\Fabrication\Interfaces\MaterialRepositoryInterface $material,
        \Cvs\Fabrication\Interfaces\ProductRepositoryInterface $product)
    {
        $this->material = $material;
        $this->product = $product;
    }

    /**
     * Returns count of fabrication.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.material.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->material->pushCriteria(new \Litepie\Cvs\Repositories\Criteria\MaterialUserCriteria());
        }

        $material = $this->material->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('fabrication::' . $view, compact('material'))->render();
    }
    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.product.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->product->pushCriteria(new \Litepie\Cvs\Repositories\Criteria\ProductUserCriteria());
        }

        $product = $this->product->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('fabrication::' . $view, compact('product'))->render();
    }
}
