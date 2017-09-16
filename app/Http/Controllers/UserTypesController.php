<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserTypesCreateRequest;
use App\Http\Requests\UserTypesUpdateRequest;
use App\Repositories\UserTypesRepository;
use App\Validators\UserTypesValidator;


class UserTypesController extends Controller
{

    /**
     * @var UserTypesRepository
     */
    protected $repository;

    /**
     * @var UserTypesValidator
     */
    protected $validator;

    public function __construct(UserTypesRepository $repository, UserTypesValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $userTypes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userTypes,
            ]);
        }

        return view('userTypes.index', compact('userTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserTypesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserTypesCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $userType = $this->repository->create($request->all());

            $response = [
                'message' => 'UserTypes created.',
                'data'    => $userType->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userType = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userType,
            ]);
        }

        return view('userTypes.show', compact('userType'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $userType = $this->repository->find($id);

        return view('userTypes.edit', compact('userType'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UserTypesUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(UserTypesUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $userType = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'UserTypes updated.',
                'data'    => $userType->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'UserTypes deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UserTypes deleted.');
    }
}
