<?php

namespace Cvs\Fabrication\Http\Controllers;

use App\Http\Controllers\UserController as BaseController;
use Form;
use Cvs\Fabrication\Http\Requests\MaterialRequest;
use Cvs\Fabrication\Interfaces\MaterialRepositoryInterface;
use Cvs\Fabrication\Models\Material;

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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(MaterialRequest $request)
    {
        $materials = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('fabrication::material.names'));

        return $this->theme->of('fabrication::user.material.index', compact('materials'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Material $material
     *
     * @return Response
     */
    public function show(MaterialRequest $request, Material $material)
    {
        Form::populate($material);

        return $this->theme->of('fabrication::user.material.show', compact('material'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(MaterialRequest $request)
    {

        $material = $this->repository->newInstance([]);
        Form::populate($material);

        $this->theme->prependTitle(trans('fabrication::material.names'));
        return $this->theme->of('fabrication::user.material.create', compact('material'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(MaterialRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $material = $this->repository->create($attributes);

            return redirect(trans_url('/user/fabrication/material'))
                -> with('message', trans('messages.success.created', ['Module' => trans('fabrication::material.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Material $material
     *
     * @return Response
     */
    public function edit(MaterialRequest $request, Material $material)
    {

        Form::populate($material);
        $this->theme->prependTitle(trans('fabrication::material.names'));

        return $this->theme->of('fabrication::user.material.edit', compact('material'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Material $material
     *
     * @return Response
     */
    public function update(MaterialRequest $request, Material $material)
    {
        try {
            $this->repository->update($request->all(), $material->getRouteKey());

            return redirect(trans_url('/user/fabrication/material'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('fabrication::material.name')]))
                ->with('code', 204);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(MaterialRequest $request, Material $material)
    {
        try {
            $this->repository->delete($material->getRouteKey());
            return redirect(trans_url('/user/fabrication/material'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('fabrication::material.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
