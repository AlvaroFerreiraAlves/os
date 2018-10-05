@extends('template.main')

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    @if(isset($companies))

        <form class="form-horizontal" method="post" action="{{url('companies/'.$companies->id.'/update')}}"
              enctype="multipart/form-data">
            {!! method_field('PUT') !!}
            @else
                <form class="form-horizontal" method="post" action="{{url('companies/store')}}"
                      enctype="multipart/form-data">
                    @endif
                    {{csrf_field()}}
                    <fieldset>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="razao_social">Nome:</label>
                            <div class="col-md-4">
                                <input id="razao_social" name="razao_social" type="text" placeholder=""
                                       class="form-control input-md"
                                       value="{{$companies->razao_social or old('razao_social') }}" required="">

                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cnpj">CNPJ:</label>
                            <div class="col-md-4">
                                <input id="cnpj" name="cnpj" type="text" placeholder="" class="form-control input-md"
                                       value="{{$companies->cnpj or old('cnpj') }}" required="">

                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="endereco">Endereço:</label>
                            <div class="col-md-4">
                                <input id="endereco" name="endereco" type="text" placeholder=""
                                       class="form-control input-md"
                                       value="{{$companies->endereco or old('endereco') }}" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">Email:</label>
                            <div class="col-md-4">
                                <input id="email" name="email" type="text" placeholder="" class="form-control input-md"
                                       value="{{$companies->email or old('email') }}" required="">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="telefone">Telefone:</label>
                            <div class="col-md-4">
                                <input id="telefone" name="telefone" type="text" placeholder=""
                                       class="form-control input-md"
                                       value="{{$companies->telefone or old('telefone') }}">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="celular">Celular:</label>
                            <div class="col-md-4">
                                <input id="celular" name="celular" type="text" placeholder=""
                                       class="form-control input-md" value="{{$companies->celular or old('celular') }}"
                                       required="">

                            </div>
                        </div>

                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="logo">Logo:</label>
                            <div class="col-md-4">
                                <input id="logo" name="logo" class="input-file" type="file">
                            </div>
                        </div>

                        <input type="hidden" id="status" name="status" value="1">


                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="salvar"></label>
                            <div class="col-md-4">
                                <button id="salvar" name="salvar" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
        </form>


@endsection