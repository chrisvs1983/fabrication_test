<?php

namespace Cvs\Fabrication\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Cvs\Fabrication\Http\Requests\MaterialRequest;
use Cvs\Fabrication\Interfaces\MaterialRepositoryInterface;
use Cvs\Fabrication\Models\Material;

/**
 * Admin web controller class.
 */
class MaterialAdminController extends BaseController
{
    // use MaterialWorkflow;
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
        parent::__construct();
    }

    /**
     * Display a list of material.
     *
     * @return Response
     */
    public function index(MaterialRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('fabrication::material.names').' :: ');
        return $this->theme->of('fabrication::admin.material.index')->render();
    }

    /**
     * Display a list of material.
     *
     * @return Response
     */
    public function getJson(MaterialRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $materials  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Cvs\\Fabrication\\Repositories\\Presenter\\MaterialListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $materials['recordsTotal']    = $materials['meta']['pagination']['total'];
        $materials['recordsFiltered'] = $materials['meta']['pagination']['total'];
        $materials['request']         = $request->all();
        return response()->json($materials, 200);

    }

    /**
     * Display material.
     *
     * @param Request $request
     * @param Model   $material
     *
     * @return Response
     */
    public function show(MaterialRequest $request, Material $material)
    {
        if (!$material->exists) {
            return response()->view('fabrication::admin.material.new', compact('material'));
        }

        Form::populate($material);
        return response()->view('fabrication::admin.material.show', compact('material'));
    }

    /**
     * Show the form for creating a new material.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(MaterialRequest $request)
    {

        $material = $this->repository->newInstance([]);

        Form::populate($material);

        return response()->view('fabrication::admin.material.create', compact('material'));

    }

    /**
     * Create new material.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(MaterialRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $material          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('fabrication::material.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/fabrication/material/'.$material->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show material for editing.
     *
     * @param Request $request
     * @param Model   $material
     *
     * @return Response
     */
    public function edit(MaterialRequest $request, Material $material)
    {
        Form::populate($material);
        return  response()->view('fabrication::admin.material.edit', compact('material'));
    }

    /**
     * Update the material.
     *
     * @param Request $request
     * @param Model   $material
     *
     * @return Response
     */
    public function update(MaterialRequest $request, Material $material)
    {
        try {

            $attributes = $request->all();

            $material->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('fabrication::material.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/fabrication/material/'.$material->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/fabrication/material/'.$material->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the material.
     *
     * @param Model   $material
     *
     * @return Response
     */
    public function destroy(MaterialRequest $request, Material $material)
    {

        try {

            $t = $material->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('fabrication::material.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/fabrication/material/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/fabrication/material/'.$material->getRouteKey()),
            ], 400);
        }
    }

}
