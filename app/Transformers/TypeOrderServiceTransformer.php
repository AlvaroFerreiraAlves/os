<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\TypeOrderService;

/**
 * Class TypeOrderServiceTransformer
 * @package namespace App\Transformers;
 */
class TypeOrderServiceTransformer extends TransformerAbstract
{

    /**
     * Transform the \TypeOrderService entity
     * @param \TypeOrderService $model
     *
     * @return array
     */
    public function transform(TypeOrderService $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
