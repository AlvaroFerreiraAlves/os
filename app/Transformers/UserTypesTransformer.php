<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\UserTypes;

/**
 * Class UserTypesTransformer
 * @package namespace App\Transformers;
 */
class UserTypesTransformer extends TransformerAbstract
{

    /**
     * Transform the \UserTypes entity
     * @param \UserTypes $model
     *
     * @return array
     */
    public function transform(UserTypes $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
