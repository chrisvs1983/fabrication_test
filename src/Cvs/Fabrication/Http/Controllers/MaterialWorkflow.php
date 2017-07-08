<?php

namespace Cvs\Fabrication\Http\Controllers;
use Litepie\Fabrication\Http\Requests\MaterialRequest;
use Litepie\Fabrication\Models\Material;

trait MaterialWorkflow {
	
    /**
     * Workflow controller function for material.
     *
     * @param Model   $material
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(MaterialRequest $request, Material $material, $step)
    {

        try {

            $material->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('fabrication::material.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/material/material/' . $material->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/material/material/' . $material->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for material.
     *
     * @param Model   $material
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(Material $material, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $material->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('fabrication::material.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('fabrication::admin.material.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('fabrication::admin.material.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('fabrication::admin.material.message', $data)->render();

        }

    }
}