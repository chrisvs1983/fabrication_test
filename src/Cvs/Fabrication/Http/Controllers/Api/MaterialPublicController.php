<?php

namespace Cvs\Fabrication\Http\Controllers\Api;

use App\Http\Controllers\Api\PublicController as BaseController;
use Cvs\Fabrication\Interfaces\MaterialRepositoryInterface;
use Cvs\Fabrication\Repositories\Presenter\MaterialItemTransformer;

/**
 * Pubic API controller class.
 */
class MaterialPublicController extends BaseController
{
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
            ->setPresenter('\\Cvs\\Fabrication\\Repositories\\Presenter\\MaterialListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $materials['code'] = 2000;
        return response()->json($materials)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $material = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($material)) {
            $material         = $this->itemPresenter($module, new MaterialItemTransformer);
            $material['code'] = 2001;
            return response()->json($material)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
