<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CategoryItemsRepository;
use App\Entities\CategoryItems;
use App\Validators\CategoryItemsValidator;

/**
 * Class CategoryItemsRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CategoryItemsRepositoryEloquent extends BaseRepository implements CategoryItemsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoryItems::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CategoryItemsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
