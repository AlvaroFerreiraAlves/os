@extends('template.main')

@section('content')

    <a href="{{route('listar.clientes')}}">
        <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row text-center">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                </div>

                <div class="panel-footer announcement-bottom">
                    <div class="row text-center">
                        <h3>Clientes</h3>
                    </div>
                </div>

            </div>
        </div>
    </a>

    <a href="{{route('listar.produtos')}}">
        <div class="col-lg-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row text-center">
                        <i class="fa fa-barcode fa-5x"></i>
                    </div>
                </div>

                <div class="panel-footer announcement-bottom">
                    <div class="row text-center">
                        <h3>Produtos</h3>
                    </div>
                </div>

            </div>
        </div>
    </a>

    <a href="{{route('listar.servicos')}}">
        <div class="col-lg-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row text-center">
                        <i class="fa fa-wrench fa-5x"></i>
                    </div>
                </div>

                <div class="panel-footer announcement-bottom">
                    <div class="row text-center">
                        <h3>Serviços</h3>
                    </div>
                </div>

            </div>
        </div>
    </a>

    <a href="{{route('nova.ordem')}}">
        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row text-center">
                        <i class="fa fa-file fa-5x"></i>
                    </div>
                </div>

                <div class="panel-footer announcement-bottom">
                    <div class="row text-center">
                        <h3>OS</h3>
                    </div>
                </div>

            </div>
        </div>
    </a>

@endsection