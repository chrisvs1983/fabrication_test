<?php

namespace Cvs\Fabrication\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class ProductListTransformer extends TransformerAbstract
{
    public function transform(\Cvs\Fabrication\Models\Product $product)
    {
        return [
            'id'                => $product->getRouteKey(),
            'Name'              => $product->Name,
            'status'            => trans('app.'.$product->status),
            'created_at'        => format_date($product->created_at),
            'updated_at'        => format_date($product->updated_at),
        ];
    }
}