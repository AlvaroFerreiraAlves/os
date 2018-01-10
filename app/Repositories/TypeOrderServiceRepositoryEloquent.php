<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TypeOrderServiceRepository;
use App\Entities\TypeOrderService;
use App\Validators\TypeOrderServiceValidator;

/**
 * Class TypeOrderServiceRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TypeOrderServiceRepositoryEloquent extends BaseRepository implements TypeOrderServiceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TypeOrderService::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TypeOrderServiceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
