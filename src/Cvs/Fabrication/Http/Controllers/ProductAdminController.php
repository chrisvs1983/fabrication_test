<?php

namespace Cvs\Fabrication\Http\Controllers;

use App\Http\Controllers\AdminController as BaseController;
use Form;
use Cvs\Fabrication\Http\Requests\ProductRequest;
use Cvs\Fabrication\Interfaces\ProductRepositoryInterface;
use Cvs\Fabrication\Models\Product;

/**
 * Admin web controller class.
 */
class ProductAdminController extends BaseController
{
    // use ProductWorkflow;
    /**
     * Initialize product controller.
     *
     * @param type ProductRepositoryInterface $product
     *
     * @return type
     */
    public function __construct(ProductRepositoryInterface $product)
    {
        $this->repository = $product;
        parent::__construct();
    }

    /**
     * Display a list of product.
     *
     * @return Response
     */
    public function index(ProductRequest $request)
    {
        if ($request->wantsJson()) {
            return $this->getJson($request);
        }
        $this   ->theme->prependTitle(trans('fabrication::product.names').' :: ');
        return $this->theme->of('fabrication::admin.product.index')->render();
    }

    /**
     * Display a list of product.
     *
     * @return Response
     */
    public function getJson(ProductRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        $products  = $this->repository
                ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
                ->setPresenter('\\Cvs\\Fabrication\\Repositories\\Presenter\\ProductListPresenter')
                ->scopeQuery(function($query){
                    return $query->orderBy('id','DESC');
                })->paginate($pageLimit);
        $products['recordsTotal']    = $products['meta']['pagination']['total'];
        $products['recordsFiltered'] = $products['meta']['pagination']['total'];
        $products['request']         = $request->all();
        return response()->json($products, 200);

    }

    /**
     * Display product.
     *
     * @param Request $request
     * @param Model   $product
     *
     * @return Response
     */
    public function show(ProductRequest $request, Product $product)
    {
        if (!$product->exists) {
            return response()->view('fabrication::admin.product.new', compact('product'));
        }

        Form::populate($product);
        return response()->view('fabrication::admin.product.show', compact('product'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ProductRequest $request)
    {

        $product = $this->repository->newInstance([]);

        Form::populate($product);

        return response()->view('fabrication::admin.product.create', compact('product'));

    }

    /**
     * Create new product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $product          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('fabrication::product.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/fabrication/product/'.$product->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show product for editing.
     *
     * @param Request $request
     * @param Model   $product
     *
     * @return Response
     */
    public function edit(ProductRequest $request, Product $product)
    {
        Form::populate($product);
        return  response()->view('fabrication::admin.product.edit', compact('product'));
    }

    /**
     * Update the product.
     *
     * @param Request $request
     * @param Model   $product
     *
     * @return Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {

            $attributes = $request->all();

            $product->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('fabrication::product.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/fabrication/product/'.$product->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/fabrication/product/'.$product->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the product.
     *
     * @param Model   $product
     *
     * @return Response
     */
    public function destroy(ProductRequest $request, Product $product)
    {

        try {

            $t = $product->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('fabrication::product.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/fabrication/product/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/fabrication/product/'.$product->getRouteKey()),
            ], 400);
        }
    }

}
