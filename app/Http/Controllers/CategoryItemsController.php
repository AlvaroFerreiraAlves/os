<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CategoryItemsCreateRequest;
use App\Http\Requests\CategoryItemsUpdateRequest;
use App\Repositories\CategoryItemsRepository;
use App\Validators\CategoryItemsValidator;


class CategoryItemsController extends Controller
{

    /**
     * @var CategoryItemsRepository
     */
    protected $repository;

    /**
     * @var CategoryItemsValidator
     */
    protected $validator;

    public function __construct(CategoryItemsRepository $repository, CategoryItemsValidator $validator)
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
        $categoryItems = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categoryItems,
            ]);
        }

        return view('categoryItems.index', compact('categoryItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryItemsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryItemsCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $categoryItem = $this->repository->create($request->all());

            $response = [
                'message' => 'CategoryItems created.',
                'data'    => $categoryItem->toArray(),
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
        $categoryItem = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categoryItem,
            ]);
        }

        return view('categoryItems.show', compact('categoryItem'));
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

        $categoryItem = $this->repository->find($id);

        return view('categoryItems.edit', compact('categoryItem'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryItemsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CategoryItemsUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $categoryItem = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'CategoryItems updated.',
                'data'    => $categoryItem->toArray(),
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
                'message' => 'CategoryItems deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'CategoryItems deleted.');
    }
}
