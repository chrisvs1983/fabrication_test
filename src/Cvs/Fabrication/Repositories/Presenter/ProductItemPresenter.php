<?php

namespace Cvs\Fabrication\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class ProductItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductItemTransformer();
    }
}