<?php

namespace App\Http\Controllers;

use App\Entities\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Repositories\CustomerRepository;
use App\Validators\CustomerValidator;


class CustomersController extends Controller
{

    /**
     * @var CustomerRepository
     */
    protected $repository;

    /**
     * @var CustomerValidator
     */
    protected $validator;

    public function __construct(CustomerRepository $repository, CustomerValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCustomers()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $customers = $this->repository->all();
        $title = 'Clientes';

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $customers,
            ]);
        }

        return view('customers.list-customers', compact('customers', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            if($request->input('tipo_cliente') == 0)
            {
                $e = Validator::make($request->all(), $this->validator->rulesCpfUpdate());
                if ($e->fails()) {
                    return response()->json($e->errors()->all());
                }
            }
            else if($request->input('tipo_cliente') == 1)
            {
                $e = Validator::make($request->all(), $this->validator->rules_cnpj);
                if ($e->fails()) {
                    return response()->json($e->errors()->all());
                }
            }


          //  $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $customer = $this->repository->create($request->all());

            $response = [
                'message' => 'Cliente cadastrado.',
                'data' => $customer->toArray(),
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
        $customer = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $customer,
            ]);
        }

        return view('customers.show', compact('customer'));
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
        $title = "Editar cliente";

        $customers = $this->repository->find($id);


        if ($customers->status == 0)
            return redirect()->back();

        return view('customers.create-edit', compact('customers', 'title'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CustomerUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        if ($request['tipo_cliente'] == 0)
        {
            $this->validate($request, $this->validator->rulesCpfUpdate());
            $customer = $this->repository->update($request->all(), $id);
        }
        else if($request['tipo_cliente'] == 1)
        {
            $this->validate($request, $this->validator->rulesCnpjUpdate());
            $customer = Customer::find($id);
            $customer = $customer->update($request->all());
        }
        return redirect('listar-clientes')->with('message', 'Os dados do cliente foram atualizados.');

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
        $deleted = $this->repository->update(["status" => 0], $id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Customer deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Cliente Excluído.');
    }

    public function showFormCustomer()
    {
        $title = 'Cadastrar Cliente';
        return view('customers.create-edit', compact('title'));
    }

    public function details(Customer $customer, $id)
    {

        $title = "Detalhes do cliente";
        $customer = $customer->find($id);
        return view('customers.details', compact('title', 'customer'));

    }
}
