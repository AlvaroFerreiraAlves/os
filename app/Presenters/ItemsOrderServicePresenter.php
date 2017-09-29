<?php

namespace App\Presenters;

use App\Transformers\ItemsOrderServiceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ItemsOrderServicePresenter
 *
 * @package namespace App\Presenters;
 */
class ItemsOrderServicePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ItemsOrderServiceTransformer();
    }
}
