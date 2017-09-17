<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ServiceOrderService;

/**
 * Class ServiceOrderServiceTransformer
 * @package namespace App\Transformers;
 */
class ServiceOrderServiceTransformer extends TransformerAbstract
{

    /**
     * Transform the \ServiceOrderService entity
     * @param \ServiceOrderService $model
     *
     * @return array
     */
    public function transform(ServiceOrderService $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
