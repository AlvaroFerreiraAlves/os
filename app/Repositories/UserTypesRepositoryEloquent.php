<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserTypesRepository;
use App\Entities\UserTypes;
use App\Validators\UserTypesValidator;

/**
 * Class UserTypesRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserTypesRepositoryEloquent extends BaseRepository implements UserTypesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserTypes::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserTypesValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
