<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TypeOrderServiceCreateRequest;
use App\Http\Requests\TypeOrderServiceUpdateRequest;
use App\Repositories\TypeOrderServiceRepository;
use App\Validators\TypeOrderServiceValidator;


class TypeOrderServicesController extends Controller
{

    /**
     * @var TypeOrderServiceRepository
     */
    protected $repository;

    /**
     * @var TypeOrderServiceValidator
     */
    protected $validator;

    public function __construct(TypeOrderServiceRepository $repository, TypeOrderServiceValidator $validator)
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
        $typeOrderServices = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $typeOrderServices,
            ]);
        }

        return view('typeOrderServices.index', compact('typeOrderServices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TypeOrderServiceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TypeOrderServiceCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $typeOrderService = $this->repository->create($request->all());

            $response = [
                'message' => 'TypeOrderService created.',
                'data'    => $typeOrderService->toArray(),
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
        $typeOrderService = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $typeOrderService,
            ]);
        }

        return view('typeOrderServices.show', compact('typeOrderService'));
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

        $typeOrderService = $this->repository->find($id);

        return view('typeOrderServices.edit', compact('typeOrderService'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TypeOrderServiceUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TypeOrderServiceUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $typeOrderService = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'TypeOrderService updated.',
                'data'    => $typeOrderService->toArray(),
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
                'message' => 'TypeOrderService deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'TypeOrderService deleted.');
    }
}
