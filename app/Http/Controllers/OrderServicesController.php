<?php

namespace App\Http\Controllers;

use App\Entities\Customer;
use App\Entities\Item;
use App\Entities\OrderService;
use App\Entities\TypeOrderService;
use App\Entities\UserTypeUser;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Array_;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\OrderServiceCreateRequest;
use App\Http\Requests\OrderServiceUpdateRequest;
use App\Repositories\OrderServiceRepository;
use App\Validators\OrderServiceValidator;


class OrderServicesController extends Controller
{


    /**
     * @var OrderServiceRepository
     */
    protected $repository;

    /**
     * @var OrderServiceValidator
     */
    protected $validator;

    public function __construct(OrderServiceRepository $repository, OrderServiceValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $orderServices = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $orderServices,
            ]);
        }

        return view('orderServices.index', compact('orderServices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OrderServiceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(OrderServiceCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $orderService = $this->repository->create($request->all());

            $response = [
                'message' => 'OrderService created.',
                'data' => $orderService->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
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
        $orderService = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $orderService,
            ]);
        }

        return view('orderServices.show', compact('orderService'));
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

        $orderService = $this->repository->find($id);

        return view('orderServices.edit', compact('orderService'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  OrderServiceUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(OrderServiceUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $orderService = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'OrderService updated.',
                'data' => $orderService->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
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
                'message' => 'OrderService deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'OrderService deleted.');
    }

    public function showFormOrder(Item $item)
    {

        $itens = $item->all();
        $prodService = $item->getItems();
        /*$total = $item->total();*/

        return view('order_services.create-edit', compact('itens', 'prodService','item'));
    }

    public function addService(Request $request)
    {

        $id = $request->input('itens');
        $qtd = $request->qtd;

        $item = Item::find($id);

        $item->valor = $request->valor;


        if (!$item)
            return redirect()->back();

        $items = new Item();

        if (!array_key_exists($id, $items->getItems())) {
            $items->addItem($item,$qtd);
            Session::put('items', $items);
            $item = $items->getItems();
            return end($item);
        }

    }


    public function remove($id)
    {

        $item = Item::find($id);
        if (!$item)
            return redirect()->back();

        $items = new Item();
        $items->removeItems($item);;

        Session::put('items', $items);

        return redirect()->route('form.register');

    }

    public function setValue($id)
    {
        $valorItem = Item::find($id);

        return $valorItem->valor;
    }

    public function total(Item $item)
    {

        return $item->total();
    }


    public function salvaOrdem()
    {
        session_start();

        $dataform = Item::listItem();
        foreach ($dataform as $d) {
            $data[] = $d->id;
        }


        $ordem = OrderService::find(3);

        $ordem->itensOrdem()->sync($data);
        return $ordem;
    }


}
