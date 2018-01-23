<?php

namespace App\Http\Controllers;

use App\Entities\Company;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Repositories\CompanyRepository;
use App\Validators\CompanyValidator;


class CompaniesController extends Controller
{

    /**
     * @var CompanyRepository
     */
    protected $repository;

    /**
     * @var CompanyValidator
     */
    protected $validator;

    public function __construct(CompanyRepository $repository, CompanyValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCustomers()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $companies = $this->repository->all();
        $title = 'Minha(s) Empresa(s)';

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $companies,
            ]);
        }

        return view('companies.list-companies', compact('title','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CompanyCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            // Define o valor default para a variável que contém o nome da imagem
            $nameFile = null;

            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('logo') && $request->file('logo')->isValid()) {

                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = 'logo';

                // Recupera a extensão do arquivo
                $extension = $request->logo->extension();

                // Define finalmente o nome
                $nameFile = "{$name}.{$extension}";

                // Faz o upload:
                $upload = $request->logo->storeAs('logo', $nameFile);
                // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

                // Verifica se NÃO deu certo o upload (Redireciona de volta)
                if ( !$upload )
                    return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();

            }

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $company = $this->repository->create([

                      "razao_social" => $request->razao_social,
                      "cnpj" => $request->cnpj,
                      "endereco" => $request->endereco,
                      "email" => $request->email,
                      "telefone" => $request->telefone,
                      "celular" => $request->celular,
                      "logo" => $nameFile,
                      "status" => "1",
            ]);

            $response = [
                'message' => 'Company created.',
                'data'    => $company->toArray(),
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
        $company = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $company,
            ]);
        }

        return view('companies.show', compact('company'));
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
        $title = 'Editar empresa';

        $companies = $this->repository->find($id);

        return view('companies.create-edit', compact('title','companies'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CompanyUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {

        try {

            // Define o valor default para a variável que contém o nome da imagem
            $nameFile = null;

            // Verifica se informou o arquivo e se é válido
            if ($request->hasFile('logo') && $request->file('logo')->isValid()) {

                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = $request->logo->getClientOriginalName();

                // Recupera a extensão do arquivo
                $extension = $request->logo->extension();

                // Define finalmente o nome
                $nameFile = "{$name}"/*.{$extension}*/;

                // Faz o upload:
                $upload = $request->logo->storeAs('logo', $nameFile);
                // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao

                // Verifica se NÃO deu certo o upload (Redireciona de volta)
                if ( !$upload )
                    return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();

            }

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $company = $this->repository->update(
                [ "razao_social" => $request->razao_social,
                    "cnpj" => $request->cnpj,
                    "endereco" => $request->endereco,
                    "email" => $request->email,
                    "telefone" => $request->telefone,
                    "celular" => $request->celular,
                    "logo" => $nameFile,
                    "status" => "1",], $id);

            $response = [
                'message' => 'Company updated.',
                'data'    => $company->toArray(),
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
                'message' => 'Company deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Company deleted.');
    }

    public function showFormCustomer()
    {
        $title = 'Cadastrar empresa';
        return view('companies.create-edit',compact('title'));
    }

    public function details(Company $company, $id)
    {

        $title = "Detalhes da empresa";
        $company = $company->find($id);
        return view('companies.details', compact('title','company'));

    }
}
