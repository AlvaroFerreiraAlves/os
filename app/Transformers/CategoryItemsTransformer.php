<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\CategoryItems;

/**
 * Class CategoryItemsTransformer
 * @package namespace App\Transformers;
 */
class CategoryItemsTransformer extends TransformerAbstract
{

    /**
     * Transform the \CategoryItems entity
     * @param \CategoryItems $model
     *
     * @return array
     */
    public function transform(CategoryItems $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
