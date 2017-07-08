<?php

namespace Cvs\Fabrication\Http\Controllers;
use Litepie\Fabrication\Http\Requests\ProductRequest;
use Litepie\Fabrication\Models\Product;

trait ProductWorkflow {
	
    /**
     * Workflow controller function for product.
     *
     * @param Model   $product
     * @param step    next step for the workflow.
     *
     * @return Response
     */

    public function putWorkflow(ProductRequest $request, Product $product, $step)
    {

        try {

            $product->updateWorkflow($step);

            return response()->json([
                'message'  => trans('messages.success.changed', ['Module' => trans('fabrication::product.name'), 'status' => trans("app.{$step}")]),
                'code'     => 204,
                'redirect' => trans_url('/admin/product/product/' . $product->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/product/product/' . $product->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Workflow controller function for product.
     *
     * @param Model   $product
     * @param step    next step for the workflow.
     * @param user    encrypted user id.
     *
     * @return Response
    */

    public function getWorkflow(Product $product, $step, $user)
    {
        try {
            $user_id = decrypt($user);

            Auth::onceUsingId($user_id);

            $product->updateWorkflow($step);

            $data = [
                'message' => trans('messages.success.changed', ['Module' => trans('fabrication::product.name'), 'status' => trans("app.{$step}")]),
                'status'  => 'success',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('fabrication::admin.product.message', $data)->render();

        } catch (ValidationException $e) {

            $data = [
                'message' => '<b>' . $e->getMessage() . '</b> <br /><br />' . implode('<br />', $e->validator->errors()->all()),
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('fabrication::admin.product.message', $data)->render();

        } catch (Exception $e) {

            $data = [
                'message' => '<b>' . $e->getMessage(). '</b>',
                'status'  => 'error',
                'step'    => trans("app.{$step}"),
            ];

            return $this->theme->layout('blank')->of('fabrication::admin.product.message', $data)->render();

        }

    }
}