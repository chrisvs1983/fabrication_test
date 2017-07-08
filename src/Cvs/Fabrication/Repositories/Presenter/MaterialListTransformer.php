<?php

namespace Cvs\Fabrication\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class MaterialListTransformer extends TransformerAbstract
{
    public function transform(\Cvs\Fabrication\Models\Material $material)
    {
        return [
            'id'                => $material->getRouteKey(),
            'name'              => $material->name,
            'cost'              => $material->cost,
            'url'               => $material->url,
            'status'            => trans('app.'.$material->status),
            'created_at'        => format_date($material->created_at),
            'updated_at'        => format_date($material->updated_at),
        ];
    }
}