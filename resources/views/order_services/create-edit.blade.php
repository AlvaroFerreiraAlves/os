@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" id="formulario">
                        {{ csrf_field() }}
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Form Name</legend>


                            <div class="form-group">
                                <label class="col-md-4 control-label" for="itens">Serviços:</label>
                                <div class="col-md-4">

                                        <select id="itens" name="itens" class="form-control">
                                            @foreach($itens as $i)
                                                <option value="{{$i->id}}">{{$i->nome}}</option>
                                            @endforeach
                                        </select>

                                </div>
                            </div>




                        <!-- Button -->
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="salvar"></label>
                                <div class="col-md-4">
                                    <input type="button" id="salvar" name="salvar" class="btn btn-primary"
                                           value="Salvar">
                                </div>
                            </div>
                        </fieldset>
                    </form>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="servicos">Serviços:</label>
                        <div class="col-md-4">
                            <div id="load">
                                <select id="servicos" name="servicos" class="form-control">
                                    @foreach($prodService as $ps)
                                        <option value="{{$ps->id}}">{{$ps->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>

@endsection