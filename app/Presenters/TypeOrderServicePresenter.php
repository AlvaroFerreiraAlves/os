<?php

namespace App\Presenters;

use App\Transformers\TypeOrderServiceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TypeOrderServicePresenter
 *
 * @package namespace App\Presenters;
 */
class TypeOrderServicePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TypeOrderServiceTransformer();
    }
}
