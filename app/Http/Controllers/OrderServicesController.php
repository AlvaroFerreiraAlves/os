<?php

namespace App\Http\Controllers;

use App\Entities\CategoryItems;
use App\Entities\Company;
use App\Entities\Customer;
use App\Entities\Item;
use App\Entities\OrderService;
use App\Entities\TypeOrderService;
use App\Entities\UserType;
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
    public function store(Request $request, Item $item)
    {


        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $orderService = $this->repository->create($request->all());

            $data = [];
            $dataform = $item->getItems();
            foreach ($dataform as $d) {
                $data[$d['item']->id] = [
                    'qtd' => $d['qtd'],
                    'valor' => $d['item']->valor,
                ];
            }

            $ordem = OrderService::find($orderService->id);

            $ordem->itensOrdem()->sync($data);

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
    public function edit(Item $item, $id)
    {
        $item->emptySessionUpdate();
        $orderService = $this->repository->find($id);
        $itensOrdem = $orderService->itensOrdem;
        $items = new Item();
        $itemsOrderSession = [];
        foreach ($itensOrdem as $io => $value) {


            $items->addItemUpdate($value, $value->pivot->qtd);
            Session::put('itemsUpdate', $items);
            $itemsOrderSession = $items->getItemsUpdate();
        }


        $title = 'Editar';
        $itens = $item->all();
        $tipoOrdem = TypeOrderService::all();
        $companies = Company::all();
        $customers = Customer::all();
        $tecnicos = UserType::find(2);
        $tecnicos = $tecnicos->users;

        return view('order_services.create-edit', compact('orderService', 'title', 'tipoOrdem', 'companies', 'customers', 'tecnicos', 'itens', 'item', 'itemsOrderSession'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  OrderServiceUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(Request $request, $id, Item $item)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $orderService = $this->repository->update($request->all(), $id);


            $data = [];
            $dataform = $item->getItemsUpdate();
            foreach ($dataform as $d) {
                $data[$d['item']->id] = [
                    'qtd' => $d['qtd'],
                    'valor' => $d['item']->valor,
                ];
            }

            $ordem = OrderService::find($orderService->id);

            $ordem->itensOrdem()->sync($data);

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
    public function destroy()
    {
        $deleted = $this->repository->delete();

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
        // $item->emptySession();
        $title = 'Ordem de Serviço';
        $itens = $item->all();
        $prodService = $item->getItems();
        $tipoOrdem = TypeOrderService::all();
        $companies = Company::all();
        $customers = Customer::all();
        $tecnicos = UserType::find(2);
        $tecnicos = $tecnicos->users;
        $category = CategoryItems::all();


        return view('order_services.create-edit', compact('itens', 'prodService', 'item', 'title', 'tipoOrdem', 'companies', 'customers', 'tecnicos', 'category'));
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

//        if (!array_key_exists($id, $items->getItems())) {
        $items->addItem($item, $qtd);
        Session::put('items', $items);

        $item = $items->getItems();
        return end($item);
//            return end($item);
//        }

    }

    public function addServiceUpdate(Request $request)
    {


        $id = $request->input('itens');
        $qtd = $request->qtd;

        $item = Item::find($id);

        $item->valor = $request->valor;


        if (!$item)
            return redirect()->back();

        $items = new Item();

        if (!array_key_exists($id, $items->getItemsUpdate())) {
            $items->addItemUpdate($item, $qtd);
            Session::put('itemsUpdate', $items);
            $item = $items->getItemsUpdate();
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

        return redirect()->route('nova.ordem');

    }

    public function removeUpdate($id)
    {

        $item = Item::find($id);
        if (!$item)
            return redirect()->back();

        $items = new Item();
        $items->removeItemsUpdate($item);

        Session::put('itemsUpdate', $items);

        return $items->getItemsUpdate();

    }


    public function setValue($id)
    {
        $valorItem = Item::find($id);

        return $valorItem->valor;
    }

    public function total(Item $item, $desconto = null)
    {
        $total = $item->total();
        $total = $total - $desconto;
        return $total;
    }

    public function totalUpdate(Item $item, $desconto = null)
    {
        $total = $item->totalUpdate();
        $total = $total - $desconto;

        return $total;
    }


    public function teste(Request $request)
    {

        dd($request->all());
    }

    public function showBudgets(OrderService $orderService)
    {
        $title = 'Orçamentos';
        $budgets = $orderService->all();

        foreach ($budgets as $budget) {
            echo $budget->technician->name;
        }


        return view('order_services.list-budgets', compact('title', 'budgets'));

    }

    public function details(OrderService $orderService, $id)
    {

        $ordemOrcamento = $orderService->find($id);
        $total = $orderService->totalOrdem($ordemOrcamento);
        $items = $ordemOrcamento->itensOrdem;
        $company = $ordemOrcamento->empresa;
        $customer = $ordemOrcamento->cliente;
        $technician = $ordemOrcamento->technician;

        if ($ordemOrcamento->id_tipo_ordem_servico == 1) {
            $title = 'Detalhes do orçamento';
        } else {
            $title = 'Detalhes da Ordem de serviço';
        }
        return view('order_services.details', compact('title', 'ordemOrcamento', 'company', 'customer', 'items', 'technician', 'total'));

    }


}
