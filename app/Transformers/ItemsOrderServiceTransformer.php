<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ItemsOrderService;

/**
 * Class ItemsOrderServiceTransformer
 * @package namespace App\Transformers;
 */
class ItemsOrderServiceTransformer extends TransformerAbstract
{

    /**
     * Transform the \ItemsOrderService entity
     * @param \ItemsOrderService $model
     *
     * @return array
     */
    public function transform(ItemsOrderService $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
