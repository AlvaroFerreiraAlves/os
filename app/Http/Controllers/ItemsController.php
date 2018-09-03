<?php

namespace App\Http\Controllers;

use App\Entities\CategoryItems;
use App\Entities\Item;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Repositories\ItemRepository;
use App\Validators\ItemValidator;


class ItemsController extends Controller
{

    /**
     * @var ItemRepository
     */
    protected $repository;

    /**
     * @var ItemValidator
     */
    protected $validator;

    public function __construct(ItemRepository $repository, ItemValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProducts()
    {
        $title = 'Produtos';
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $items = $this->repository->all();


        if (request()->wantsJson()) {

            return response()->json([
                'data' => $items,
            ]);
        }

        return view('items.list-products', compact('title','items'));
    }

    public function showServices()
    {
        $title = 'Serviços';
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $items = $this->repository->all();


        if (request()->wantsJson()) {

            return response()->json([
                'data' => $items,
            ]);
        }

        return view('items.list-services', compact('title','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ItemCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $item = $this->repository->create($request->all());

            $response = [
                'message' => 'Item cadastrado com sucesso.',
                'data'    => $item->toArray(),
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
        $item = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $item,
            ]);
        }

        return view('items.show', compact('item'));
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

        $item = $this->repository->find($id);
        $categorias = CategoryItems::all();
        if($item->id_categoria_item == 1){
            $title = 'Editar produto';
        }else{
            $title = 'Editar serviço';
        }

        return view('items.create-edit', compact('title','item','categorias'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ItemUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $item = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Item atualizado.',
                'data'    => $item->toArray(),
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
        $deleted = $this->repository->update(["status" => 0], $id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Customer deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Item Excluído.');
    }


    public function showFormItems(){
        $title = 'Cadastrar produto / serviço';
        $categorias = CategoryItems::all();
        return view('items.create-edit',compact('title','categorias'));
    }

    public function details(Item $item, $id)
    {

        $item = $item->find($id);
        if($item->id_categoria_item == 1){
            $title = 'Detalhes do produto';
        }else{
            $title = 'Detalhes do serviço';
        }
        return view('items.details', compact('title','item'));

    }
}
