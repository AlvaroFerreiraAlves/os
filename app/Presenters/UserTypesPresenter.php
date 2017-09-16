<?php

namespace App\Presenters;

use App\Transformers\UserTypesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserTypesPresenter
 *
 * @package namespace App\Presenters;
 */
class UserTypesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserTypesTransformer();
    }
}
