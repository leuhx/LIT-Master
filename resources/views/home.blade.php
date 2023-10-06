@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card m-2">
                <div class="card-header text-white" style="background: #343a40">
                    <b style="font-size: x-large">Dashboard</b>
                </div>
                <div class="card-body">
                    <h2 class="text-center" style="font-style: italic"><b>Seja bem-vindo!</b></h2>
                    <div class="row">
                        <div class="col-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <b style="font-size: large">TOTAL DE ORDENS DE SERVIÇO</b>
                                    <h1 class="text-center"><b>{{$total}}</b></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <b style="font-size: large">VALOR TOTAL</b>
                                    <h1 class="text-center"><b>R$ {{number_format($valorTotal, 2, ',', '.')}}</b></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
