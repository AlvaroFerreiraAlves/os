<?php

namespace App\Presenters;

use App\Transformers\CategoryItemsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoryItemsPresenter
 *
 * @package namespace App\Presenters;
 */
class CategoryItemsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoryItemsTransformer();
    }
}
