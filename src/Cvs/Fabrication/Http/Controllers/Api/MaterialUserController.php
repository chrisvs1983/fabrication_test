<?php

namespace Cvs\Fabrication\Http\Controllers\Api;

use App\Http\Controllers\Api\UserController as BaseController;
use Cvs\Fabrication\Http\Requests\MaterialRequest;
use Cvs\Fabrication\Interfaces\MaterialRepositoryInterface;
use Cvs\Fabrication\Models\Material;

/**
 * User API controller class.
 */
class MaterialUserController extends BaseController
{
    /**
     * Initialize material controller.
     *
     * @param type MaterialRepositoryInterface $material
     *
     * @return type
     */
    public function __construct(MaterialRepositoryInterface $material)
    {
        $this->repository = $material;
        $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->pushCriteria(new \Cvs\Fabrication\Repositories\Criteria\MaterialUserCriteria());
        parent::__construct();
    }

    /**
     * Display a list of material.
     *
     * @return json
     */
    public function index(MaterialRequest $request)
    {
        $materials  = $this->repository
            ->setPresenter('\\Cvs\\Fabrication\\Repositories\\Presenter\\MaterialListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->all();
        $materials['code'] = 2000;
        return response()->json($materials) 
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display material.
     *
     * @param Request $request
     * @param Model   Material
     *
     * @return Json
     */
    public function show(MaterialRequest $request, Material $material)
    {

        if ($material->exists) {
            $material         = $material->presenter();
            $material['code'] = 2001;
            return response()->json($material)
                ->setStatusCode(200, 'SHOW_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new material.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(MaterialRequest $request, Material $material)
    {
        $material         = $material->presenter();
        $material['code'] = 2002;
        return response()->json($material)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new material.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(MaterialRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.api');
            $material          = $this->repository->create($attributes);
            $material          = $material->presenter();
            $material['code']  = 2004;

            return response()->json($material)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show material for editing.
     *
     * @param Request $request
     * @param Model   $material
     *
     * @return json
     */
    public function edit(MaterialRequest $request, Material $material)
    {
        if ($material->exists) {
            $material         = $material->presenter();
            $material['code'] = 2003;
            return response()-> json($material)
                ->setStatusCode(200, 'EDIT_SUCCESS');;
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }
    }

    /**
     * Update the material.
     *
     * @param Request $request
     * @param Model   $material
     *
     * @return json
     */
    public function update(MaterialRequest $request, Material $material)
    {
        try {

            $attributes = $request->all();

            $material->update($attributes);
            $material         = $material->presenter();
            $material['code'] = 2005;

            return response()->json($material)
                ->setStatusCode(201, 'UPDATE_SUCCESS');


        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the material.
     *
     * @param Request $request
     * @param Model   $material
     *
     * @return json
     */
    public function destroy(MaterialRequest $request, Material $material)
    {

        try {

            $t = $material->delete();

            return response()->json([
                'message'  => trans('messages.success.delete', ['Module' => trans('fabrication::material.name')]),
                'code'     => 2006
            ])->setStatusCode(202, 'DESTROY_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 4006,
            ])->setStatusCode(400, 'DESTROY_ERROR');
        }
    }
}
