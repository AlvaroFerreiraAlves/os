<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OrderServiceRepository;
use App\Entities\OrderService;
use App\Validators\OrderServiceValidator;

/**
 * Class OrderServiceRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OrderServiceRepositoryEloquent extends BaseRepository implements OrderServiceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderService::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return OrderServiceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
