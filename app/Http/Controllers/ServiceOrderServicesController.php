<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ServiceOrderServiceCreateRequest;
use App\Http\Requests\ServiceOrderServiceUpdateRequest;
use App\Repositories\ServiceOrderServiceRepository;
use App\Validators\ServiceOrderServiceValidator;


class ServiceOrderServicesController extends Controller
{

    /**
     * @var ServiceOrderServiceRepository
     */
    protected $repository;

    /**
     * @var ServiceOrderServiceValidator
     */
    protected $validator;

    public function __construct(ServiceOrderServiceRepository $repository, ServiceOrderServiceValidator $validator)
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
        $serviceOrderServices = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $serviceOrderServices,
            ]);
        }

        return view('serviceOrderServices.index', compact('serviceOrderServices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ServiceOrderServiceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceOrderServiceCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $serviceOrderService = $this->repository->create($request->all());

            $response = [
                'message' => 'ServiceOrderService created.',
                'data'    => $serviceOrderService->toArray(),
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
        $serviceOrderService = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $serviceOrderService,
            ]);
        }

        return view('serviceOrderServices.show', compact('serviceOrderService'));
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

        $serviceOrderService = $this->repository->find($id);

        return view('serviceOrderServices.edit', compact('serviceOrderService'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ServiceOrderServiceUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ServiceOrderServiceUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $serviceOrderService = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ServiceOrderService updated.',
                'data'    => $serviceOrderService->toArray(),
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
                'message' => 'ServiceOrderService deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ServiceOrderService deleted.');
    }
}
