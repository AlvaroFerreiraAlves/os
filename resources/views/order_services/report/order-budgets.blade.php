<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Título Opcional</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/site/css/certificate.css') }}">
</head>
<body>
<div class="form-group">

    <link href="{{url('assets/css/sbnew.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/sbreset.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/font-awesome/css/font-awesome.min.css')}}">


    <div class="logo col-md-6" s>
        <img src="{{url("storage/logo/{$company->logo}")}}" width="125px" height="115px">
    </div>
    <div class="empresa col-md-6">
        <h3>{{$company->razao_social}}</h3>
        <h5>{{$company->endereco}}</h5>
    </div>
    <div class="telefones col-md-6">
        <h4>{{$company->telefone}}</h4>
        <h4>{{$company->celular}}</h4>
    </div>
    <div class="numero-ordem col-md-6">
        <h4>
            @if($ordemOrcamento->id_tipo_ordem_servico == 1)
                <b>ORÇAMENTO {{$ordemOrcamento->id}}</b>
            @else
                <b>ORDEM DE SERVIÇO {{$ordemOrcamento->id}}</b>
            @endif
        </h4>

    </div>
    <div class="numero-ordem col-md-6">
        <h5 style="float: right">{{$ordemOrcamento->created_at->format('d-m-Y | H:i:s')}}</h5>
    </div>
    <div class="cliente col-md-12">
        <h5>Cliente: {{$customer->nome}}</h5>
        <h5>Endereço: {{$customer->endereco}}</h5>
        <h5>CPF/CNPJ: {{$customer->cnpj_cpf}}</h5>
        <h5>Telefone: {{$customer->telefone}}</h5>
        <h5>Celular: {{$customer->celular}}</h5>
    </div>
    <div class="numero-ordem col-md-12">
        <h5>
            Equipamento: {{$ordemOrcamento->equipamento}}
        </h5>


    </div>

    <div class="problemas col-md-12">
        <h5><b>Problema informado:</b> {{$ordemOrcamento->p_info}}</h5>
        <h5><b>Problema constado:</b> {{$ordemOrcamento->p_const}}</h5>
        <h5><b>Serviço executado:</b> {{$ordemOrcamento->s_exec}}</h5>
    </div>
    <div class="problemas col-md-12">
        <h5><b>Técnico responsável: </b>{{$technician->name}}</h5>
        <h5><b>Situação: </b>
            @if($ordemOrcamento->situacao == 1)
                Em aberto
            @elseif($ordemOrcamento->situacao == 2)
                Em andamento
            @elseif($ordemOrcamento->situacao == 3)
                Concluído
            @elseif($ordemOrcamento->situacao == 4)
                Cancelado
            @endif

        </h5>
    </div>


    <div class="problemas col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-responsive">
                <thead>
                <tr>
                    <th>Cód</th>
                    <th>Nome</th>
                    <th>Desconto</th>
                    <th>Valor</th>
                    <th>Quantidade.</th>


                </tr>
                </thead>
                <tbody id="products-list" name="products-list">
                @foreach($items as $item)
                    <tr>

                        <td>{{$item->id}}</td>
                        <td>{{$item->nome}}</td>
                        <td>{{number_format($item->pivot->desconto, 2, ',', '')}}</td>
                        <td>{{number_format($item->pivot->valor, 2, ',', '')}}</td>
                        <td>{{$item->pivot->qtd}}</td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            <hr>

            <div class="col-md-3" style="float: right">

                <h5>Desconto: R$ {{number_format($descontoTotal, 2, ',', '')}}</h5>
                <h3>Total: R$ {{number_format($total - $descontoTotal, 2, ',', '')}}</h3>
            </div>

        </div>
    </div>

</div>


</body>
</html>