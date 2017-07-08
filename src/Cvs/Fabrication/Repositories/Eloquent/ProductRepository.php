<?php

namespace Cvs\Fabrication\Repositories\Eloquent;

use Cvs\Fabrication\Interfaces\ProductRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('cvs.fabrication.product.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('cvs.fabrication.product.model');
    }
}
