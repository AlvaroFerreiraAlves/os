<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ItemsOrderServiceRepository;
use App\Entities\ItemsOrderService;
use App\Validators\ItemsOrderServiceValidator;

/**
 * Class ItemsOrderServiceRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ItemsOrderServiceRepositoryEloquent extends BaseRepository implements ItemsOrderServiceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ItemsOrderService::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ItemsOrderServiceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
