<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ServiceOrderServiceRepository;
use App\Entities\ServiceOrderService;
use App\Validators\ServiceOrderServiceValidator;

/**
 * Class ServiceOrderServiceRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ServiceOrderServiceRepositoryEloquent extends BaseRepository implements ServiceOrderServiceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceOrderService::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ServiceOrderServiceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
