<?php

namespace App\Presenters;

use App\Transformers\ServiceOrderServiceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServiceOrderServicePresenter
 *
 * @package namespace App\Presenters;
 */
class ServiceOrderServicePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceOrderServiceTransformer();
    }
}
