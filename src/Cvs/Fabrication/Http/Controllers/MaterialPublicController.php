<?php

namespace Cvs\Fabrication\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Cvs\Fabrication\Interfaces\MaterialRepositoryInterface;

class MaterialPublicController extends BaseController
{
    // use MaterialWorkflow;

    /**
     * Constructor.
     *
     * @param type \Cvs\Material\Interfaces\MaterialRepositoryInterface $material
     *
     * @return type
     */
    public function __construct(MaterialRepositoryInterface $material)
    {
        $this->repository = $material;
        parent::__construct();
    }

    /**
     * Show material's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $materials = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('fabrication::public.material.index', compact('materials'))->render();
    }

    /**
     * Show material.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $material = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('fabrication::public.material.show', compact('material'))->render();
    }

}
