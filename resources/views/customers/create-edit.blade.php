@extends('template.main')

@section('content')


    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

    <div class="alert alert-success print-success-msg" style="display:none">
        <ul></ul>
    </div>



    <form class="form-horizontal" id="form-customer-modal">
        {{csrf_field()}}
        <fieldset>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nome">Nome:</label>
                <div class="col-md-5">
                    <input id="nome" name="nome" type="text" placeholder=""
                           class="form-control input-md" value="{{$customers->nome or old('nome') }}"
                           required="">

                </div>
            </div>

            <!-- Select Basic -->
            @if(isset($customers))
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tipo_cliente">Tipo de pessoa:</label>
                    <div class="col-md-5">
                        <select id="tipo_cliente" name="tipo_cliente" class="form-control">
                            <option value="0"

                                    @if($customers->tipo_cliente == 0)
                                    selected
                                    @endif

                            >Física
                            </option>
                            <option value="1"
                                    @if($customers->tipo_cliente == 1)
                                    selected
                                    @endif
                            >Jurídica
                            </option>
                        </select>
                    </div>
                </div>
            @else
                <div class="form-group">
                    <label class="col-md-4 control-label" for="tipo_cliente">Tipo de pessoa:</label>
                    <div class="col-md-5">
                        <select id="tipo_cliente" name="tipo_cliente" class="form-control">
                            <option value="0">Física</option>
                            <option value="1">Jurídica</option>
                        </select>
                    </div>
                </div>
            @endif

        <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cnpj_cpf">CNPJ/CPF:</label>
                <div class="col-md-5">
                    <input id="cnpj_cpf" name="cnpj_cpf" type="text" placeholder=""
                           class="form-control input-md"
                           value="{{$customers->cnpj_cpf or old('cnpj_cpf') }}" required="">

                </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="endereco">Endereço:</label>
                <div class="col-md-5">
                    <input id="endereco" name="endereco" type="text" placeholder=""
                           class="form-control input-md"
                           value="{{$customers->endereco or old('endereco') }}" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cep">CEP:</label>
                <div class="col-md-5">
                    <input id="cep" name="cep" type="text" placeholder="" class="form-control input-md"
                           value="{{$customers->cep or old('cep') }}">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="telefone">Telefone:</label>
                <div class="col-md-5">
                    <input id="telefone" name="telefone" type="text" placeholder=""
                           class="form-control input-md"
                           value="{{$customers->telefone or old('telefone') }}">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="celular">Celular:</label>
                <div class="col-md-5">
                    <input id="celular" name="celular" type="text" placeholder=""
                           class="form-control input-md"
                           value="{{$customers->celular or old('celular') }}" required="">

                </div>
            </div>

            @if(!isset($customers))
                <input type="hidden" id="status" name="status" value="1">
            @endif



            @if(isset($customers))
                <div class="form-group">
                    <label class="col-md-4 control-label" for="update"></label>
                    <div class="col-md-4">
                        <button type="button" id="update-customer" name="update-customer" onclick="updateCustomer({{$customers->id}})"
                                class="btn btn-primary">Atualizar
                        </button>
                    </div>
                </div>
            @else
                <div class="form-group">
                    <label class="col-md-4 control-label" for="salvar"></label>
                    <div class="col-md-4">
                        <button type="button" id="save-customer" name="save-customer" onclick="saveCustomer()"
                                class="btn btn-primary">Salvar
                        </button>
                    </div>
                </div>
            @endif


        </fieldset>
    </form>





@endsection