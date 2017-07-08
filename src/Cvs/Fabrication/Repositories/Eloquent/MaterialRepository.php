<?php

namespace Cvs\Fabrication\Repositories\Eloquent;

use Cvs\Fabrication\Interfaces\MaterialRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class MaterialRepository extends BaseRepository implements MaterialRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('cvs.fabrication.material.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('cvs.fabrication.material.model');
    }
}
