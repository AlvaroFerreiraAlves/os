<?php

namespace App\Presenters;

use App\Transformers\OrderServiceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OrderServicePresenter
 *
 * @package namespace App\Presenters;
 */
class OrderServicePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrderServiceTransformer();
    }
}
