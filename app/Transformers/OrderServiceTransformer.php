<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\OrderService;

/**
 * Class OrderServiceTransformer
 * @package namespace App\Transformers;
 */
class OrderServiceTransformer extends TransformerAbstract
{

    /**
     * Transform the \OrderService entity
     * @param \OrderService $model
     *
     * @return array
     */
    public function transform(OrderService $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
