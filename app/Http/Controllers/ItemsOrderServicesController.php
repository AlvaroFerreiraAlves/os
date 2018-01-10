<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ItemsOrderServiceCreateRequest;
use App\Http\Requests\ItemsOrderServiceUpdateRequest;
use App\Repositories\ItemsOrderServiceRepository;
use App\Validators\ItemsOrderServiceValidator;


class ItemsOrderServicesController extends Controller
{

    /**
     * @var ItemsOrderServiceRepository
     */
    protected $repository;

    /**
     * @var ItemsOrderServiceValidator
     */
    protected $validator;

    public function __construct(ItemsOrderServiceRepository $repository, ItemsOrderServiceValidator $validator)
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
        $itemsOrderServices = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $itemsOrderServices,
            ]);
        }

        return view('itemsOrderServices.index', compact('itemsOrderServices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ItemsOrderServiceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ItemsOrderServiceCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $itemsOrderService = $this->repository->create($request->all());

            $response = [
                'message' => 'ItemsOrderService created.',
                'data'    => $itemsOrderService->toArray(),
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
        $itemsOrderService = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $itemsOrderService,
            ]);
        }

        return view('itemsOrderServices.show', compact('itemsOrderService'));
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

        $itemsOrderService = $this->repository->find($id);

        return view('itemsOrderServices.edit', compact('itemsOrderService'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ItemsOrderServiceUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ItemsOrderServiceUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $itemsOrderService = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ItemsOrderService updated.',
                'data'    => $itemsOrderService->toArray(),
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
                'message' => 'ItemsOrderService deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ItemsOrderService deleted.');
    }
}
